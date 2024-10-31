<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>East Java Etourism</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="{{asset('assets/img/apple-touch-icon.png')}}"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="{{asset('assets/img/favicon-32x32.png')}}"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="{{asset('assets/img/favicon-16x16.png')}}"
        />
        <link rel="manifest" href="{{asset('assets/img/site.webmanifest')}}" />
    </head>
    <body 
        onload='if (window.location.href.substr(window.location.href.length - 6) == "#about") { introAboutLogoTransition(); }'
    >
        <!--navbar-->
        <nav class="navbar glass" style="height: 70px">
            <span
                ><a href="#home" style="display: flex; align-items: center"
                    ><img
                        class="img2"
                        src="{{asset('assets/img/mountain.png')}}"
                        width="40"
                        style="margin: -25px -10px -25px -20px"
                    />
                    <h1 class="logo">&nbsp;East Java Etourism</h1></a
                ></span
            >
            </ul>
            <img src="{{asset('assets/img/menu-btn.png')}}" alt="" class="menu-btn" />
        </nav>
        <!--navbar-->

        <header id="home">
            <div class="header-content">
                <h2 id="quote">Explore the East Java</h2>
                <div class="line"></div>
                <h1>WONDERFUL JAWA TIMUR</h1>
                @if (Auth::user())
                <a  href="{{route('dashboard')}}"
                    class="ctn"
                    onclick='removeall(); $("#quad").css("border", "2px solid whitesmoke"); $("#quad").css("border-radius", "20px");'
                    >Lets start journey!!!</a
                >
                @else
                <a  href="{{route('login')}}"
                    class="ctn"
                    onclick='removeall(); $("#quad").css("border", "2px solid whitesmoke"); $("#quad").css("border-radius", "20px");'
                    >Lets start journey!!!</a
                >
                @endif
               
            </div>
        </header>

        </body>
</html>
