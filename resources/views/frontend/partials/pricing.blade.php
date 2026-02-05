    <style>
        :root {
            --primary-green: #8cc63f;
            /* Signature Green from image */
            --dark-overlay: rgba(15, 23, 42, 0.75);
            --glass: rgba(255, 255, 255, 0.98);
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* Animated Background with Makkah Image */
        .pricing-area {
            padding: 100px 0;
            position: relative;
            background: linear-gradient(var(--dark-overlay), var(--dark-overlay)),
                url('https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            animation: bgZoom 20s infinite alternate ease-in-out;
            margin-bottom: 50px;
        }

        @keyframes bgZoom {
            0% {
                background-position: center;
                filter: brightness(1);
            }

            100% {
                background-position: top;
                filter: brightness(1.2);
            }
        }

        .section-header {
            margin-bottom: 60px;
            position: relative;
            z-index: 2;
        }

        .pricing-sub-title {
            color: var(--primary-green);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 10px;
        }

        .main-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
        }

        /* Modern Card Styling */
        .main-prcining-card {
            background: var(--glass);
            border-radius: 30px;
            padding: 0;
            overflow: hidden;
            border: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            animation: float 6s ease-in-out infinite;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Staggered floating delays */
        .col-lg-3:nth-child(2) .main-prcining-card {
            animation-delay: 1s;
        }

        .col-lg-3:nth-child(3) .main-prcining-card {
            animation-delay: 2s;
        }

        .main-prcining-card:hover {
            transform: scale(1.05);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }

        .card-header-box {
            padding: 40px 20px;
            background: white;
            position: relative;
            text-align: center;
        }

        /* Featured / Express Card */
        .main-prcining-card.featured .card-header-box {
            background: var(--primary-green);
            color: white;
        }

        .plan-name {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .service-time {
            font-size: 0.85rem;
            opacity: 0.7;
            display: block;
            margin-bottom: 15px;
        }

        .price-value {
            font-size: 3.5rem;
            font-weight: 800;
            display: block;
            line-height: 1;
        }

        .price-value span {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .pricing-list {
            list-style: none;
            padding: 30px;
            margin: 0;
            flex-grow: 1;
        }

        .pricing-list li {
            margin-bottom: 15px;
            color: #475569;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pricing-list li i {
            color: var(--primary-green);
            font-size: 1.2rem;
        }

        .btn-purchase {
            margin: 0 30px 40px;
            padding: 15px;
            border-radius: 50px;
            border: 2px solid var(--primary-green);
            background: transparent;
            color: var(--primary-green);
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .main-prcining-card.featured .btn-purchase {
            background: var(--primary-green);
            color: white;
        }

        .btn-purchase:hover {
            background: var(--primary-green);
            color: white;
            box-shadow: 0 10px 20px rgba(140, 198, 63, 0.3);
        }

        .icon-badge {
            position: absolute;
            bottom: -25px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-size: 24px;
            border: 4px solid white;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .main-prcining-card.featured .icon-badge {
            background: #fff;
            color: var(--primary-green);
        }

        .popular-badge {
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffc107;
            color: #000;
            padding: 2px 15px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            z-index: 3;
        }

        @media (max-width: 768px) {
            .pricing-area .main-title {
                font-size: 30px;
            }
        }
    </style>


    <section class="pricing-area">
        <div class="container">
            <div class="section-header text-center">
                <span class="pricing-sub-title">Transparent Pricing</span>
                <h2 class="main-title">Laundry Service Price in Makkah Heram</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="main-prcining-card">
                        <div class="card-header-box">
                            <div class="plan-name">Standard Laundry</div>
                            <span class="service-time">12 Hour Service</span>
                            <div class="price-value">18<span> SAR/kg</span></div>
                            <div class="icon-badge"><i class="fa-solid fa-clock-rotate-left"></i></div>
                        </div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-circle-check"></i> Full Service: Wash, Dry, Iron</li>
                            <li><i class="fa-solid fa-circle-check"></i> 12-Hour Guaranteed Delivery</li>
                            <li><i class="fa-solid fa-circle-check"></i> Free Pickup & Delivery</li>
                            <li><i class="fa-solid fa-circle-check"></i> Pilgrims' Top Choice</li>
                        </ul>
                        <a href="https://wa.me/{{ $whatsapp->number }}"
                            class="btn-purchase text-center text-decoration-none">Order Standard</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="main-prcining-card">
                        <div class="card-header-box">
                            <div class="plan-name">Most wanted Price</div>
                            <span class="service-time">5-6 Hour Service</span>
                            <div class="price-value">25<span> SAR/kg</span></div>
                            <div class="icon-badge"><i class="fa-solid fa-truck"></i></div>
                        </div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-circle-check"></i> Full Service: Wash, Dry, Iron</li>
                            <li><i class="fa-solid fa-circle-check"></i> 12-Hour Guaranteed Delivery</li>
                            <li><i class="fa-solid fa-circle-check"></i> Free Pickup & Delivery</li>
                            <li><i class="fa-solid fa-circle-check"></i> Pilgrims' Top Choice</li>
                        </ul>
                        <a href="https://wa.me/{{ $whatsapp->number }}"
                            class="btn-purchase text-center text-decoration-none">Order Standard</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="main-prcining-card featured">
                        <div class="popular-badge">Most Popular</div>
                        <div class="card-header-box">
                            <div class="plan-name">Express Laundry</div>
                            <span class="service-time">URGENT 1 Hour Service</span>
                            <div class="price-value">35<span> SAR/kg</span></div>
                            <div class="icon-badge"><i class="fa-solid fa-bolt-lightning"></i></div>
                        </div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-circle-check"></i> Complete Wash, Dry & Iron</li>
                            <li><i class="fa-solid fa-circle-check"></i> 1-Hour Express Delivery</li>
                            <li><i class="fa-solid fa-circle-check"></i> Available 24/7</li>
                            <li><i class="fa-solid fa-circle-check"></i> Perfect for Emergencies</li>
                        </ul>
                        <a href="https://wa.me/{{ $whatsapp->number }}"
                            class="btn-purchase text-center text-decoration-none">Order Express Now</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="main-prcining-card">
                        <div class="card-header-box">
                            <div class="plan-name">Press & Fold</div>
                            <span class="service-time">5 Hour Service</span>
                            <div class="price-value">13<span> SAR/kg</span></div>
                            <div class="icon-badge"><i class="fa-solid fa-layer-group"></i></div>
                        </div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-circle-check"></i> Professional Iron & Fold</li>
                            <li><i class="fa-solid fa-circle-check"></i> 5-Hour Turnaround</li>
                            <li><i class="fa-solid fa-circle-check"></i> Free Pickup & Delivery</li>
                            <li><i class="fa-solid fa-circle-check"></i> Best Budget Option</li>
                        </ul>
                        <a href="https://wa.me/{{ $whatsapp->number }}"
                            class="btn-purchase text-center text-decoration-none">Order Press & Fold</a>
                    </div>
                </div>
            </div>


        </div>
    </section>
