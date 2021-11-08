<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Perpustakaan</title>

    {{-- GOOGLE FONTS --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- ICONS --}}
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    {{-- jQuery --}}
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- JS --}}
    <script defer src="/js/app.js"></script>
    
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>

    <main class="container">
        <aside>
            @include('components.side-nav')
        </aside>
        <main class="main">
            @include('components.header')
            @yield('container')
        </main>
    </main>
</body>
</html>