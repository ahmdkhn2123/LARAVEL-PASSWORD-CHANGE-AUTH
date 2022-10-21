<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<head>
<title>Userpage</title>
<body>

<h1 class="text-center">Change Password Below</h1>
<div class="container">
    <div class="row">
        <div class="col-md-5" style="margin:auto;">
        @if ($errors->any())
        @foreach ($errors->all() as $err )
            <li>{{$err}}</li>
        @endforeach
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif


        @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
            <form action="/changepassword/{{session::get('userid')['id']}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>

                <div class="mb-3">
                    <label>Confim Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter Confirm Password">
                </div>


                <button type="submit" class="btn btn-success">Change Password</button>

            </form>
            <a href="/logout" class="btn btn-success" style="float:right">Logout</a>
        </div>
    </div>
</body>
</html>
