<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form id="loginFrom" method="POST" action="{{url('admin/login')}}">
            @csrf
            <div class="form-group">
                <label for="">code</label>
                <input name="code" class="form-control" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input name="password" type="password" class="form-control" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">دخول</button>
            </div>
        </form>
    </div>
</body>
</html>
