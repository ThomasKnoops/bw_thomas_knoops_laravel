@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPanel' : 'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>About</h1></div>
                <div class="card-body">
                    <p>Edit profile is 'hidden' under your own name when logged in.</p>
                    <p>Sources:</p>
                    <ul>
                        <li><a href="https://laravel.com/docs/8.x/eloquent">https://laravel.com/docs/8.x/eloquent</a></li>
                        <li><a href="https://www.youtube.com/watch?v=utm2YVJEM9c">https://www.youtube.com/watch?v=utm2YVJEM9c</a></li>
                        <li><a href="https://stackoverflow.com/questions/20633310/how-to-get-random-text-from-lorem-ipsum-in-php">https://stackoverflow.com/questions/20633310/how-to-get-random-text-from-lorem-ipsum-in-php</a></li>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
