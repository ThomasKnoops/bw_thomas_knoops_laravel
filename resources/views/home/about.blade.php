@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPanel' : 'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Outer card header -->
                <div class="card-header"><h1>About</h1></div>
                <!-- Outer card body -->
                <div class="card-body">
                    <p>Edit profile is 'hidden' under your own name when logged in.</p>
                    <p>Sources:</p>
                    <ul>
                        <li><p>I used the Laravel documentation for most of the code.</p></li>
                        <li><p>I used the resources from the Canvas Crusus for most of the code.</p></li>
                        <li><p>These are other sources than the 2 mentioned above:</p></li>
                        <li><a href="https://www.youtube.com/watch?v=utm2YVJEM9c">https://www.youtube.com/watch?v=utm2YVJEM9c</a></li>
                        <li><a href="https://stackoverflow.com/questions/20633310/how-to-get-random-text-from-lorem-ipsum-in-php">https://stackoverflow.com/questions/20633310/how-to-get-random-text-from-lorem-ipsum-in-php</a></li>
                        <li><a href="https://marketsplash.com/tutorials/laravel/how-to-integrate-bootstrap-with-laravel/">https://marketsplash.com/tutorials/laravel/how-to-integrate-bootstrap-with-laravel/</a></li>
                        <li><a href="https://www.iankumu.com/blog/laravel-many-to-many-relationship/">https://www.iankumu.com/blog/laravel-many-to-many-relationship/</a></li>
                        <li><a href="https://divpusher.com/blog/how-to-run-laravel-on-windows-with-xampp/">https://divpusher.com/blog/how-to-run-laravel-on-windows-with-xampp/</a></li>
                        <li><a href="https://makitweb.com/laravel-database-seeding-tutorial/">https://makitweb.com/laravel-database-seeding-tutorial/</a></li>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
