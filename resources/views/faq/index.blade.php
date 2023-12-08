@extends(auth()->check() && auth()->user()->is_admin ? 'layouts.adminPanel' : 'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Outer card header -->
                <div class="card-header"><h1>FAQ</h1></div>
                <!-- Outer card body -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @foreach($faq_categories as $category)
                        <div class="card">
                            <!-- Inner card header (category) -->
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3> {{ $category->name }} </h3>                                 
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if(auth()->check() && auth()->user()->is_admin)
                                            <a href="{{ route('faq.editCategory', $category->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('faq.deleteCategory', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Inner card body (category) -->
                            <div class="card-body">
                                @foreach($category->faqs as $faq)
                                    <div class="card">
                                        <!-- Inner Inner card header (question) -->
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5> {{ $faq->question }} </h5>                               
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    @if(auth()->check() && auth()->user()->is_admin)
                                                        <a href="{{ route('faq.editQuestion', $faq->id) }}" class="btn btn-primary">Edit</a>
                                                        <form action="{{ route('faq.deleteQuestion', $faq->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- Inner Inner card body (answer) -->
                                        <div class="card-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
