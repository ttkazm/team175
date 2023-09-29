@extends('layouts.app')
@vite('resources/sass/app.scss')
@section('content')

<div class="bg-light">
	@if($errors->any())
	<div style="color:red">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="fs-3 fw-bolder m-2 p-1">
		商品登録
	</div>
	<div class="form-group">
		<form action="{{ route('store') }}" method="POST">
			@csrf
			<div class="col-sm-6  m-2 p-1">
				<label class="fs-5 col-sm-3 control-label m-1">商品名</label>
				<input class="form-control bg-white" type="text" name="name" value="{{ old('name') }}">
			</div>
			<div class="col-sm-6 m-2 p-1">
				<label class="fs-5 col-sm-3 control-label m-1">種別</label>
				<select name="type_id" class="form-control bg-white">
					@foreach ($types as $type)
					<option value="{{ $type->id }}" @selected($type->id == old('type_id'))>
						{{ $type->type_name }}
					</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-6 m-2 p-1">
				<label class="fs-5 col-sm-3 control-label m-1">詳細</label>
				<textarea name="detail" class="form-control bg-white"></textarea>
				<!-- <input class=" form-control bg-white" type="text" name="detail" value="{{ old('detail') }}"> -->
			</div>
			<div class="m-2 pt-2">
				<input type="submit" value="登録" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection