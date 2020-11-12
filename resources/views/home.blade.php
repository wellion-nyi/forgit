@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('post')}}" class="btn btn-primary">Posts</a>
                     <a href="{{route('create')}}" class="btn btn-success">Create post</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
