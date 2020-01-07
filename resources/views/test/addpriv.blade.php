<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/test/creapub')}}" method="post">
    @csrf
    <textarea name="pub_key" id="" cols="70" rows="25"></textarea>
    <input type="submit"value="添加">
</form>
</body>
</html>