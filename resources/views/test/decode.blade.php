<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/test/decode_do')}}" method="post">
    @csrf
    <textarea name="encode" id="" cols="70" rows="20"></textarea>
    <input type="submit"value="解密">
</form>
</body>
</html>