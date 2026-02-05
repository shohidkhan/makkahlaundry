<div class="preloader">
    <div class="preloader-inner">
        <div class="loader">
            <div class="rot"></div>
            <img src="{{ asset('frontend') }}/assets/img/pre-logo.webp" alt="Laun">
        </div>
    </div>
</div>

<div class="popup-search-box">
    <button class="searchClose">
        <i class="fal fa-times"></i>
    </button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit">
            <i class="fal fa-search"></i>
        </button>
    </form>
</div>

<div class="th-menu-wrapper">
    <div class="text-center th-menu-area">

        <!-- Close Button -->
        <button class="th-menu-toggle">
            <i class="fal fa-times"></i>
        </button>

        <!-- Mobile Logo -->
        <div class="mobile-logo">
            <a href="{{ '/' }}">
                <img src="{{ asset('frontend') }}/assets/img/pre-logo.webp" width="150px" alt="Laun">
            </a>
        </div>

        <!-- Mobile Menu -->
        <div class="th-mobile-menu">
            <ul>

                <!-- Home -->
                <li class="menu-item-has-children">
                    <a href="{{ '/' }}">Home</a>

                </li>

                <!-- About -->
                <li>
                    <a href="about.html">About Us</a>
                </li>

                <!-- Service -->
                <li class="menu-item-has-children">
                    <a href="#">Service</a>
                    <ul class="sub-menu">
                        <li><a href="service.html">Service</a></li>

                    </ul>
                </li>



                <!-- Blogs -->
                <!-- <li class="menu-item-has-children">
                    <a href="#">Blogs</a>
                    <ul class="sub-menu">

                        <li class="menu-item-has-children">
                            <a href="#">Blog Layout</a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid-2-columns.html">Blog Grid 2 Columns</a></li>
                                <li><a href="blog-grid-3-columns.html">Blog Grid 3 Columns</a></li>
                                <li><a href="blog-list.html">Blog List</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="blog.html">Blog Sidebar</a>
                            <ul class="sub-menu">
                                <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                <li><a href="blog.html">No Sidebar</a></li>
                            </ul>
                        </li>

                        <li><a href="https://wa.me/+8801879738480">Blog Details</a></li>

                    </ul>
                </li> -->

                <!-- Contact -->
                <li>
                    <a href="contact.html">Contact</a>
                </li>

            </ul>
        </div>

    </div>
</div>

<header class="th-header header-layout1">

    <!-- Header Top -->
    <div class="header-top">
        <div class="container th-container">
            <div class="row justify-content-center justify-content-lg-between align-items-center">

                <!-- Top Left: Notice & Info -->
                <div class="col-auto d-none d-md-block">
                    <div class="header-links style2">
                        <p class="header-notice text-theme">
                            Welcome to ML makkha laundry service
                        </p>
                        <ul>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                Phone: <a href="tel:+966565981175">+966 56 598 1175</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                Email: <a href="mailto:geaulkarim@gmail.com
">geaulkarim@gmail.com
                                </a>
                            </li>
                            <li class="d-none d-xl-inline-block">
                                <i class="fa-solid fa-clock"></i>
                                Opening Hours: <span>Monday to Saturday (9:00 AM - 8:00 PM)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Top Right: Social Links -->
                <div class="col-auto">
                    <div class="social-links">
                        <span class="social-title">Follow Us On:</span>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://wa.me/+966565981175">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Sticky Header / Main Menu -->
    <div class="sticky-wrapper">
        <div class="container th-container">
            <div class="menu-area">
                <div class="row align-items-center justify-content-between">

                    <!-- Logo -->
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ '/' }}">
                                <img src="{{ asset('frontend') }}/assets/img/pre-logo.webp" width="160px"
                                    alt="mlmakkalaundry">
                            </a>
                        </div>
                    </div>

                    <!-- Main Menu -->
                    <div class="col-auto ms-lg-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <!-- Home -->
                                <li class="menu-item-has-children">
                                    <a href="{{ '/' }}">Home</a>

                                </li>

                                <!-- About -->
                                <li><a href="about.html">About Us</a></li>

                                <!-- Service -->
                                <li class="menu-item-has-children">
                                    <a href="#">Service</a>
                                    <ul class="sub-menu">
                                        <li><a href="service.html">Service</a></li>
                                    </ul>
                                </li>



                                <!-- Blogs
                                <li class="menu-item-has-children">
                                    <a href="#">Blogs</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog Layout</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-list.html">Blog List</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->

                                <!-- Contact -->
                                <li><a href="contact.html">Contact</a></li>
                                <li><a class="order_tn" style="padding: 10px 20px; margin-top: 10px;"
                                        href="https://wa.me/{{ $whatsapp->number }}">Order Now</a></li>
                            </ul>
                        </nav>

                        <!-- Mobile Menu Toggle -->
                        <button type="button" class="th-menu-toggle d-block d-lg-none">
                            <i class="far fa-bars" style="color: #000"></i>
                        </button>
                    </div>

                    <!-- Header Buttons -->
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <button type="button" class="icon-btn searchBoxToggler">
                                <i class="far fa-search"></i>
                            </button>
                            <a href="#" class="icon-btn sideMenuToggler d-none d-lg-block">
                                <i class="far fa-bars"></i>
                            </a>
                            <!-- <a href="contact.html" class="th-btn style4 th-radius">Schedule A Pickup</a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>
