@extends('layouts.app')
@section('title', 'Post page')
@section('content')

	{{-- container --}}
	<div class="container">
		<a href="{{route('create')}}" class="btn btn-success">Create</a>
		{{-- row --}}
		@foreach($forpost as $posts)
		<div class="row justify-content-center">
			{{-- col-md-8 --}}
			<div class="col-md-8">
				{{-- card --}}
				<div class="card" style="margin-bottom: 50px;">
					{{-- card-body --}}
					<div class="card-body" >

						<a href="{{route('show', $posts->id)}}" style="text-decoration: none; color: red; font-size: 20px;">{{$posts->title}}</a>
						<hr>

						@foreach($posts->images as $image)
							<div class="il" style="padding-top: 20px;">
								<img src="{{asset('/storage/uploads/'. $image->image)}}" class="img-thumbnail" style="width: 100%;">
							</div>
						@endforeach

						<span style="background-color: skyblue;">{{$posts->category->name}}</span>


						<p>
							{{str_limit($posts->description, $limit=200, $end='. . . . ?')}}
						</p>

						


						<div class="date">
							<p>date::{{\carbon\carbon::parse($posts->created_at)->format('Y-M-d')}}</p>
						</div>


						<div class="jump" style=" margin-bottom: 10px">

					<a href="{{route('edit', $posts->id)}}" style="margin-right: 30px; margin-left: 10px;" class="btn btn-primary">edit</a> 
					<a href="{{route('delete', $posts->id)}}" class="btn btn-danger" onclick="return confirm('Are your sure delete')">delete</a>
					


					<span style="margin-left: 50%;">{{$posts->user->name}}</span>

					
				</div>
						
						
					</div>
					{{-- end card-body --}}
				</div>
				{{-- end card --}}
			</div>
			{{-- end col-md-8 --}}
		</div>
		{{-- end row --}}
		@endforeach
	</div>
	{{-- end container --}}


@endsection

