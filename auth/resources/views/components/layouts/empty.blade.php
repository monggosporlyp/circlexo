<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    @include('auth::includes.head')
</head>
<body>
    {{ $slot }}
</body>
</html>
