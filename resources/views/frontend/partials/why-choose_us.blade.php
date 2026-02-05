<style>
    :root {
        --primary: #0ea5e9;
        --primary-glow: rgba(14, 165, 233, 0.15);
        --secondary: #2dd4bf;
        --purple: #8b5cf6;
        --bg-dark: #0f172a;
        --card-bg: #ffffff;
        --text-main: #1e293b;
        --text-muted: #64748b;
        --whatsapp: #25D366;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        background: #f8fafc;
        overflow-x: hidden;
    }

    /* Modern Background Glows */
    .why-section {
        padding: 100px 0;
        position: relative;
        z-index: 1;
    }

    .why-section::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
        z-index: -1;
        filter: blur(60px);
    }

    /* Badge Styling */
    .badge-label {
        display: inline-block;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        padding: 8px 20px;
        border-radius: 100px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
    }

    .section-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 2.5rem;
        color: var(--text-main);
        margin-bottom: 20px;
    }

    .section-title span {
        background: linear-gradient(90deg, var(--primary), var(--purple));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Modern Card Design */
    .why-card {
        background: var(--card-bg);
        border-radius: 24px;
        padding: 40px 30px;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);

        /* Infinite Floating Animation */
        animation: float 6s ease-in-out infinite;
    }

    /* Staggered Floating Times */
    .col-lg-4:nth-child(1) .why-card {
        animation-delay: 0s;
    }

    .col-lg-4:nth-child(2) .why-card {
        animation-delay: 1.5s;
    }

    .col-lg-4:nth-child(3) .why-card {
        animation-delay: 3s;
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

    .why-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 20px 40px rgba(14, 165, 233, 0.12);
        border-color: var(--primary);
    }

    /* Icon Styling */
    .icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        position: relative;
    }

    .icon-wrapper.p {
        background: rgba(14, 165, 233, 0.1);
        color: var(--primary);
    }

    .icon-wrapper.s {
        background: rgba(45, 212, 191, 0.1);
        color: var(--secondary);
    }

    .icon-wrapper.purp {
        background: rgba(139, 92, 246, 0.1);
        color: var(--purple);
    }

    .icon-wrapper i {
        font-size: 32px;
    }

    /* List styling */
    .choose-list {
        list-style: none;
        padding: 0;
        margin-bottom: 30px;
        flex-grow: 1;
    }

    .choose-list li {
        margin-bottom: 12px;
        color: var(--text-muted);
        font-size: 15px;
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .choose-list i {
        color: var(--secondary);
        font-size: 18px;
    }

    /* Animated WhatsApp Button */
    .whatsapp-btn {
        background: var(--whatsapp);
        color: white;
        text-decoration: none;
        padding: 15px;
        border-radius: 15px;
        text-align: center;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: 0.3s;
        overflow: hidden;
        position: relative;
    }

    .whatsapp-btn:hover {
        background: #1eb954;
        color: white;
        box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
    }

    /* Pulse effect on button icon */
    .whatsapp-btn i {
        animation: pulse-icon 2s infinite;
    }

    @keyframes pulse-icon {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }

    @media (max-width: 768px) {
        .why-section .section-title {
            font-size: 30px;
        }

        .why-card {
            animation: none !important;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 768px) {
        .why-section .section-title {
            font-size: 30px;
        }

        .why-card {
            animation: none !important;
            margin-bottom: 20px;
        }
    }
</style>

<section class="why-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <span class="badge-label">Why Choose Us</span>
                <h2 class="section-title">
                    The Best Laundry Experience at <span>Makkah Heram</span>
                </h2>
                <p class="text-muted">Fast, affordable, and professional cleaning services located right in the heart of
                    Abraj Al Bait.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="why-card">
                    <div class="icon-wrapper p">
                        <i class="fa-solid fa-rocket"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Fast & Professional Service</h4>
                    <ul class="choose-list">
                        <li><i class="fa-solid fa-circle-check"></i> Individual machine wash</li>
                        <li><i class="fa-solid fa-circle-check"></i> Fabric-specific cleaning methods</li>
                        <li><i class="fa-solid fa-circle-check"></i> Expert stain removal</li>
                        <li><i class="fa-solid fa-circle-check"></i> Clean, hygienic processing</li>
                        <li><i class="fa-solid fa-circle-check"></i> Careful pressing, folding, or hanger finishing</li>
                    </ul>
                    <a href="https://wa.me/{{ $whatsapp->number }}" class="whatsapp-btn">
                        <i class="bi bi-whatsapp"></i> Chat with Us
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="why-card">
                    <div class="icon-wrapper s">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Express & Emergency Options</h4>
                    <ul class="choose-list">
                        <li><i class="fa-solid fa-circle-check"></i> Same-day laundry service
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> 6-8 hour express wash & delivery
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> 24/7 availability across Makkah
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> Priority service for urgent needs
                        </li>
                    </ul>
                    <a href="https://wa.me/{{ $whatsapp->number }}" class="whatsapp-btn">
                        <i class="bi bi-whatsapp"></i> Request Pickup
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="why-card">
                    <div class="icon-wrapper purp">
                        <i class="fa-solid fa-shield"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Trusted & Consistent Results</h4>
                    <ul class="choose-list">
                        <li><i class="fa-solid fa-circle-check"></i> On-time pickup and delivery
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i>Professional, trained staff
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> Special care for Ihram and delicate garments
                        <li><i class="fa-solid fa-circle-check"></i> Reliable service for residents, pilgrims, and
                            hotels

                        </li>
                    </ul>
                    <a href="https://wa.me/{{ $whatsapp->number }}" class="whatsapp-btn">
                        <i class="bi bi-whatsapp"></i> View Prices
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
