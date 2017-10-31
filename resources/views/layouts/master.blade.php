
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>El Moled CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/cosmo.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset ('css/custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">


    <script>

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23019901-1']);
        _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('home') }}" class="navbar-brand">El Moled</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('artists') }}">Artists</a>
                </li>
                <li>
                    <a href="{{ route('albums') }}">Albums</a>
                </li>
                <li>
                    <a href="{{ route('tracks') }}">Tracks</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>

    </div>
</div>


<div class="container">

    @yield('content')

</div>


<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/script.js"></script>
</body>
</html>
