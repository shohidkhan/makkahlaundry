<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800;900&amp;family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800;9..40,900&amp;display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/fontawesome.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/whatsapp.css">
<style>
    html, body {
        overflow-x: hidden !important;
        width: 100%;
        max-width: 100%;
    }

    .th-hero-wrapper,
    .footer-wrapper {
        overflow: hidden;
    }

    .th-header.header-layout1 .menu-area {
        background-color: #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    /* whats order utoon */
    .order_tn {
        background: #25D366;

        color: #fff !important;
        border-radius: 35px;
        font-weight: 600;
        display: inline-block;
        text-align: center;
    }

    .th-header.header-layout1 .menu-area a {
        color: #000 !important;
    }

    .th-header.header-layout1 .main-menu>ul {
        display: flex;
        justify-content: flex-end;
        gap: 24px;
    }

    #listOFSm {
        margin-top: 20px;
    }

    #listOFSm ul {
        padding: 0;
    }

    #listOFSm ul li {
        list-style: none;
        display: inline-block;
        font-size: 14px;
        color: #00151D;
        margin-left: 10px;
        padding: 0 10px;
        margin-bottom: 8px;
        border-radius: 35px;
        background-color: #f9f9f9;
    }

    #listOFSm ul li i {
        margin-right: 8px;
    }

    .sub-title {
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 12px;
    }

    .hero-inner {
        position: relative;
    }

    .hero-right-panel {
        position: absolute;
        right: 120px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        gap: 16px;
        z-index: 10;
    }

    .hero-right-card {
        width: 420px;
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
        padding: 18px;
        backdrop-filter: saturate(180%) blur(8px);
    }

    .hero-right-badge {
        display: inline-block;
        background: rgba(41, 70, 184, 0.1);
        color: #00151D;
        font-weight: 600;
        border-radius: 999px;
        padding: 6px 14px;
        margin-bottom: 12px;
        box-shadow: inset 0 0 0 1px rgba(41, 70, 184, 0.15);
        font-size: 14px;
    }

    .hero-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 12px;
    }



    .hero-info-item {
        background: #F5F7FA;
        border-radius: 12px;
        padding: 12px 14px;
        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.06);
    }

    .hero-info-title {
        font-weight: 700;
        font-size: 14px;
        color: #00151D;
        margin-bottom: 4px;
    }

    .hero-info-desc {
        font-size: 13px;
        color: #788094;
    }

    .hero-right-images {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 10px;
        margin-top: 40px;
        transition: transform 0.3s ease;
        /* overflow: hidden; */
        position: relative;
    }

    .hero-right-images img {
        /* width: 100px; */
        /* height: 100%; */
        object-fit: cover;
        border-radius: 12px;
        transition: transform 0.3s ease;
    }

    .hero-right-img1 {
        width: 300px;
        height: 100px;
    }

    .hero-right-img2 {
        width: 48%;
        position: absolute;
        top: -20px;
        right: 30px;
    }

    .hero-right-images img:hover {
        transform: scale(1.05);
    }

    #hero {
        margin-top: -100px;

    }

    .hero-right-ctas {
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        transition: transform 0.3s ease;
    }

    .hero-right-ctas a:hover {
        transform: scale(1.05);
        color: #fff;
    }

    .hero-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        border-radius: 999px;
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        min-width: 140px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .hero-cta--whatsapp {
        background: #25D366;
    }

    .hero-cta--call {
        background: linear-gradient(135deg, #5c7cfa 0%, #7b50ff 100%);
    }



    .hero-title {
        font-size: 56px;
        background: linear-gradient(90deg, #00f0ff, #00ff88, #ffffff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        /* Heavier weight makes gradients pop more */
    }

    .th-hero-bg {
        background-position: top right;
        background-size: inherit;
        background-repeat: no-repeat;
        opacity: 0.5;
    }



    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }


    @media (max-width: 1399px) {
        .hero-right-card {
            width: 500px;
        }
    }

    @media (max-width: 767px) {
        .hero-style1 .hero-title {
            font-size: 40px;
            /* smaller heading */
        }

        .section-title {
            font-size: 30px;
        }
    }
</style>
