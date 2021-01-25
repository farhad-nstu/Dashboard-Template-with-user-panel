<!-- Start of header section
                      ============================================= -->
                      <header id="dia-header" class="dia-main-header">
                        <div class="container">
                            <div class="dia-main-header-content clearfix">
                                <div class="dia-logo float-left">
                                    <a href="#"><img width="200" src="{{ asset('front') }}/assets/img/slogo1.png" alt=""></a>
                                </div>
                                <div class="dia-main-menu-item float-right">
                                    <nav class="dia-main-navigation  clearfix ul-li">
                                        <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                                            <li> <a href="{{ route('front.home') }}">হোম</a></li>

                                            @auth
                                               
                                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">লগআউট</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                               
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>

                        <!-- /desktop menu -->
                        <div class="dia-mobile_menu relative-position">
                            <div class="dia-mobile_menu_button dia-open_mobile_menu">
                                <i class="fas fa-bars"></i>
                            </div>
                            <div class="dia-mobile_menu_wrap">
                                <div class="mobile_menu_overlay dia-open_mobile_menu"></div>
                                <div class="dia-mobile_menu_content">
                                    <div class="dia-mobile_menu_close dia-open_mobile_menu">
                                        <i class="far fa-times-circle"></i>
                                    </div>
                                    <div class="m-brand-logo text-center">
                                        <a href="%21.html#"><img width="300" src="{{ asset('front') }}/assets/img/d-agency/logo/logo2.png"
                                                alt=""></a>
                                    </div>
                                    <nav class="dia-mobile-main-navigation  clearfix ul-li">
                                        <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                            <li> <a href="{{ route('front.home') }}">হোম</a></li>

                                            @auth
                                              
                                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">লগআউট</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- /mobile-menu -->
                        </div>
                        </div>
                    </header>
