<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/test/verify')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>字段名</td>
            <td><input type="text" class="name"></td>
            <td>字段值</td>
            <td><input type="text" class="value"></td>
        </tr>
        <tr style="display:none">
            <td>字段名</td>
            <td><input type="text" class="name"></td>
            <td>字段值</td>
            <td><input type="text" class="value"></td>
        </tr>
        <tr>
            <td><button type="button" id="butclone">添加字段</button></td>
            <td><button type="button" id="delclone">删除字段</button></td>
        </tr>
    </table>
    <table>
        <tr>
            <td>base64加密过得签名</td>
        </tr>
        <tr><td><textarea name="base" id="" cols="30" rows="10"></textarea></td></tr>
    </table>
    <input type="submit" value="验证">
</form>
</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(function(){
        $(document).on('blur','.name',function(){
            var _val=$(this).val();
            $(this).parents('tr').find('.value').attr('name',_val);
        })
        $(document).on('click','#butclone',function(){
            $(this).parents('tr').prev('tr').clone().insertBefore($(this).parents('tr').prev('tr'));
            $(this).parents('tr').prev('tr').prev('tr').show();
        })
        $(document).on('click','#delclone',function(){
            $(this).parents('tr').prev('tr').prev('tr').remove()
        })
    })
</script>