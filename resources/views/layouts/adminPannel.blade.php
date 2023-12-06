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
    <div class="container">
        <div class="row">
            <!-- Center the Sidebar using flexbox -->
            <div class="col-md-3 d-flex align-items-center vh-100">
                <div class="list-group">

                    <!-- User Section -->
                    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">View Users</a>
                    <hr>

                    <!-- News Section -->
                    <a href="{{ route('news.index') }}" class="list-group-item list-group-item-action">View News</a>
                    <a href="{{ route('admin.addNews') }}" class="list-group-item list-group-item-action">Add News</a>
                    <hr>

                    <!-- FAQ Section -->
                    <a href="{{ route('faq.index') }}" class="list-group-item list-group-item-action">View FAQ</a>
                    <a href="{{ route('admin.addFaqCategory') }}" class="list-group-item list-group-item-action">Add FAQ Category</a>
                    <a href="{{ route('admin.addFaqQuestion') }}" class="list-group-item list-group-item-action">Add FAQ Question</a>
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
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
