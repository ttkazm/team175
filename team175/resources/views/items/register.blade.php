<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>商品登録画面</title>
</head>

<body>
	<form action="{{ route('store') }}" method="POST">
		@csrf
		<div>
			<label>名前</label>
			<input type="text" name="name">
		</div>
		<div>
			<label>種別</label>
			<select name="type_id">
				@foreach ($types as $type)
				<option value="{{ $type->id }}">
					{{ $type->type_name }}
				</option>
				@endforeach
			</select>
		</div>
		<div>
			<label>詳細</label>
			<input type="text" name="detail">
		</div>
		<input type="submit" value="登録">
	</form>
</body>

</html>