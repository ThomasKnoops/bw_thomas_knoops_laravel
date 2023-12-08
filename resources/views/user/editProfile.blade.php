@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPanel' : 'layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Edit Profile</h1></div>

                    <div class="card-body">
                        @if ($errors->has('avatar'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('avatar') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$user->birthday->format('Y-m-d')}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3" required>{{ old('bio', $user->bio) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="avatar" class="form-label">New Avatar</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
