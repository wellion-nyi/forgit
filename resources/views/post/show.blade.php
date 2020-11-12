@extends('layouts.app')
@section('title', 'Post page')
@section('content')

	<div class="container">
	<a href="{{route('post')}}" class="btn btn-primary">Posts</a>

	


		
	<div class="row justify-content-center" style="margin-bottom: 10px;">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4>{{$post->title}}</h4>
					<hr>


						
							
							<div class="il" style="padding-top: 20px;">
								<img src="{{asset('/storage/uploads/'. $post->image )}}" class="img-thumbnail" style="width: 100%;">
							</div>
							
					
						


					<div class="dateinfo">
						<span style="margin-left: 80%;">{{$post->user->name}}</span>
						<p>Date: {{$post->created_at}}</p>

					</div>

					<p>
						{{$post->description}}
					</p>



					
				</div>

				
			</div>
		</div>
	</div>
	

</div>
	


@endsection