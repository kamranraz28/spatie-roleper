<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('layouts.css')
</head>

<body>
    <header>
        @include('header')
    </header>

    <div class="dashboard-container">
        @include('sidebar')

        <main class="dashboard-content">
            @yield('content')
        </main>
    </div>

    @include('layouts.js')

</body>

</html>
