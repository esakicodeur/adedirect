<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Live') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&family=Inria+Serif:wght@300;400;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- JQuery -->
{{-- integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- Livewire --}}
<livewire:styles />

<!-- Styles -->
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('agoraVideo/main.css') }}"> --}}

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- Blade UI Kit --}}
@bukStyles(true)
