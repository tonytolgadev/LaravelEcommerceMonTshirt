<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/favicon.png')}}">

    <title>Mon T-Shirt</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/album.css')}}" rel="stylesheet">
    <link href="{{asset('css/tshirt.css')}}" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2846ee03da.js" crossorigin="anonymous"></script>

</head>

<body>

@include('layouts.header')

    <main role="main">

        <section class="py-5 text-center" style="background-image: url('http://www.lesitedelasneaker.com/wp-content/images/2018/09/jordan-brand-psg-collection-1.jpg')" style="background-repeat: no-repeat">
            <div class="container">
                <h1 class="jumbotron-heading" style="color: rgb(0, 162, 165)">MonTshirt</h1>
                <h2 class="jumbotron-heading" style="color: white">- - - - - - -</h2>

            </div>
        </section>

        @yield('content')

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Remontez</a>
            </p>
            {{-- <p>Mon T-Shirt</p> --}}
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>
