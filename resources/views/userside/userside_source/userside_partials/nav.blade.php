<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop" style="top:0px;">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="{{ route('/') }}" class="logo">
                    <img src="{{ asset('assits/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin-top: 9px " >
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                           <a href="{{ route('/') }}">Home</a>
                        </li>
                        
                        <li>
                            <a href="">Trade</a>
                        </li>
                        <li>
                           <a href="{{ route('about') }}">About</a>
                        </li>
                        
                        <li>
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>

          

                <!-- Buttons (Login/Logout/Register/Profile) -->
                <ul style=" display: flex; gap: 10px; list-style: none; margin: 0; padding: 0;">
                    @guest
                    <li>
                        <a href="{{ route('login') }}" style="    margin-left: 509px; display: inline-block; padding: 10px 15px; background-color: #000000; color: white; border-radius: 5px; text-decoration: none; font-size: 14px; font-weight: bold;">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" style="display: inline-block; padding: 10px 15px; background-color: #ffffff; color: rgb(0, 0, 0); border-radius: 5px; text-decoration: none; font-size: 14px; font-weight: bold;">Register</a>
                    </li>
                    @else
                    <li style="position: relative; margin-left: 650px;">
                        <a href="#" onclick="toggleDropdown()" style=" display: inline-block; padding: 10px 15px; background-color: #7c99b5; color: white; border-radius: 5px; text-decoration: none; font-size: 14px; font-weight: bold; ">
                            <i class="fa fa-user"></i>
                        </a>
                        <div id="dropdownMenu" style="display: none; position: absolute; background-color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 5px; margin-top: 5px;">
                            <a href="{{ route('user.profile') }}" style="display: block; padding: 10px 15px; text-decoration: none; color: black;">Profile</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: block; padding: 10px 15px; text-decoration: none; color: red;">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
   
                <script>
                    function toggleDropdown() {
                        var dropdown = document.getElementById('dropdownMenu');
                        dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
                    }

                    // Close dropdown when clicking outside
                    window.onclick = function(event) {
                        if (!event.target.closest('li')) {
                            var dropdown = document.getElementById('dropdownMenu');
                            if (dropdown.style.display === 'block') {
                                dropdown.style.display = 'none';
                            }
                        }
                    }
                </script>
   <!-- Wishlist icon -->
                <div class="wishlist-icon">
                    <ul style=" display: flex; gap: 10px; list-style: none; margin: 0; padding: 0;">
                        <li>
                            <a href="{{ route('wishlist.index') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                <i class="zmdi zmdi-favorite-outline"></i> 
                            </a>
						</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
        </div>
        
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <div class="logo-mobile">
            <a href="index.html">
                <img src="{{ asset('assits/images/icons/image.png') }}" alt="IMG-LOGO">
            </a>
        </div>
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li> <a href="{{ route('/') }}">Home</a></li>
            <li><a href="product.html">Trade</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>

        <!-- Wishlist icon for mobile -->
        <ul style="display: flex; flex-direction: column; gap: 10px; padding: 10px;">
            <li>
                <a href="{{ route('wishlist.index') }}" style="display: inline-block; padding: 10px; background-color: #ffffff; color: rgb(0, 0, 0); border-radius: 5px; text-align: center; text-decoration: none; font-size: 14px; font-weight: bold;">
                    <i class="fas fa-heart"></i> Wishlist
                </a>
            </li>
        </ul>

        <ul style="display: flex; flex-direction: column; gap: 10px; padding: 10px;">
            @guest
            <li>
                <a href="{{ route('login') }}" style="display: inline-block; padding: 10px; background-color: #000000; color: white; border-radius: 5px; text-align: center; text-decoration: none; font-size: 14px; font-weight: bold;">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" style="display: inline-block; padding: 10px; background-color: #ffffff; color: rgb(0, 0, 0); border-radius: 5px; text-align: center; text-decoration: none; font-size: 14px; font-weight: bold;">Register</a>
            </li>
            @else
            <li>
                <a href="{{ route('user.profile') }}" style="display: inline-block; padding: 10px; background-color: #945b7e; color: white; border-radius: 5px; text-align: center; text-decoration: none; font-size: 14px; font-weight: bold;">Profile</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" style="display: inline-block; padding: 10px; background-color: #040404; color: white; border-radius: 5px; text-align: center; text-decoration: none; font-size: 14px; font-weight: bold;">Logout</a>
            </li>
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endauth
        </ul>
    </div>
</header>
