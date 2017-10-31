<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Elmoled  Registration</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

<div class="container">

        <form class="form-signin" action="{{ route('signup') }}" method="post">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">Registration</h2>
            <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <label for="inputPasswordConfirmation" class="sr-only">Confirm Password</label>
                <input type="password" id="inputPasswordConfirmation" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        </form>

    @if(count($errors) > 0)
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div> <!-- /container -->

<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/script.js"></script>
</body>
</html>
