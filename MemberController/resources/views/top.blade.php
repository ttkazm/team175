<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    

<div>
    <div>
        <a href="/register">>>登録</a>
    </div>
    <div>
        <table>
            <tr>
                <th>名前</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th> </th>
            </tr>
            @foreach($member as $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->tel}}</td>
                    <td>{{$value->email}}</td>
                    <td><a href="/edit/{{$value->id}}"> >>編集</a></td>
                </tr>
            @endforeach    
        </table>
    </div>
</div>

</body>
</html>