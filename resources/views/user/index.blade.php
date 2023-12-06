@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Public Profiles</div>

                <div class="card-body">
                    @foreach($users as $user)
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src='{{ asset($user->profile_photo_path) }}' alt='avatar' width=100px height=100px>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h3>{{ $user->name }}</h3>
                                        <h4>{{ $user->birthday }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                
                                {{ $user->bio }}
                                 
                            </div>
                        </div> <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
