@extends('layouts.app')
@section('title', 'Create page')
@section('content')

		{{-- container --}}
			<div class="container">
				<a href="{{route('create')}}" class="btn btn-primary">Create</a>
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
								
								<form action="{{route('catstore')}}" method="POST">
									@csrf
									
									<div class="form-group">
									
									<label for="exampleInputEmail1">Category</label>
									<input type="text" name="category_name" class="form-control">
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

						{{-- Out card --}}
							<div class="row justify-content-center" style="margin-top: 100px;">
									<div class="col-md-8">
									
									<div class="card">
										<div class="card-body">
											
											<table class="table table-hover">
												<thead>
													<tr style="color: red;">
														<th>Id</th><th>name</th><th>created_at</th><th>action</th>
													</tr>
												</thead>

												@foreach($categoriespost as $key=>$categories)
												<tbody>
													<tr >
														<td {{++$key}}>{{$categories->id}}</td><td>{{$categories->name}}</td><td>{{\carbon\carbon::parse($categories->created_at)->format('Y-M-d')}}</td>
														<td>
															<a href="{{route('catedit', $categories->id)}}">Edit</a> &nbsp; &nbsp; &nbsp;
															<a href="{{route('catdelete', $categories->id)}}">Delete</a>
														</td>
													</tr>
												</tbody>
												@endforeach




											</table>

										</div>
									</div>
								</div>
							</div>

						{{-- end Out card --}}





			</div>
		{{-- end container --}}


@endsection