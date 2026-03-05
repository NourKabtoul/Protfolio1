<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nour Kabtoul | Laravel Developer</title>
    <meta name="description" content="Laravel Backend Engineer — building scalable, secure, and production-ready systems.">

    {{-- ── Google Fonts ── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700&family=JetBrains+Mono:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- ── Font Awesome 6 (icons) ── --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- ── Reset any old Bootstrap or conflicting styles ── --}}
    <style>
        /* Hard reset to prevent layout conflicts */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        html, body {
            width: 100%;
            overflow-x: hidden;
        }
        /* Remove Bootstrap container constraints if Bootstrap is loaded elsewhere */
        .container {
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 24px;
            padding-right: 24px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -12px;
            margin-right: -12px;
        }
        .col-md-3, .col-md-4, .col-md-6, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8 {
            padding-left: 12px;
            padding-right: 12px;
            width: 100%;
        }
        @media (min-width: 768px) {
            .col-md-3  { width: 25% }
            .col-md-4  { width: 33.333% }
            .col-md-6  { width: 50% }
            .col-6     { width: 50% }
        }
        @media (min-width: 992px) {
            .col-lg-4  { width: 33.333% }
            .col-lg-5  { width: 41.666% }
            .col-lg-6  { width: 50% }
            .col-lg-7  { width: 58.333% }
            .col-lg-8  { width: 66.666% }
        }
        .g-3  { gap: 12px }
        .g-4  { gap: 16px }
        .g-5  { gap: 24px }
        .row.g-3, .row.g-4, .row.g-5 { margin: 0 }
        .row.g-3 > *, .row.g-4 > *, .row.g-5 > * { padding: 0 }
        .row.g-4 { gap: 16px }
        .row.g-5 { gap: 24px }
        .text-center { text-align: center }
        .d-flex { display: flex }
        .align-items-center { align-items: center }
        .align-items-start { align-items: flex-start }
        .align-items-end { align-items: flex-end }
        .justify-content-center { justify-content: center }
        .justify-content-between { justify-content: space-between }
        .flex-wrap { flex-wrap: wrap }
        .flex-lg-row-reverse { flex-direction: row }
        @media(min-width:992px){ .flex-lg-row-reverse { flex-direction: row-reverse } }
        .gap-3 { gap: 12px }
        .gap-4 { gap: 16px }
        .mb-0  { margin-bottom: 0 }
        .mb-3  { margin-bottom: 12px }
        .mb-4  { margin-bottom: 16px }
        .mb-5  { margin-bottom: 24px }
        .mt-4  { margin-top: 16px }
        .mt-5  { margin-top: 24px }
        .me-3  { margin-right: 12px }
        .h-100 { height: 100% }
        .w-100 { width: 100% }
        .position-relative { position: relative }
        .position-absolute { position: absolute }
        .overflow-hidden { overflow: hidden }
        .list-unstyled { list-style: none }
        .img-fluid { max-width: 100%; height: auto }
        .d-block { display: block }
        .d-none { display: none }
        @media(min-width:992px){
            .d-lg-block { display: block }
            .d-lg-flex  { display: flex }
        }
        /* Scrollbar */
        ::-webkit-scrollbar { width: 4px }
        ::-webkit-scrollbar-track { background: #02040a }
        ::-webkit-scrollbar-thumb { background: #1e40af; border-radius: 2px }
        /* Selection */
        ::selection { background: rgba(59,130,246,.3); color: #fff }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    @yield('content')

</body>
</html>
