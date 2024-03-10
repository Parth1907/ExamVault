<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>College Edu Cell</title>
</head>

<body>
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto">
            <button class="block navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">



                {{-- Right Side Of Navbar --}}
                <ul class="ml-auto flex gap-2"><!-- class="list-unstyled d-flex justify-content-end mr-2 gap-2" -->

                    @auth
                        <li class="">
                            <a id="navbarDropdown" class="" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="mt-2 w-48 bg-white border rounded-md shadow-lg" aria-labelledby="navbarDropdown">
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('logout-form').submit();
                                ">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @else
                        <li class="">
                            <a class="" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="">
                            <a class="" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
