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
       @include('layouts.navigation')
        <!--navbar-->

        <header id="home">
                        <div class="explore-content">
                <h2 id="quote">Explore the East Java</h2>
                <div class="line"></div>
                <h1>WONDERFUL JAWA TIMUR</h1>
                <p>
                    “Jelajahi keindahan alam Jawa Timur yang memukau,
                    dari pesona gunung-gunung yang megah hingga pantai-pantai
                    eksotis di Selatan Jawa Timur. Karena, setiap sudut menyimpan
                    keajaiban alam yang menunggu untuk di eksplorasi.
                </p>
                <a href="#tours" class="ctn">Explore more</a>
            </div>
        </header>

        <!--Explore-->

        <!--tours-->
        <section class="tours" id="tours">
            <div class="container row">
                <div class="col content-col">
                    <h1 class="font-color">UPCOMING TOURS & DESTINATION</h1>
                    <div class="line"></div>
                    <p>
                        Kenjeran beach
                        View. <br />
                        Sat 1 oct 2024 :  Tour of Kenjeran Beach.<br />
                        Tues 4 oct 2024 : Tour of Suramadu
                        <br />
                        and many more ......
                    </p>
                    <a href="{{route('destinations.index')}}" class="ctn">Learn more</a>
                </div>
                <div class="image-col">
                    <div class="image-gallery">
                        <img src="{{asset('assets/img/DSC00451.JPG')}}" alt="" />
                        <img src="{{asset('assets/img/img4.png')}}" alt="" />
                        <img src="{{asset('assets/img/img5.png')}}" alt="" />
                        <img src="{{asset('assets/img/img6.png')}}" alt="" />
                    </div>
                    <li>
                        <a href="/dashboard/tours/surabaya" id="pri" class="active cir_border">Surabaya</a>
                    </li>
                    <br />
                    <li><a href="/dashboard/tours/malang" id="sec" class="active cir_border">Malang</a></li>
                    <br />
                    <li>
                        <a href="/dashboard/tours/kediri" id="tri" class="active cir_border">Kediri</a>
                    </li>
                    <br />
                    <li>
                        <a href="/dashboard/tours/banyuwangi" id="quad" class="active cir_border">Banyuwangi</a>
                    </li>
                    <br />
                    <li><a href="/dashboard/tours/gresik" id="quint" class="active cir_border">Gresik</a></li>
                    <br />
                    <li>
                        <a href="/dashboard/tours/jember" id="hept" class="active cir_border">Jember</a>
                    </li>
                </div>
            </div>
            <br /><br /><br /><br />
        </section>
        <!--tours-->

        <!-- About -->
        <section id="about">
            <div class="title">
                <h1 class="font-color">About Us</h1>
                <div class="line"></div>
            </div>
            <br />
            <div id="about_us">
                <div class="boxx">
                    <div class="containerx">
                        <input type="radio" name="slider" id="item-1" checked />
                        <input type="radio" name="slider" id="item-2" />
                        <input type="radio" name="slider" id="item-3" />
                        <div class="cards">
                            <label class="cardt" for="item-1" id="col-img-1">
                                <img src="{{asset('assets/img/carousel-img4.jpg')}}" />
                            </label>
                            <label class="cardt" for="item-2" id="col-img-2">
                                <img src="{{asset('assets/img/carousel-img5.jpg')}}" />
                            </label>
                            <label class="cardt" for="item-3" id="col-img-3">
                                <img src="{{asset('assets/img/carousel-img6.jpg')}}" />
                            </label>
                            
                        </div>
                    </div>
                    <span id="about-quad"
                        ><a href="#home"
                            ><center>
                                <h1
                                    style="
                                        font-family: var(--ff-montserrat);
                                        color: white;
                                    "
                                >
                                    Find that
                                </h1>
                                <br />
                                <img
                                    class="img2"
                                    src="{{asset('assets/img/mountain_dark.jpg')}}"
                                    width="200"
                                    style="border-radius: 12%"
                                />
                                <br />
                                <h1 class="logo" style="font-size: 50px">
                                    Tourism
                                </h1>
                            </center>
                        </a>
                    </span>
                </div>
            </div>
        </section>
        <!-- About -->

        <!-- contact -->
        <section id="contact">
            <div class="title">
                <h1 class="font-color">Contact Us</h1>
                <div class="line"></div>
            </div>
            <div class="contact_us">
                <form class="cform" action="" method="post">
                    <div class="crow-message">
                        <h1 class="color">Send us a message</h1>
                        <div></div>
                    </div>
                    <div class="crow-in">
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Your name"
                        />
                        <input
                            type="text"
                            id="email"
                            name="email"
                            placeholder="Your Email"
                        />
                    </div>
                    <div class="crow">
                        <div class="ccol-left">
                            <select name="country" id="country">
                                <option value="Malang">Malang</option>
                                <option value="Banyuwangi">Banyuwangi</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Kediri">Kediri</option>
                                <option value="Gresik">Gresik</option>
                                <option value="Jember">Jember</option>
                            </select>
                        </div>
                    </div>
                    <div class="crow">
                        <div class="ccol-left">
                            <textarea
                                type="text"
                                id="remarks"
                                name="remarks"
                                placeholder="Your Remarks....."
                                style="height: 150px"
                            ></textarea>
                        </div>
                    </div>
                        <a class="crow-s" value="Submit" href="login.html">Submit</a>
                    </form>
                    
                </form>
                <div class="cbox">
                    <div>
                        <p class="cbox-message">
                            Prefer some other way ?<br />Reach us by using the
                            details given below
                        </p>
                        <div class="cbox-line"></div>
                    </div>
                    <div class="c_boxx">
                        <a href="mailto:abc@gmail.com"
                            ><i class="fa fa-envelope"></i>
                            Mail: aldyto.jetbus88@gmail.com
                        </a>
                    </div>
                    <div class="c_boxx">
                        <a href="tel:+91-12345-67890"
                            ><i class="fa fa-phone"></i>
                            Phone: (+62) 852-3445-6088
                        </a>
                    </div>
                    <div class="c_boxx">
                        <a href="#"
                            ><i class="fa fa-map-marker"></i>
                            Location: Jawa timur, Indonesia
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact  -->
        <!-- up scroll -->
        <i class="arrow"  onclick="topFunction()" id="upbtn"></i>
        <!-- end -->
        <!--footer-->
        <section class="footer">
            <span
                >Created By Dyto Fadhil | &#169; 2024 All rights
                reserved.</span
            >
            <div class="social">
                <li>
                    <a
                        href="https://pritam-sarbajna-portfolio.netlify.app/"
                        target="_blank"
                        rel="noreferrer"
                        ><i class="fa fa-globe"></i
                    ></a>
                    <a
                        href="https://github.com/PritamSarbajna"
                        target="_blank"
                        rel="noreferrer"
                        ><i class="fa fa-github"></i
                    ></a>
                    <a
                        href="https://www.linkedin.com/in/pritam-sarbajna-74945821b/"
                        target="_blank"
                        rel="noreferrer"
                        ><i class="fa fa-linkedin-square"></i
                    ></a>
                </li>
            </div>
        </section>
        <!--footer-->

        <script>
            const menuBtn = document.querySelector(".menu-btn");
            const navlinks = document.querySelector(".nav-links");

            menuBtn.addEventListener("click", () => {
                navlinks.classList.toggle("mobile-menu");
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{asset('assets/js/script.js')}}"></script>
    </body>
</html>
