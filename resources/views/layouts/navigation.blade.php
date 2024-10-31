 <nav class="navbar glass" style="height: 70px">
            <span
                ><a href="{{route('dashboard')}}" style="display: flex; align-items: center"
                    ><img
                        class="img2"
                        src="{{asset('assets/img/mountain.png')}}"
                        width="40"
                        style="margin: -25px -10px -25px -20px"
                    />
                    <h1 class="logo">&nbsp;East Java Etourism</h1></a
                ></span
            >
            <ul class="nav-links">
                <li>
                    <a href="{{route('dashboard')}}" id="pri" class="active cir_border">Home</a>
                </li>
                <li>
                    <a href="{{route('destinations.index')}}" id="tri" class="cir_border">Tours</a>
                </li>
                <li>
                    @if (Auth::user())
                        <a href="/dashboard#about" id="quad" class="cir_border">About</a>
                    @else
                        <a href="#about" id="quad" class="cir_border">About</a>
                    @endif
                </li>
                <li>
                    @if (Auth::user())
                        <a href="/dashboard#contact" id="quad" class="cir_border">Contact</a>
                    @else
                        <a href="#contact" id="quad" class="cir_border">Contact</a>
                    @endif
                </li>
                <li>
                    <a href="{{route('logout')}}" class="cir_border">Logout</a>
                </li>
                <li>
                    <a href="{{route('profile.index')}}" class="cir_border">Profile</a>
                </li>

                <li>
                    <div>
                        <input
                            type="checkbox"
                            class="checkbox dark"
                            id="checkbox"
                        />
                        <label for="checkbox" class="label">
                            <i class="fa fa-moon-o"></i>
                            <i class="fa fa-sun-o"></i>
                            <div class="ball"></div>
                        </label>
                    </div>
                </li>
            </ul>
            {{-- <img src="{{asset('assets/img/menu-btn.png')}}" alt="" class="menu-btn" /> --}}
        </nav>  