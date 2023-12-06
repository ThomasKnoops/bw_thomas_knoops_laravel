@extends('layouts.adminPannel')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($contacts as $contact)
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4> from {{ $contact->email }}</h4>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <small>{{ $contact->created_at->format('d/m/y \o\m H:i') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> {{ $contact->message }} </p>
                                        </div>
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
