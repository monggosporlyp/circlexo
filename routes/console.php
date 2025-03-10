<?php

\Illuminate\Support\Facades\Schedule::command('subscriptions:cancel-expired')->hourly();
