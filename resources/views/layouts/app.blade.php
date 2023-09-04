<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Internal Task Management System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <style>
        
        .footer{  
            width: 1300px;
            bottom: 0;
        }
        .button-footer{
            
            color: #4a4848;
        }
        .header{
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-dark-rgb), 
            var(--bs-bg-opacity)) !important;
            text-align: center;
            color: white;
        }
        
        


    </style>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">TMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">

                @auth
                <!-- If the user is authenticated (not a guest), show the navigation links -->
                <ul class="navbar-nav" id="navbar-nav-left">
                    <!-- ... (your other navigation links) ... -->
                    <ul class="navbar-nav" id="navbar-nav-left">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Announcement
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/articles">All Announcement</a></li>
                    <li><a class="dropdown-item" href="{{ url('/articles/create') }}">Create Announcement</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Merchandise
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/goods">Goods</a></li>
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li><a class="dropdown-item" href="#">Transaction</a></li>
                    @endif
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Feedback
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/feedback">Write A Feedback</a></li>
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li><a class="dropdown-item" href="/feedback/index">Check Feedback</a></li>
                    @endif
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Crowd
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/crowd-control">Crowd Control</a></li>

                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    HR
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/leave">Leave Application</a></li>
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li><a class="dropdown-item" href="/admin/leave/index">All Application</a></li>
                    
                    @endif
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Timetable
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/assigned-jobs">Check Timetable</a></li>
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li><a class="dropdown-item" href="{{ url('/admin/create-job') }}">Create Job</a></li>
                    <li><a class="dropdown-item" href="{{ url('/admin/assign-jobs') }}">Assign Job</a></li>
                    @endif
                </ul>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/profile">View Profile</a></li>
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li><a class="dropdown-item" href="{{ url('/users') }}">All User</a></li>
                    @endif
                </ul>
                </li>
                <li class="nav-item dropdown">
                
                
                </li>
                  
            </ul>
                </ul>
                @endauth

                <ul class="navbar-nav ms-auto">
                        
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        @if (Auth::check() && Auth::user()->role == "admin")
                                            (admin)
                                        @endif

                                    </a>
                                    
                                    

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                      
                                    
                                    
                
                                    </div>
                                </li>
                            @endguest
    </ul>
            </div>
        </div>
    </nav>

    <div id="app">
        <main class="py-4">
            @include('flash_messages')
            @yield('content')
        </main>
    </div>
    
    <!-- ... (remaining HTML code, including footer) ... -->
</body>
</html>
