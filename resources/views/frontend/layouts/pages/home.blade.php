@extends('app')
@section('title', 'ML Makkha Laundry Service - Home')


@section('main-content')
    <div class="th-hero-wrapper hero-1" id="hero">

        <!-- Swiper Slider -->
        <div class="swiper th-slider hero-slider-1" id="heroSlide1" data-slider-options='{"effect":"slide"}'>

            <div class="swiper-wrapper">

                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <div class="hero-inner">
                            <div class="th-hero-bg" data-bg-src="{{ asset($banner->background_image) }}">
                                {{-- <img src="{{ asset('frontend') }}/assets/img/hero/hero_overlay_1.png" alt="Hero Image"> --}}
                                <div class="bubble"></div>
                            </div>
                            <div class="container">
                                <div class="hero-style1">
                                    <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.5s">
                                        {{ $banner->sub_title }}
                                    </span>
                                    <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s">
                                        {{ $banner->title }}
                                    </h1>
                                    <p class="text-white hero-text" data-ani="slideinup" data-ani-delay="0.7s">
                                        {{ $banner->description }}
                                    </p>
                                    <div id="listOFSm">
                                        <ul>
                                            <li> <i class="fa-regular fa-clock"></i> 6–8 hour express option</li>
                                            <li><i class="fa-solid fa-hotel"></i> Pickup from your hotel</li>
                                            <li><i class="fa-brands fa-whatsapp"></i>100% WhatsApp-based ordering</li>
                                        </ul>
                                    </div>
                                    <div class="btn-group" data-ani="slideinup" data-ani-delay="0.9s">
                                        <a href="https://wa.me/{{ $whatsapp->number }}" class="th-btn style2">WhatsApp</a>
                                        <a href="tel:{{ $whatsapp->number }}" class="th-btn style5">Call Now</a>
                                    </div>
                                </div>
                                <!-- Right-side hero info panel -->
                                <div class="hero-right-panel d-none d-xl-flex">
                                    <div class="hero-right-card">
                                        <div class="hero-right-badge">Serving Makkah - Haram Area</div>
                                        <div class="hero-info-grid">
                                            <div class="hero-info-item">
                                                <div class="hero-info-title">Standard laundry</div>
                                                <div class="hero-info-desc">Wash · dry · fold (24–48h)</div>
                                            </div>
                                            <div class="hero-info-item">
                                                <div class="hero-info-title">Express service</div>
                                                <div class="hero-info-desc">6–8 hour turnaround</div>
                                            </div>
                                            <div class="hero-info-item">
                                                <div class="hero-info-title">Press & fold</div>
                                                <div class="hero-info-desc">Crisp, ready-to-wear finish</div>
                                            </div>
                                            <div class="hero-info-item">
                                                <div class="hero-info-title">Ordering</div>
                                                <div class="hero-info-desc"><i class="fa-brands fa-whatsapp"
                                                        style="color: #22c55e;"></i>{{ $whatsapp->number }}</div>
                                            </div>
                                        </div>
                                        <div class="hero-right-images">
                                            <img class="hero-right-img1"
                                                src="{{ asset('frontend') }}/assets/img/Makkah-laundry-service-point-PressFold.png"
                                                alt="service">
                                            <img class="hero-right-img2"
                                                src="{{ asset('frontend') }}/assets/img/Makkah-laundry-service-point.webp"
                                                alt="service">
                                        </div>
                                    </div>
                                    {{-- <div class="hero-right-ctas">
                                        <a href="https://wa.me/{{ $whatsapp->number }}"
                                            class="hero-cta hero-cta--whatsapp">WhatsApp</a>
                                        <a href="tel:{{ $whatsapp->number }}" class="hero-cta hero-cta--call">Call Now</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Slide 1 -->

                <!-- Slide 2 -->
                {{-- <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="{{ asset('frontend') }}/assets/img/hero/hero_bg_1_2.jpg">
                            <img src="{{ asset('frontend') }}/assets/img/hero/hero_overlay_1.png" alt="Hero Image">
                            <div class="bubble"></div>
                        </div>
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.5s">
                                    We Clean, You Shine
                                </span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s">
                                    Quality Laundry Every Thread
                                </h1>
                                <p class="text-white hero-text" data-ani="slideinup" data-ani-delay="0.7s">
                                    The best slogan for your laundry service depends on your brand, target audience, and
                                    unique qualities.
                                </p>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.9s">
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="th-btn style2">WhatsApp</a>
                                    <a href="contact.html" class="th-btn style5">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="{{ asset('frontend') }}/assets/img/hero/hero_bg_1_3.jpg">
                            <img src="{{ asset('frontend') }}/assets/img/hero/hero_overlay_1.png" alt="Hero Image">
                            <div class="bubble"></div>
                        </div>
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.5s">
                                    We Clean, You Shine
                                </span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s">
                                    Quality Laundry Every Thread
                                </h1>
                                <p class="text-white hero-text" data-ani="slideinup" data-ani-delay="0.7s">
                                    The best slogan for your laundry service depends on your brand, target audience, and
                                    unique qualities.
                                </p>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.9s">
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="th-btn style2">WhatsApp</a>
                                    <a href="contact.html" class="th-btn style5">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div> <!-- swiper-wrapper -->

        </div> <!-- swiper -->

        <!-- Animated Bubbles -->
        <div class="hero-animated-bubble">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_1.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_2.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_3.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_4.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_5.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_6.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_7.png" alt="Laun">
            <img src="{{ asset('frontend') }}/assets/img/shape/bubble_8.png" alt="Laun">
        </div>

        <!-- Slider Navigation -->
        <div class="icon-box">
            <button data-slider-prev="#heroSlide1" class="slider-arrow default">
                <i class="far fa-arrow-left"></i>
            </button>
            <button data-slider-next="#heroSlide1" class="slider-arrow default">
                <i class="far fa-arrow-right"></i>
            </button>
        </div>

    </div>


    <div class="overflow-hidden about-sec space-top" id="about-sec">
        <div class="container">
            <div class="row">

                <!-- Left Image Section -->
                <div class="col-xl-6 wow fadeInLeft">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset('frontend') }}/assets/img/Standard-laundry-service.png" alt="About">
                        </div>
                        <div class="img2">
                            <img src="{{ asset('frontend') }}/assets/img/normal/about_2.jpg" alt="About">
                        </div>
                        <div class="th-experience jump">
                            <h3 class="experience-year">
                                <span class="counter-number">24</span>+
                            </h3>
                            <p class="experience-text">Years</p>
                        </div>
                    </div>
                </div>

                <!-- Right Text Section -->
                <div class="col-xl-6">
                    <div class="ps-xl-4 wow fadeInRight">

                        <!-- Title & Description -->
                        <div class="title-area mb-25">
                            <span class="sub-title style1">About Us</span>
                            <h2 class="mb-20 sec-title">
                                Experience the Makkah Laundry wash Excellence
                            </h2>
                            <p class="about-desc">
                                Specify the range of services your laundry offers, including wash and fold, dry
                                cleaning, ironing, stain removal, and any specialized treatments for delicate fabrics or
                                special garments.
                            </p>
                        </div>

                        <!-- Services Checklist -->
                        <div class="checklist list-two-column">
                            <ul>
                                <li>Pickup and Delivery Service</li>
                                <li>Energy-Efficient Machines</li>
                                <li>Same-Day or Express Service</li>
                                <li>Folding Preferences</li>
                                <li>Hanging or Bagging Options</li>
                                <li>Satisfaction Guarantee</li>
                            </ul>
                        </div>

                        <!-- Button -->
                        <div class="btn-group mt-30 justify-content-start">
                            <a href="about.html" class="th-btn">More About Us</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="overflow-hidden space" id="feature-area">
        <div class="container">
            <div class="row gy-4 justify-content-center">

                <!-- Feature Item 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="feature-item wow fadeInUp">
                        <div class="feature-item_icon">
                            <img src="{{ asset('frontend') }}/assets/img/icon/feature_1_1.svg" alt="icon">
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">100% Happiness Guarantee</h3>
                            <p class="feature-item_text">
                                Emphasize the use of high-quality detergents, fabric softeners.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature Item 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="feature-item wow fadeInDown">
                        <div class="feature-item_icon">
                            <img src="{{ asset('frontend') }}/assets/img/icon/feature_1_2.svg" alt="icon">
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">Free Collection & Delivery</h3>
                            <p class="feature-item_text">
                                We pick up your laundry from home and deliver it fresh & clean.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature Item 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="feature-item wow fadeInUp">
                        <div class="feature-item_icon">
                            <img src="{{ asset('frontend') }}/assets/img/icon/feature_1_3.svg" alt="icon">
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">24/7 Dedicated Support</h3>
                            <p class="feature-item_text">
                                Our customer service team is available anytime for your needs.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- <section class="bg-top-center space" data-bg-src="assets/img/bg/service_bg_1.jpg">
        <div class="container">

            <!-- Section Title -->
            <div class="text-center title-area">
                <span class="sub-title">Our Best Services</span>
                <h2 class="sec-title">Our Best Laundry Services For You!</h2>
            </div>

            <!-- Services Slider -->
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="serviceSlider1"
                    data-slider-options='{
                     "breakpoints": {
                         "0": {"slidesPerView":1},
                         "576": {"slidesPerView":1},
                         "768": {"slidesPerView":2},
                         "992": {"slidesPerView":2},
                         "1200": {"slidesPerView":3}
                     }
                 }'>

                    <div class="swiper-wrapper">

                        <!-- Service 1 -->
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_wrapper">
                                    <div class="service-box_img">
                                        <img src="{{ asset('frontend') }}/assets/img/service/service_box_1.jpg"
                                            alt="Dry Cleaning">
                                    </div>
                                    <div class="service-box_icon">
                                        <img src="{{ asset('frontend') }}/assets/img/icon/service_box_1.svg"
                                            alt="Icon">
                                    </div>
                                </div>
                                <div class="box-content" data-bg-src="assets/img/shape/service_shape_1.png">
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Dry
                                            Cleaning</a></h3>
                                    <p class="service-box_text">
                                        Dry cleaning is a method of cleaning clothing and textiles that uses a solvent
                                        other than water to remove dirt and stains.
                                    </p>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_wrapper">
                                    <div class="service-box_img">
                                        <img src="{{ asset('frontend') }}/assets/img/service/service_box_2.jpg"
                                            alt="Wash & Fold">
                                    </div>
                                    <div class="service-box_icon">
                                        <img src="{{ asset('frontend') }}/assets/img/icon/service_box_2.svg"
                                            alt="Icon">
                                    </div>
                                </div>
                                <div class="box-content" data-bg-src="assets/img/shape/service_shape_1.png">
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Wash & Fold</a>
                                    </h3>
                                    <p class="service-box_text">
                                        Wash and fold (also known as drop-off laundry) is a convenient service offered
                                        by many laundromats.
                                    </p>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 3 -->
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_wrapper">
                                    <div class="service-box_img">
                                        <img src="{{ asset('frontend') }}/assets/img/service/service_box_3.jpg"
                                            alt="Ironing/Pressing">
                                    </div>
                                    <div class="service-box_icon">
                                        <img src="{{ asset('frontend') }}/assets/img/icon/service_box_3.svg"
                                            alt="Icon">
                                    </div>
                                </div>
                                <div class="box-content" data-bg-src="assets/img/shape/service_shape_1.png">
                                    <h3 class="box-title"><a
                                            href="https://wa.me/{{ $whatsapp->number }}">Ironing/Pressing</a>
                                    </h3>
                                    <p class="service-box_text">
                                        Ironing or pressing smooths out wrinkles, creases, and removes fabric
                                        imperfections.
                                    </p>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 4 -->
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_wrapper">
                                    <div class="service-box_img">
                                        <img src="{{ asset('frontend') }}/assets/img/service/service_box_4.jpg"
                                            alt="Garments Transformed">
                                    </div>
                                    <div class="service-box_icon">
                                        <img src="{{ asset('frontend') }}/assets/img/icon/service_box_4.svg"
                                            alt="Icon">
                                    </div>
                                </div>
                                <div class="box-content" data-bg-src="assets/img/shape/service_shape_1.png">
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Garments
                                            Transformed</a></h3>
                                    <p class="service-box_text">
                                        Transforming your garments with professional care to look fresh, clean, and like
                                        new.
                                    </p>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 5 -->
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_wrapper">
                                    <div class="service-box_img">
                                        <img src="{{ asset('frontend') }}/assets/img/service/service_box_5.jpg"
                                            alt="Household Textile Care">
                                    </div>
                                    <div class="service-box_icon">
                                        <img src="{{ asset('frontend') }}/assets/img/icon/service_box_5.svg"
                                            alt="Icon">
                                    </div>
                                </div>
                                <div class="box-content" data-bg-src="assets/img/shape/service_shape_1.png">
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Household
                                            Textile
                                            Care</a></h3>
                                    <p class="service-box_text">
                                        Maintenance and cleaning of household textiles like curtains, beddings, and
                                        cushions.
                                    </p>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Service 6 -->
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_wrapper">
                                    <div class="service-box_img">
                                        <img src="{{ asset('frontend') }}/assets/img/service/service_box_1.jpg"
                                            alt="Leather & Suede Care">
                                    </div>
                                    <div class="service-box_icon">
                                        <img src="{{ asset('frontend') }}/assets/img/icon/service_box_6.svg"
                                            alt="Icon">
                                    </div>
                                </div>
                                <div class="box-content" data-bg-src="assets/img/shape/service_shape_1.png">
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Leather & Suede
                                            Care</a></h3>
                                    <p class="service-box_text">
                                        Professional cleaning and care for leather and suede garments, shoes, and
                                        accessories.
                                    </p>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Slider Arrows -->
                <button data-slider-prev="#serviceSlider1" class="slider-arrow slider-prev">
                    <i class="far fa-arrow-left"></i>
                </button>
                <button data-slider-next="#serviceSlider1" class="slider-arrow slider-next">
                    <i class="far fa-arrow-right"></i>
                </button>

            </div>
        </div>
    </section> --}}

    @include('frontend.partials.why-choose_us')
    @include('frontend.partials.service')



    <div class="space-bottom">
        <div class="container">
            <div class="row gy-4 justify-content-center">

                <!-- Phone Contact -->
                <div class="col-lg-6">
                    <div class="contact-feature" data-bg-src="assets/img/bg/contact_info_bg_1.jpg">
                        <div class="box-icon"><i class="fa-light fa-phone"></i></div>
                        <div class="media-body">
                            <span class="contact-feature_subtitle">Call Us For Service</span>
                            <h3 class="box-title">
                                <a href="tel:++966565981175">+966 56 598 1175</a>
                            </h3>
                            <p class="box-text">Call 24/7 anytime for our laundry services.</p>
                        </div>
                    </div>
                </div>

                <!-- Email Contact -->
                <div class="col-lg-6">
                    <div class="contact-feature" data-bg-src="assets/img/bg/contact_info_bg_1.jpg">
                        <div class="box-icon"><i class="fa-light fa-envelope"></i></div>
                        <div class="media-body">
                            <span class="contact-feature_subtitle">Email Us Anytime For Service</span>
                            <h3 class="box-title">
                                <a href="mailto:info@Laun.com">geaulkarim@gmail.com
                                </a>
                            </h3>
                            <p class="box-text">Email 24/7 anytime for our laundry services.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- <div class="overflow-hidden features-area position-relative bg-top-center space"
        data-bg-src="{{ asset('frontend') }}/assets/img/bg/why_bg_1.png">
        <div class="container">
            <div class="row">

                <!-- Main Content -->
                <div class="col-xl-9">
                    <div class="choose-feature-area">

                        <!-- Title Area -->
                        <div class="title-area mb-25">
                            <span class="sub-title style1">Why Choose Us</span>
                            <h2 class="sec-title">We Take Pride in Perfecting Your Clothes Laundry</h2>
                            <p class="sec-text">
                                We prioritize the highest standards of cleanliness and garment care. Our experienced
                                team uses top-quality detergents and equipment to ensure your clothes are returned fresh
                                and spotless. We offer hassle-free pickup and delivery services, saving you time and
                                effort.
                            </p>
                        </div>

                        <!-- Checklist -->
                        <div class="checklist list-two-column why-checklist">
                            <ul>
                                <li><span class="check-img"><img src="{{ asset('frontend') }}/assets/img/icon/check.svg"
                                            alt=""></span>Quality Assurance</li>
                                <li><span class="check-img"><img src="{{ asset('frontend') }}/assets/img/icon/check.svg"
                                            alt=""></span>Expert Handling</li>
                                <li><span class="check-img"><img src="{{ asset('frontend') }}/assets/img/icon/check.svg"
                                            alt=""></span>Transparent Pricing</li>
                                <li><span class="check-img"><img src="{{ asset('frontend') }}/assets/img/icon/check.svg"
                                            alt=""></span>Folding Preferences</li>
                            </ul>
                        </div>

                        <!-- Button & Profile -->
                        <div class="mt-40 btn-group">
                            <a href="https://wa.me/{{ $whatsapp->number }}" class="th-btn style3">Make An Appointment</a>
                            <div class="about-profile">
                                <div class="about-avater">
                                    <img src="{{ asset('frontend') }}/assets/img/shape/about-thumb_1.png" alt="about">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 box-title">Alex Hamilton</h5>
                                    <p class="mb-0 desig">Company Director by Laundry Service</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Video Box -->
                <div class="col-xl-3">
                    <div class="video-box1">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video">
                            <i class="fa-sharp fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Decorative Shape -->
        <div class="shape-mockup jump d-none d-xl-block" data-bottom="8%" data-right="0%">
            <img src="{{ asset('frontend') }}/assets/img/shape/like.png" alt="shape">
        </div>
    </div> --}}

    @include('frontend.partials.how_it_works')
    @include('frontend.partials.pricing')

    {{-- <section class="overflow-hidden position-relative space-bottom">
        <div class="container">

            <!-- Title Area -->
            <div class="text-center title-area">
                <span class="sub-title">Work Process</span>
                <h2 class="sec-title">How We Work It!</h2>
            </div>

            <!-- Process Steps -->
            <div class="step-wrap">
                <div class="process-line"></div> <!-- Line connecting steps -->

                <div class="row gy-4 justify-content-center">

                    <!-- Step 1 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="process-card">
                            <div class="box-icon">
                                <img src="{{ asset('frontend') }}/assets/img/icon/process_card_1.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <div class="box-top">
                                    <p class="box-number">Step - 01</p>
                                    <h3 class="box-title">Schedule Your Service</h3>
                                </div>
                                <p class="box-text">
                                    Begin by scheduling your laundry service. You can choose from our convenient
                                    options.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 (Active) -->
                    <div class="col-xl-4 col-md-6">
                        <div class="process-card active">
                            <div class="box-icon">
                                <img src="{{ asset('frontend') }}/assets/img/icon/process_card_2.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <div class="box-top">
                                    <p class="box-number">Step - 02</p>
                                    <h3 class="box-title">Expert Cleaning Process</h3>
                                </div>
                                <p class="box-text">
                                    Once we receive your laundry, our skilled team takes over. Your clothes are
                                    carefully sorted based on fabric type and care requirements.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="process-card">
                            <div class="box-icon">
                                <img src="{{ asset('frontend') }}/assets/img/icon/process_card_3.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <div class="box-top">
                                    <p class="box-number">Step - 03</p>
                                    <h3 class="box-title">Packaging and Delivery</h3>
                                </div>
                                <p class="box-text">
                                    We take pride in using eco-friendly packaging materials. If you've opted for our
                                    pickup service, your laundry will be delivered fresh and neatly packaged.
                                </p>
                            </div>
                        </div>
                    </div>

                </div> <!-- End row -->

            </div> <!-- End step-wrap -->

        </div> <!-- End container -->
    </section> --}}


    <section class="cta-sec" data-pos-for=".team-area" data-sec-pos="bottom-half">
        <div class="container th-container">

            <div class="cta-area" data-overlay="title" data-opacity="9"
                data-bg-src="{{ asset('frontend') }}/assets/img/bg/cta_bg_1.jpg">
                <div class="row align-items-center">

                    <!-- Text Content -->
                    <div class="mb-5 col-xl-7 col-lg-6 mb-lg-0">
                        <div class="mb-0 text-center title-area text-lg-start">
                            <span class="sub-title style1">Get Free Contact For Services</span>
                            <h2 class="text-white sec-title">You Get Premium Laundry Service From Us!</h2>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="cta-group justify-content-lg-end justify-content-center">
                            <a href="https://wa.me/{{ $whatsapp->number }}" class="th-btn style2">Get Our Services</a>
                            <a href="contact.html" class="th-btn style3">Contact Us Now</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <section class="team-area space" data-bg-src="assets/img/bg/team_bg_1.jpg">
        <div class="container z-index-common">

            <!-- Section Title -->
            <div class="text-center title-area">
                <span class="sub-title">Expert Team</span>
                <h2 class="sec-title">Our Expert Workers</h2>
            </div>

            <!-- Slider Area -->
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="teamSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1},"768":{"slidesPerView":2},"992":{"slidesPerView":3},"1200":{"slidesPerView":4}}}'>

                    <div class="swiper-wrapper">

                        <!-- Team Member -->
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img">
                                    <img src="{{ asset('frontend') }}/assets/img/ceo.png" alt="Team">
                                    <div class="th-social">
                                        <a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="team-details.html">Geaul karim</a></h3>
                                        <span class="team-desig">CEO</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img">
                                    <img src="{{ asset('frontend') }}/assets/img/ceo.png" alt="Team">
                                    <div class="th-social">
                                        <a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="team-details.html">Geaul karim</a></h3>
                                        <span class="team-desig">CEO</span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img">
                                    <img src="{{ asset('frontend') }}/assets/img/ceo.png" alt="Team">
                                    <div class="th-social">
                                        <a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="team-details.html">Geaul karim</a></h3>
                                        <span class="team-desig">CEO</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Team Member -->
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img">
                                    <img src="{{ asset('frontend') }}/assets/img/team/team_1_1.jpg" alt="Team">
                                    <div class="th-social">
                                        <a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="team-details.html">Danial Facundo</a></h3>
                                        <span class="team-desig">Dry Cleaner</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Team Member -->
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img">
                                    <img src="{{ asset('frontend') }}/assets/img/team/team_1_3.jpg" alt="Team">
                                    <div class="th-social">
                                        <a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="team-details.html">Ema Margret</a></h3>
                                        <span class="team-desig">Dry Cleaner</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Team Member -->
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img">
                                    <img src="{{ asset('frontend') }}/assets/img/team/team_1_1.jpg" alt="Team">
                                    <div class="th-social">
                                        <a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="team-details.html">Henry Haninkot</a></h3>
                                        <span class="team-desig">Dry Cleaner</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Slider Navigation -->
                    <button data-slider-prev="#teamSlider1" class="slider-arrow slider-prev"><i
                            class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#teamSlider1" class="slider-arrow slider-next"><i
                            class="far fa-arrow-right"></i></button>

                </div>
            </div>

        </div>
    </section>

    {{-- coverage area --}}

    @include('frontend.partials.coverage_area')


    <section class="overflow-hidden space" id="faq-sec">
        <div class="container">
            <div class="row align-items-end">

                <!-- FAQ Text -->
                <div class="text-center col-xl-6 text-xl-start align-self-center">
                    <div class="text-center title-area text-xl-start">
                        <span class="sub-title style1">FAQ</span>
                        <h2 class="sec-title">Frequently Asked Have Any Questions</h2>
                    </div>

                    <div class="accordion" id="faqAccordion">

                        <!-- Accordion Item 1 -->
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                    What Services Do You Offer?
                                </button>
                            </div>
                            <div id="collapse-1" class="accordion-collapse collapse show"
                                aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">We value your feedback! Let us know about your experience and
                                        if there's anything else we can do to make your laundry service even better.
                                        We're always here to assist you.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 2 -->
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    Do You Have Certified Technicians?
                                </button>
                            </div>
                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="collapse-item-2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">We value your feedback! Let us know about your experience and
                                        if there's anything else we can do to make your laundry service even better.
                                        We're always here to assist you.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 3 -->
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    Can You Provide a Customized Service Plan?
                                </button>
                            </div>
                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">We value your feedback! Let us know about your experience and
                                        if there's anything else we can do to make your laundry service even better.
                                        We're always here to assist you.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 4 -->
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    What is Your Pricing Structure?
                                </button>
                            </div>
                            <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="collapse-item-4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">We value your feedback! Let us know about your experience and
                                        if there's anything else we can do to make your laundry service even better.
                                        We're always here to assist you.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- FAQ Image -->
                <div class="col-xl-6">
                    <div class="faq-img1 ps-xl-4">
                        <div class="img1">
                            <img src="{{ asset('frontend') }}/assets/img/normal/faq_1_1.png" alt="faq">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="testi-area" id="testi-sec" data-bg-src="{{ asset('frontend') }}/assets/img/bg/testi_bg_1.jpg">
        <div class="shape-mockup" data-bottom="0" data-right="0">
            <img src="{{ asset('frontend') }}/assets/img/shape/testi_img_1.png" alt="shape">
        </div>

        <div class="container">
            <div class="row align-items-center">

                <!-- Testimonials Slider -->
                <div class="col-xl-6">
                    <div class="testi-card-slide">

                        <div class="title-area">
                            <span class="sub-title style1">Testimonials</span>
                            <h2 class="sec-title text-white">Our Clients Feedback</h2>
                        </div>

                        <div class="swiper th-slider" id="testiSlide1" data-slider-options='{"effect":"slide"}'>
                            <div class="swiper-wrapper">

                                <!-- Slide 1 -->
                                <div class="swiper-slide">
                                    <div class="testi-card">
                                        <div class="testi-card_wrapp">

                                            <div class="testi-card_profile">
                                                <div class="testi-card_avater global-img">
                                                    <img src="{{ asset('frontend') }}/assets/img/testimonial/testi_1_1.jpg"
                                                        alt="Avatar">
                                                </div>

                                                <div class="star-icon">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="testi-card_wrapper">
                                                <p class="testi-card_text">
                                                    “If you opted for pickup and delivery, our dedicated team will bring
                                                    your laundry back to your doorstep at the scheduled time. For drop-offs,
                                                    your clean clothes will be waiting.”
                                                </p>

                                                <div class="testimonial-author">
                                                    <div class="testi-card_content">
                                                        <h3 class="testi-card_name">Alex Michel</h3>
                                                        <span class="testi-card_desig">Founder & CEO</span>
                                                    </div>

                                                    <div class="testi-quote">
                                                        <img src="{{ asset('frontend') }}/assets/img/icon/quote.svg"
                                                            alt="Quote">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 2 -->
                                <div class="swiper-slide">
                                    <div class="testi-card">
                                        <div class="testi-card_wrapp">

                                            <div class="testi-card_profile">
                                                <div class="testi-card_avater global-img">
                                                    <img src="{{ asset('frontend') }}/assets/img/testimonial/testi_1_2.jpg"
                                                        alt="Avatar">
                                                </div>

                                                <div class="star-icon">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="testi-card_wrapper">
                                                <p class="testi-card_text">
                                                    “If you opted for pickup and delivery, our dedicated team will bring
                                                    your laundry back to your doorstep at the scheduled time. For drop-offs,
                                                    your clean clothes will be waiting.”
                                                </p>

                                                <div class="testimonial-author">
                                                    <div class="testi-card_content">
                                                        <h3 class="testi-card_name">Jenny Wilson</h3>
                                                        <span class="testi-card_desig">Project Manager</span>
                                                    </div>

                                                    <div class="testi-quote">
                                                        <img src="{{ asset('frontend') }}/assets/img/icon/quote.svg"
                                                            alt="Quote">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Appointment Form -->
                <div class="col-xl-6">
                    <div class="testi-area-wrapper">

                        <form action="https://html.themehour.net/laun/demo/mail.php" method="POST"
                            class="testi-form input-smoke ajax-contact">
                            <h3 class="sec-title text-center">Book An Appointment</h3>

                            <div class="row">
                                <div class="form-group col-12">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    <i class="fal fa-user"></i>
                                </div>

                                <div class="form-group col-12">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Email Address">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="form-group col-12">
                                    <input type="tel" name="phone" class="form-control"
                                        placeholder="Phone number">
                                    <i class="fal fa-phone"></i>
                                </div>

                                <div class="form-group col-12">
                                    <select name="subject" class="form-select nice-select">
                                        <option value="" disabled selected hidden>Select Service</option>
                                        <option value="Dry Cleaning">Dry Cleaning</option>
                                        <option value="Wash & Fold">Wash & Fold</option>
                                        <option value="Ironing/Pressing">Ironing / Pressing</option>
                                        <option value="Garments Transformed">Garments Transformed</option>
                                        <option value="Household Textile Care">Household Textile Care</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <textarea name="message" rows="3" class="form-control" placeholder="Your Message"></textarea>
                                    <i class="fal fa-pencil"></i>
                                </div>

                                <div class="form-btn col-12">
                                    <button type="submit" class="th-btn btn-fw">
                                        Appointment Now
                                    </button>
                                </div>
                            </div>

                            <p class="form-messages mt-3 mb-0"></p>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>





    <!--
                                                                                                                                                                                                                                                                                                                <section class="space"><div class="container"><div class="text-center title-area"><span class="sub-title">What We Offer</span><h2 class="sec-title">Affordable Price Package</h2></div><div class="row gy-4 justify-content-center"><div class="col-xl-4 col-md-6"><div class="price-card"><h3 class="box-title">Dry Cleaning Price</h3><div class="price-card_content"><h4 class="price-card_price"><span class="currency">$</span>80</h4><p class="price-card_text">20 CLOTHES PER MONTH</p><div class="available-list"><ul><li>4 T-Shirts</li><li>3 Button-Down Shirts</li><li>7 Pairs of Underwear</li><li>6 Pairs of Socks</li><li class="unavailable">8 Towel</li><li class="unavailable">2 Set of Bed Sheets</li></ul></div><a href="price.html" class="th-btn style3">Choose Packages</a></div></div></div><div class="col-xl-4 col-md-6"><div class="price-card active"><h3 class="box-title">Dry Clean / Laundry</h3><div class="price-card_content"><h4 class="price-card_price"><span class="currency">$</span>140</h4><p class="price-card_text">28 CLOTHES PER MONTH</p><div class="available-list"><ul><li>4 T-Shirts</li><li>3 Button-Down Shirts</li><li>7 Pairs of Underwear</li><li>6 Pairs of Socks</li><li>8 Towel</li><li class="unavailable">2 Set of Bed Sheets</li></ul></div><a href="price.html" class="th-btn style3">Choose Packages</a></div></div></div><div class="col-xl-4 col-md-6"><div class="price-card"><h3 class="box-title">Dry Clean / Iron / Fold</h3><div class="price-card_content"><h4 class="price-card_price"><span class="currency">$</span>180</h4><p class="price-card_text">30 CLOTHES PER MONTH</p><div class="available-list"><ul><li>4 T-Shirts</li><li>3 Button-Down Shirts</li><li>7 Pairs of Underwear</li><li>6 Pairs of Socks</li><li>8 Towel</li><li>2 Set of Bed Sheets</li></ul></div><a href="price.html" class="th-btn style3">Choose Packages</a></div></div></div></div></div></section>

                                                                                                                                                                                                                                                                                                                <div class="py-5 mt-1 brand-area bg-theme2"><div class="container th-container"><div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'><div class="swiper-wrapper"><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_1.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_2.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_3.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_4.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_5.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_6.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_7.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_8.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_1.svg" alt="Brand Logo"></div></div><div class="swiper-slide"><div class="brand-box"><img src="{{ asset('frontend') }}/assets/img/brand/brand_1_2.svg" alt="Brand Logo"></div></div></div></div></div></div> -->

    <section class="overflow-hidden space" id="blog-sec" data-bg-src="assets/img/bg/blog_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-end">
                <div class="col-lg">
                    <div class="text-center title-area text-lg-start">
                        <span class="sub-title style1">Blog Post</span>
                        <h2 class="sec-title">Latest News & Updates</h2>
                    </div>
                </div>
                <div class="col-lg-auto d-none d-lg-block">
                    <div class="sec-btn">
                        <a href="blog.html" class="th-btn">View More Post</a>
                    </div>
                </div>
            </div>

            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="blogSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1},"768":{"slidesPerView":2},"992":{"slidesPerView":2},"1200":{"slidesPerView":3}}}'>

                    <div class="swiper-wrapper">

                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/blog_1_1.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i> By Laun</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i> 15 Nov, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">What Kind of
                                            Fabrics
                                            Really Need Dry Cleaning</a></h3>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/blog_1_2.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i> By Laun</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i> 16 Nov, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">The Art of Dry
                                            Cleaning Care for Your Clothes</a></h3>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/blog_1_3.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i> By Laun</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i> 17 Nov, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Clean and Fresh
                                            The
                                            World of Dry Cleaning</a></h3>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/blog_1_4.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i> By Laun</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i> 19 Nov, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">Caring for
                                            Your
                                            Clothes the World of Dry Cleaning</a></h3>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 5 -->
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/blog_1_1.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i> By Laun</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i> 15 Nov, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">The Art of Dry
                                            Cleaning Reviving Fabrics with Care</a></h3>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 6 -->
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/blog_1_2.jpg" alt="blog image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="blog.html"><i class="far fa-user"></i> By Laun</a>
                                        <a href="blog.html"><i class="far fa-calendar"></i> 16 Nov, 2023</a>
                                    </div>
                                    <h3 class="box-title"><a href="https://wa.me/{{ $whatsapp->number }}">The Art of Dry
                                            Cleaning Expert Garment Care</a></h3>
                                    <a href="https://wa.me/{{ $whatsapp->number }}" class="border th-btn">Order Now</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Slider Navigation -->
                    <button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><i
                            class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#blogSlider1" class="slider-arrow slider-next"><i
                            class="far fa-arrow-right"></i></button>

                </div>
            </div>
        </div>
    </section>


    <footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer_bg_1.jpg">
        <!-- Widget Area -->
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">

                    <!-- About Widget -->
                    <div class="col-lg-6 col-xl-4">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="index.html">
                                        <img src="{{ asset('frontend') }}/assets/img/pre-logo.webp" width="150px"
                                            alt="Laun">
                                    </a>
                                </div>
                                <p class="about-text">
                                    Begin by scheduling your laundry service. You can choose from our convenient
                                    options. Any visible stains are pre-treated to ensure.
                                </p>
                                <div class="footer-info-wrapper">
                                    <div class="footer-info">
                                        <div class="footer-info_icon">
                                            <i class="fa-sharp fa-solid fa-phone"></i>
                                        </div>
                                        <a class="text-inherit" href="tel:+966565981175

">+966 56 598 1175
                                        </a>
                                    </div>
                                    <div class="footer-info">
                                        <div class="footer-info_icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <a class="text-inherit" href="mailto:geaulkarim@gmail.com
">geaulkarim@gmail.com
                                        </a>
                                    </div>
                                    <div class="footer-info">
                                        <div class="footer-info_icon">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>
                                        <span>Monday to Saturday: 9AM - 8PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Menu Widget -->
                    <div class="col-lg-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Our Services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu style2">
                                    <li><a href="service.html">Dry Cleaning</a></li>
                                    <li><a href="service.html">Quick Wash Express</a></li>
                                    <li><a href="service.html">Dust Removal</a></li>
                                    <li><a href="service.html">Stain Master Pro</a></li>
                                    <li><a href="service.html">Damage Repair</a></li>
                                    <li><a href="service.html">Eco Fresh Laundryy</a></li>
                                    <li><a href="service.html">Sanitize Clothes</a></li>
                                    <li><a href="service.html">Bright Blitz Laundry</a></li>
                                    <li><a href="service.html">Carpet Rinse</a></li>
                                    <li><a href="service.html">Pure Care Laundering</a></li>
                                    <li><a href="service.html">Laundry Service</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="col-lg-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="newsletter-widget style2">
                                <h4 class="text-white box-title">Sign Up For Newsletter</h4>
                                <div class="footer-search-contact mt-25">
                                    <form>
                                        <input class="form-control" type="email" placeholder="Enter your email">
                                    </form>
                                    <div class="mt-10 footer-btn">
                                        <button type="submit" class="th-btn style2 btn-fw">Subscribe Now</button>
                                    </div>
                                    <div class="mt-20 form-group">
                                        <input type="checkbox" id="html">
                                        <label for="html">I agree to all terms and policies</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright-wrap">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-6">
                        <p class="copyright-text">
                            Copyright <i class="fal fa-copyright"></i> 2026
                            <a href="index.html">ML Makka Laundry</a>. All Rights Reserved.
                        </p>
                    </div>
                    <div class="text-center col-md-6 text-md-end">
                        <div class="th-social">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://wa.me/{{ $whatsapp->number }}"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animation Bubbles -->
        <div class="animation-bubble">
            <div class="bubble-1"></div>
            <div class="bubble-2"></div>
            <div class="bubble-3"></div>
            <div class="bubble-4"></div>
            <div class="bubble-5"></div>
            <div class="bubble-6"></div>
            <div class="bubble-7"></div>
            <div class="bubble-8"></div>
            <div class="bubble-9"></div>
            <div class="bubble-10"></div>
        </div>

        <!-- Footer Shapes -->
        <div class="shape-mockup jump d-none d-xl-block" data-bottom="0%" data-left="0%">
            <img src="{{ asset('frontend') }}/assets/img/shape/footer_shape_1.png" alt="shape">
        </div>
        <div class="shape-mockup jump d-none d-xl-block" data-bottom="0%" data-right="0%">
            <img src="{{ asset('frontend') }}/assets/img/shape/footer_shape_2.png" alt="shape">
        </div>
    </footer>

    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%"
            viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>


    <div id="myPhone">
        <a href="tel:{{ $whatsapp->number }}" class="whatsapp_float">
            <i class="fa-solid fa-phone phone-icon"></i>
        </a>
    </div>
    <div id="whatsapp">
        <!-- whatsapp -->
        <a href="https://wa.me/{{ $whatsapp->number }}" class="whatsapp_float" target="_blank">
            <i class="fab fa-whatsapp whatsapp-icon"></i>
        </a>
    </div>

@endsection
