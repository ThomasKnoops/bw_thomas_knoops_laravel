<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Center the Sidebar using flexbox -->
            <div class="col-md-3 d-flex align-items-center vh-100 position-fixed">
                <div class="list-group">

                    <!-- Home Section -->
                    <a href="{{ route('home.index') }}" class="list-group-item list-group-item-action">Home</a>
                    <a href="{{ route('home.about') }}" class="list-group-item list-group-item-action">About</a>
                    <hr>

                    <!-- User Section -->
                    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">View Users</a>
                    <a href="{{ route('user.editProfile') }}" class="list-group-item list-group-item-action">Edit Profile</a>
                    <hr>

                    <!-- News Section -->
                    <a href="{{ route('news.index') }}" class="list-group-item list-group-item-action">View News</a>
                    <a href="{{ route('news.create') }}" class="list-group-item list-group-item-action">Add News</a>
                    <hr>

                    <!-- FAQ Section -->
                    <a href="{{ route('faq.index') }}" class="list-group-item list-group-item-action">View FAQ</a>
                    <a href="{{ route('faq.createCategory') }}" class="list-group-item list-group-item-action">Add FAQ Category</a>
                    <a href="{{ route('faq.createQuestion') }}" class="list-group-item list-group-item-action">Add FAQ Question</a>
                    <hr>

                    <!-- Other Sections -->
                    <a href="{{ route('admin.viewContactForms') }}" class="list-group-item list-group-item-action">View Contact Forms</a>
                    <hr>
                    <a href="#" class="list-group-item list-group-item-action" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 mx-auto">
                <br>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
