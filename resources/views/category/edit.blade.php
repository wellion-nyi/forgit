@extends('layouts.app')
@section('title', 'Edit page')
@section('content')

	{{-- container --}}
			<div class="container">
				<a href="{{route('catcreate')}}" class="btn btn-primary">BackCreate</a>
				{{-- row --}}
				<div class="row justify-content-center">
					{{-- col-md-8 --}}
					<div class="col-md-8">
						{{-- card --}}
						<div class="card">
							{{-- card-body --}}
							<div class="card-body">

								@if(session('success'))
									<div class="alert alert-success">{{session('success')}}</div>	
								@endif
								
								<form action="{{route('catupdate', $post->id)}}" method="POST">
									@csrf
									
									<div class="form-group">
									
									<label for="exampleInputEmail1">Category</label>
									<input type="text" name="category_name" class="form-control" value="{{$post->name}}">
									@error('category_name')
										<small style="color: red;">{{$message}}</small>
									@enderror

								</div>

									
								<button type="submit" class="btn btn-primary">Post</button>

								</form>



							</div>
							{{-- end card-body --}}
						</div>
						{{-- end card --}}


						


					</div>
					{{-- end col-md-8 --}}
				</div>
				{{-- end row --}}

					





			</div>
		{{-- end container --}}


@endsection