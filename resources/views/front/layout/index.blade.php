<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.home.head')
    <style>
        .main-content-page{
            margin-top: 100px;
        }
        .wrap-menu-desktop{
            background-color: #1a202c !important;
        }
    </style>
</head>
<body class="animsition">

@include('parts.navbar')
@include('parts.cartsbar')

<!-- Product -->
<div class="main-content-page">
    @yield('content')
</div>

@include('parts.footbar')
@include('front.home.scripts')
</body>
</html>
