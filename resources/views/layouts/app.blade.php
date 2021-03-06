<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crafty+Girls" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin|Patrick+Hand+SC|Poiret+One|The+Girl+Next+Door&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

    <style>

    body {
          font-family: 'Crafty Girls';
          background-image: url({{asset ('bg.jpg') }});
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;

         }
    .panel-heading-custom {
          color: white;
          background: rgb(233,84,32);
          border-color: rgb(233,84,32);
          border-top-left-radius:15px ;  
          border-top-right-radius:15px ; 
         }
    .panel-custom {
          background: rgba(225,225,225,0.5);
          border-radius: 15px; 
         }
    .panel-title-custom {
          font-family: 'Crafty Girls';
         }
    table{
          border-radius: 15px; 
          background: rgb(255,255,255); 
         }

    </style>



     
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<font>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style=" border-bottom-left-radius:15px ;  
          border-bottom-right-radius:15px ; ">
            <div class="container">
                <div class="navbar-header">
                  
                    <!-- Collapsed Hamburger -->
                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-windows"></i> 
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       @if (Auth::check())
                       <li><a href="{{url('/home')}}"><i class="fa fa-desktop"></i> Dashboard</a></li>
                       @endif
                       @role('admin')
                       <li><a href="{{route ('authors.index')}}"><i class="fa fa-users"></i> Penulis</a></li>
                       <li><a href="{{route ('books.index')}}"><i class="fa fa-book"></i> Buku</a></li>
                       <li><a href="{{route ('members.index')}}"><i class="fa fa-users"></i> Member</a></li>
                       <li><a href="{{route ('statistics.index')}}"><i class="fa fa-hand-grab-o"></i> Peminjaman</a></li>
                       @endrole
                       @if (auth()->check())
                       <li><a href="{{url('/settings/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                       @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                            <li><a href="{{ url('/register') }}"><i class="fa fa-user"></i> Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/settings/password')}}"><i class="fa fa-lock"></i> Ubah Password</li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts._logo')
        @include('layouts._flash')
        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="{{asset('/js/app.js')}}"></script>
    
    <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>
   

    
@yield('scripts')
   
    
</body>
</font>
</html>
