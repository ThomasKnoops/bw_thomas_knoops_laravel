@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPanel' : 'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Outer card header -->
                <div class="card-header"><h1>Public Profiles</h1></div>
                <!-- Outer card body -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($users as $user)
                        <div class="card">
                            <!-- Inner card header -->
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src='{{ asset($user->profile_photo_path) }}' alt='avatar' width=100px height=100px>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h3>{{ $user->name }}</h3>
                                        <h4>{{ $user->birthday->format('d/m/Y') }}</h4>
                                        @if($user->is_admin)
                                            <h4>Admin</h4>
                                        @endif
                                        @if(Auth::user()->is_admin && !$user->is_admin)
                                        <form action="{{ route('user.makeAdmin', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Make Admin</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Inner card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ $user->bio }}
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if(Auth::user()->id == $user->id)
                                            <p><small>Followers: {{ $user->followers->count() }}</small></p>
                                        @elseif(Auth::user()->following->contains($user))
                                            <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Unfollow</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.follow', $user->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Follow</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div> <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
