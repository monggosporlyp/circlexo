<?php

namespace App\Models;

use Devdojo\Auth\Models\User as AuthUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Wave\Plan;
use Wave\Subscription;
use Wave\Traits\HasProfileKeyValues;

/**
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $loginBy
 * @property string $type
 * @property string $address
 * @property string $password
 * @property string $otp_code
 * @property string $otp_activated_at
 * @property string $last_login
 * @property string $agent
 * @property string $host
 * @property int $attempts
 * @property bool $login
 * @property bool $activated
 * @property bool $blocked
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Account extends AuthUser implements HasAvatar, HasMedia, JWTSubject
{
    use HasFactory;
    use HasProfileKeyValues;
    use HasRoles;
    use InteractsWithMedia;
    use Notifiable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'phone',
        'parent_id',
        'type',
        'name',
        'username',
        'loginBy',
        'address',
        'password',
        'otp_code',
        'otp_activated_at',
        'last_login',
        'agent',
        'host',
        'is_login',
        'is_active',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_login' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
        'otp_activated_at',
        'last_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
        'otp_activated_at',
        'host',
        'agent',
    ];

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->getFirstMediaUrl('avatar') ?? null;
    }

    public function avatar(): ?string
    {
        return $this->getFilamentAvatarUrl();
    }

    public function onTrial()
    {
        if (is_null($this->trial_ends_at)) {
            return false;
        }
        if ($this->subscriber()) {
            return false;
        }

        return true;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'billable_id')->where('billable_type', 'user');
    }

    public function subscriber()
    {
        return $this->subscriptions()->where('status', 'active')->exists();
    }

    public function subscribedToPlan($planSlug)
    {
        $plan = Plan::where('name', $planSlug)->first();
        if (! $plan) {
            return false;
        }

        return $this->subscriptions()->where('plan_id', $plan->id)->where('status', 'active')->exists();
    }

    public function plan()
    {
        $latest_subscription = $this->latestSubscription();

        return Plan::find($latest_subscription->plan_id);
    }

    public function planInterval()
    {
        $latest_subscription = $this->latestSubscription();

        return ($latest_subscription->cycle == 'month') ? 'Monthly' : 'Yearly';
    }

    public function latestSubscription()
    {
        return $this->subscriptions()->where('status', 'active')->orderBy('created_at', 'desc')->first();
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'billable_id')->where('status', 'active')->orderBy('created_at', 'desc');
    }

    public function switchPlans(Plan $plan)
    {
        $this->syncRoles([]);
        $this->assignRole($plan->role->name);
    }

    public function invoices()
    {
        $user_invoices = [];

        if (is_null($this->subscription)) {
            return null;
        }

        if (config('wave.billing_provider') == 'stripe') {
            $stripe = new \Stripe\StripeClient(config('wave.stripe.secret_key'));
            $subscriptions = $this->subscriptions()->get();
            foreach ($subscriptions as $subscription) {
                $invoices = $stripe->invoices->all(['customer' => $subscription->vendor_customer_id, 'limit' => 100]);

                foreach ($invoices as $invoice) {
                    array_push($user_invoices, (object) [
                        'id' => $invoice->id,
                        'created' => \Carbon\Carbon::parse($invoice->created)->isoFormat('MMMM Do YYYY, h:mm:ss a'),
                        'total' => number_format(($invoice->total / 100), 2, '.', ' '),
                        'download' => $invoice->invoice_pdf,
                    ]);
                }
            }
        } else {
            $paddle_url = (config('wave.paddle.env') == 'sandbox') ? 'https://sandbox-api.paddle.com' : 'https://api.paddle.com';
            $response = Http::withToken(config('wave.paddle.api_key'))->get($paddle_url . '/transactions', [
                'subscription_id' => $this->subscription->vendor_subscription_id,
            ]);
            $responseJson = json_decode($response->body());
            foreach ($responseJson->data as $invoice) {
                array_push($user_invoices, (object) [
                    'id' => $invoice->id,
                    'created' => \Carbon\Carbon::parse($invoice->created_at)->isoFormat('MMMM Do YYYY, h:mm:ss a'),
                    'total' => number_format(($invoice->details->totals->subtotal / 100), 2, '.', ' '),
                    'download' => '/settings/invoices/' . $invoice->id,
                ]);
            }
        }

        return $user_invoices;
    }

    public function isAdmin()
    {
        return false;
    }

    public function isImpersonated()
    {
        return false;
    }

    public function hasChangelogNotifications()
    {
        return false;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile($key)
    {
        $keyValue = $this->profileKeyValue($key);

        return isset($keyValue->value) ? $keyValue->value : '';
    }
}
