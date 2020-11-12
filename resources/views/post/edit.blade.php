@extends('layouts.app')
@section('title', 'Post page')
@section('content')

	{{-- container --}}
	<div class="container">
		{{-- <a href="{{route('catcreate')}}" class="btn btn-success">Category</a> --}}

		<a href="{{route('post')}}" class="btn btn-primary">Post</a>

		{{-- <a href="{{route('imgcreate')}}" class="btn btn-dark">ImgCreate</a> --}}


		{{-- row --}}
		<div class="row justify-content-center">
			{{-- col-md-8 --}}
			<div class="col-md-8">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}

						@if(session('success'))

							<div class="alert alert-success">
								{{session('success')}}
							</div>

						@endif


					<div class="card-body">

						

						<form action="{{route('edit', $post->id)}}" method="POST" enctype="multipart/form-data">
							@csrf

							<div class="form-group">
								<label for="exampleInputEmail1">Title</label>
								<input type="text" name="title" class="form-control" value="{{$post->title}}">
									@error('title')

									<small style="color: red;">{{$message}}</small>

									@enderror
							</div>



							<div class="form-group">
								<label for="exampleInputEmail1">Category</label>
								<select name="category_name" class="form-control">
									@foreach($categoriespost as $categories)
									<option value="{{$categories->id}}" {{($categories->id==$post->category->id)?'selected':null}}>{{$categories->name}}</option>
									@endforeach
								</select>
									@error('title')

									<small style="color: red;">{{$message}}</small>

									@enderror
							</div>


							


							<div class="form-group">
								<label for="exampleInputEmail1"> Description</label>
								<textarea name="description" rows="10" class="form-control">{{$post->description}}</textarea>
									@error('title')

									<small style="color: red;">{{$message}}</small>

									@enderror
							</div>




								<div class="form-group">
								<label for="exampleInputEmail1">Image</label>
								<input type="file" name="image[]" multiple>
									@error('image[]')

									<small style="color: red;">{{$message}}</small>

									@enderror
								</div>


								<button type="submit" class="btn btn-primary">Update</button>
								<a href="{{route('post')}}" class="btn btn-danger">Cancle</a>
							
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