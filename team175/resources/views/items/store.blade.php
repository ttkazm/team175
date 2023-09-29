<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>商品登録画面</title>
</head>

<body>
	@if($errors->any())
		<div style="color:red">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{ route('store') }}" method="POST">
		@csrf
		<div>
			<label>商品名</label>
			<input type="text" name="name" value="{{ old('name') }}">
		</div>
		<div>
			<label>種別</label>
			<select name="type_id">
				@foreach ($types as $type)
				<option value="{{ $type->id }}"
				@selected($type->id == old('type_id'))>
					{{ $type->type_name }}
				</option>
				@endforeach
			</select>
		</div>
		<div>
			<label>詳細</label>
			<input type="text" name="detail"  value="{{ old('detail') }}">
		</div>
		<input type="submit" value="登録">
	</form>
</body>

</html>