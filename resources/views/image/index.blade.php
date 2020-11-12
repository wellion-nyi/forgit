
@extends('layouts.app')
@section('title', 'Post page')
@section('content')

	{{-- container --}}
	<div class="container">
		{{-- <a href="{{route('catcreate')}}" class="btn btn-success">Category</a> --}}

		<a href="{{route('post')}}" class="btn btn-primary">Post</a>
		{{-- row --}}
		<div class="row justify-content-center">
			{{-- col-md-8 --}}
			<div class="col-md-8">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
{{-- 
						@if(session('success'))

							<div class="alert alert-success">
								{{session('success')}}
							</div>

						@endif
 --}}

					<div class="card-body">

						

						<form action="{{route('imgstore')}}" method="POST" enctype="multipart\form-data">
							@csrf

							




								<div class="form-group">
								<label for="exampleInputEmail1">Image</label>
								<input type="file" name="image" class="form-control">
									@error('image')

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