<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:06:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Computer - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
{{--    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />--}}
    <!-- Custom styles for this template -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/style-responsive.css')}}" rel="stylesheet" />


</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{route('login')}}" method="post">
        @csrf
        <h2 class="form-signin-heading">Master Computer</h2>
        <div class="login-wrap">
    {{--            <input type="email" class="form-control" placeholder="User ID" autofocus>--}}
                <select class="form-control" name="email" >
                    <option disabled selected> Select User </option>

                    @foreach($users as $user)
                        <option value="{{$user->email}}">{{$user->name}} </option>
                    @endforeach
                </select>
                <br/>
                <input type="password" class="form-control" placeholder="Password" name="password">
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>

    </form>

</div>



<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:06:10 GMT -->
</html>
