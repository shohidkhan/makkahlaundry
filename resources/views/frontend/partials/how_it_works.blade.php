<style>
    :root {
        --primary: #0ea5e9;
        --step-1: #3b82f6;
        /* Blue */
        --step-2: #10b981;
        /* Green */
        --step-3: #f59e0b;
        /* Orange */
        --step-4: #8b5cf6;
        /* Purple */
        --bg-light: #f8fafc;
        --text-dark: #1e293b;
        --text-muted: #64748b;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg-light);
    }

    .how-it-works {
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    /* Title Styling */
    .sub-title {
        display: inline-block;
        /* Teal from image */
        font-size: 14px;
        font-weight: 700;
        padding: 8px 24px;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .sec-title {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .sec-desc {
        max-width: 700px;
        margin: 0 auto 60px;
        color: var(--text-muted);
        font-size: 16px;
    }

    /* Step Card Styling */
    .works-card {
        background: white;
        border-radius: 24px;
        padding: 40px 30px;
        height: 100%;
        text-align: left;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        position: relative;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        /* Infinite Floating Animation */
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    /* Staggered animation delays */
    .col-step:nth-child(1) .works-card {
        animation-delay: 0s;
    }

    .col-step:nth-child(2) .works-card {
        animation-delay: 1s;
    }

    .col-step:nth-child(3) .works-card {
        animation-delay: 2s;
    }

    .col-step:nth-child(4) .works-card {
        animation-delay: 3s;
    }

    .works-card:hover {
        transform: translateY(-20px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        border-color: var(--primary);
    }

    /* Step Number Bubble */
    .step-number {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 25px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .num-1 {
        background: var(--step-1);
    }

    .num-2 {
        background: var(--step-2);
    }

    .num-3 {
        background: var(--step-3);
    }

    .num-4 {
        background: var(--step-4);
    }

    .box-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 15px;
    }

    .box-text {
        color: var(--text-muted);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .phone-link {
        color: var(--text-dark);
        font-weight: 700;
        text-decoration: none;
        border-bottom: 2px solid var(--step-1);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sec-title {
            font-size: 2rem;
        }

        .works-card {
            animation: none;
            margin-bottom: 10px;
        }
    }
</style>




<section class="how-it-works">
    <div class="container">
        <div class="text-center title-area">
            <span class="sub-title">How It Works</span>
            <h2 class="sec-title">Simple 4-step process to<br>fresh, clean clothes</h2>
            <p class="sec-desc">
                Order directly from your phone in minutes and let the team handle pickup, cleaning, and delivery
                while you stay focused on your worship schedule.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-xl-3 col-md-6 col-step">
                <div class="works-card">
                    <div class="step-number num-1">1</div>
                    <div class="box-content">
                        <h3 class="box-title">Call or WhatsApp</h3>
                        <p class="box-text">
                            Contact the manager at <a href="tel:{{ $whatsapp->number }}"
                                class="phone-link">{{ $whatsapp->number }}</a> by
                            call or WhatsApp to schedule a pickup from
                            your hotel near Haram.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-step">
                <div class="works-card">
                    <div class="step-number num-2">2</div>
                    <div class="box-content">
                        <h3 class="box-title">We collect</h3>
                        <p class="box-text">
                            A staff member arrives at your hotel lobby or reception in the Haram area, confirms your
                            order, and collects your laundry bags.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-step">
                <div class="works-card">
                    <div class="step-number num-3">3</div>
                    <div class="box-content">
                        <h3 class="box-title">Professional clean</h3>
                        <p class="box-text">
                            Clothes are washed, dried, and folded using quality detergents and appropriate settings
                            for fabric type to protect colors and comfort.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-step">
                <div class="works-card">
                    <div class="step-number num-4">4</div>
                    <div class="box-content">
                        <h3 class="box-title">Fast delivery</h3>
                        <p class="box-text">
                            Your clean laundry is delivered back to your hotel within 24–48 hours, or faster if you
                            selected express service at booking.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
