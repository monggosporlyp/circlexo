<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $title ?? 'Auth' }}</title>
@vite(['auth/resources/css/auth.css', 'auth/resources/js/auth.js'])

@php
    $buttonRGBColor = \Devdojo\Auth\Helper::convertHexToRGBString(config('devdojo.auth.appearance.color.button'));
    $inputBorderRGBColor = \Devdojo\Auth\Helper::convertHexToRGBString(config('devdojo.auth.appearance.color.input_border'));
@endphp
<style>
    .auth-component-button:focus{
        --tw-ring-opacity: 1; --tw-ring-color: rgb({{ $buttonRGBColor }} / var(--tw-ring-opacity));
    }
    .auth-component-input{
        color: {{ config('devdojo.auth.appearance.color.input_text') }}
    }
    .auth-component-input:focus, .auth-component-code-input:focus{
        --tw-ring-color: rgb({{ $inputBorderRGBColor }} / var(--tw-ring-opacity));
        border-color: rgb({{ $inputBorderRGBColor }} / var(--tw-border-opacity));
    }
    .auth-component-input-label-focused{
        color: {{ config('devdojo.auth.appearance.color.input_border') }}
    }
</style>

@if(file_exists(public_path('auth/app.css')))
    <link rel="stylesheet" href="/auth/app.css" />
@endif

<link href="{{ url(config('devdojo.auth.appearance.favicon.light')) }}" rel="icon" media="(prefers-color-scheme: light)" />
<link href="{{ url(config('devdojo.auth.appearance.favicon.dark')) }}" rel="icon" media="(prefers-color-scheme: dark)" />

@stack('devdojo-auth-head-scripts')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
{{ filament()->getFontHtml() }}


<style>
    :root {
        --font-family: '{!! filament()->getFontFamily() !!}';
        --sidebar-width: {{ filament()->getSidebarWidth() }};
        --collapsed-sidebar-width: {{ filament()->getCollapsedSidebarWidth() }};
        --default-theme-mode: {{ filament()->getDefaultThemeMode()->value }};
    }
    body {
        font-family: var(--font-family);
    }
</style>
