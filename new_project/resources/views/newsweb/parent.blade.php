<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>news</title>



    <!-- Bootstrap core CSS -->
    <link href="{{asset('newsweb/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('newsweb/css/modern-business.css')}}" rel="stylesheet">
    <link href="{{asset('newsweb/css/account.css')}}" rel="stylesheet">


</head>

<body>

<!-- Navigation -->

    

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        @auth('user')

        <ul class="nav navbar navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span> 
                    <strong>{{Auth::guard("user")->user()->name}}</strong>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-login">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-center">
                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                    </p>
                                
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-left"><strong><strong>{{Auth::guard("user")->user()->name}}</strong>
                                    </strong></p>
                                    <p class="text-left small"><strong>{{Auth::guard("user")->user()->email}}</strong>
                                    </p>
                                    <p class="text-left">
                                        <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="navbar-login navbar-login-session">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>
                                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-block">Logout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    


        @else 
        @guest
            
        <a class="navbar-brand" href="index.html">news</a>
        <a class="navbar-brand" href={{route('user.login')}}>login</a>
        <a class="navbar-brand" href="{{route('register.create')}}">register</a>
        @endguest
        @endauth

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('newsweb.index')}}">home</a>
                </li>
           @foreach ($category as $item)
               <li>
            <a class="nav-link" href="{{route('newsweb.allnews',[$item->id])}}">{{$item->name_en}}</a>
                </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{route('newsweb.create')}}">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

@yield('constant')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Hassan</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
<script src="{{asset('newsweb/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('newsweb/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
