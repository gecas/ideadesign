<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body id="app-layout">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ URL::asset('js/script.js') }}"></script>

<ul class="inner_menu">
    <?php $menuItems = \App\Menu_item::all();

    ?>
    <li class="bar_left" style="background:  url('{{ asset('images/bg_menu_bar_left.png') }}' )">
        <div class="burger_place">
            <a href="{{URL::to('/')}}" class="menu_logo">
                <img class="img_resonsive" src="{{ asset('images/idealogo.png') }}">
            </a>
            @include('layouts.burger')
        </div>


        <ul class="inner_menu_items">
            <?php $i = 0 ?>
            @foreach ($menuItems as $item)

            <li style="background: url(/images/menu_divider.png ) center bottom no-repeat;">
                <a href="{!! URL::route($item->name) !!} "
                   onclick="">
                    {!! $item->title !!}
                </a>
            </li>

            <?php $i++ ?>
        @endforeach
</ul>
    </li>

    <li class="inner_content">
        <div class="inner_title">
            @yield('title')
        </div>

        <div class="inner_bread">
            @yield('bread')
        </div>

        <div class="inner_photo">
            @yield('img')
        </div>

        <div class="inner_text">
            @yield('text')
        </div>

    </li>

    <li class="bar_right" style="background:  url('{{ asset('images/bg_menu_bar_right.png') }}' ) left">
        <div class="logo_area">
            <?php
            $logos = \App\Fabrication::all();?>
            @foreach ($logos as $logo)
                <a href="">
                    <img class="img_resonsive" src="{{'http://www.placecage.com/100/50'}}">
                </a>
            @endforeach
        </div>
    </li>

</ul>


<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
