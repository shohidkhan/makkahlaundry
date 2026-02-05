 <style>
     :root {
         --makkah-teal: #008080;
         --accent-gold: #ffc107;
         --dark-navy: #0b1121;
     }

     body {
         font-family: 'Poppins', sans-serif;
         background: #f8fafc;
     }

     .services-section {
         padding: 100px 0;
         background: #ffffff;
     }

     .section-badge {
         background: var(--makkah-teal);
         color: white;
         padding: 6px 20px;
         border-radius: 50px;
         font-size: 12px;
         font-weight: 700;
         text-transform: uppercase;
         display: inline-block;
         margin-bottom: 15px;
     }

     .section-title {
         font-weight: 800;
         font-size: 2.8rem;
         color: var(--dark-navy);
         margin-bottom: 50px;
     }

     .main-service-card {
         background: white;
         border-radius: 30px;
         overflow: hidden;
         border: 1px solid #f1f5f9;
         transition: all 0.4s ease;
         height: 100%;
         display: flex;
         flex-direction: column;
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
     }

     .service-img-wrapper {
         position: relative;
         height: 250px;
         overflow: hidden;
     }

     .service-img-wrapper img {
         width: 100%;
         height: 100%;
         object-fit: cover;
         transition: 0.6s;
     }

     .status-tag {
         position: absolute;
         top: 20px;
         right: 20px;
         background: white;
         padding: 5px 15px;
         border-radius: 50px;
         font-size: 11px;
         font-weight: 800;
         color: var(--dark-navy);
         z-index: 2;
     }

     .service-content {
         padding: 35px;
         flex-grow: 1;
     }

     .service-icon-box {
         width: 55px;
         height: 55px;
         background: #f0fdfa;
         color: var(--makkah-teal);
         border-radius: 18px;
         display: flex;
         align-items: center;
         justify-content: center;
         font-size: 24px;
         margin-bottom: 20px;
     }

     .main-service-card:hover {
         transform: translateY(-10px);
         box-shadow: 0 20px 40px rgba(0, 128, 128, 0.1);
         border-color: var(--makkah-teal);
     }

     .btn-action {
         margin-top: 20px;
         padding: 12px;
         border-radius: 12px;
         border: 2px solid #f1f5f9;
         color: var(--dark-navy);
         font-weight: 700;
         text-decoration: none;
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 10px;
         transition: 0.3s;
     }

     .btn-action:hover {
         background: var(--makkah-teal);
         color: white;
         border-color: var(--makkah-teal);
     }

     @media (max-width: 768px) {
         .services-section .section-title {
             font-size: 30px;
         }
     }

     @media (max-width: 768px) {
         .services-section .section-title {
             font-size: 30px;
         }
     }
 </style>


 <section class="services-section">
     <div class="container text-center">
         <span class="section-badge">Our Services</span>
         <h2 class="section-title">Professional Solutions for Your Stay</h2>

         <div class="row g-4 justify-content-center">
             <div class="col-lg-4 col-md-6">
                 <div class="main-service-card">
                     <div class="service-img-wrapper">
                         <div class="status-tag">24-48 Hours</div>
                         <img src="https://images.unsplash.com/photo-1545173168-9f1947eebb7f?auto=format&fit=crop&q=80&w=800"
                             alt="Laundry">
                     </div>
                     <div class="service-content">
                         <div class="service-icon-box"><i class="bi bi-water"></i></div>
                         <h4 class="fw-bold">Standard Laundry</h4>
                         <p class="text-muted small">Complete wash, dry, and fold service. Ideal for pilgrims and
                             travelers staying in hotels around Masjid al-Haram.</p>
                         <a href="https://wa.me/{{ $whatsapp->number }}" class="btn-action">Order Now <i
                                 class="bi bi-whatsapp"></i></a>
                     </div>
                 </div>
             </div>

             <div class="col-lg-4 col-md-6">
                 <div class="main-service-card" style="border-top: 5px solid var(--accent-gold);">
                     <div class="service-img-wrapper">
                         <div class="status-tag" style="background: var(--accent-gold);">6-8 Hour Express</div>
                         <img src="https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?auto=format&fit=crop&q=80&w=800"
                             alt="Express Machine Service">
                     </div>
                     <div class="service-content text-start">
                         <div class="service-icon-box" style="color: var(--accent-gold);"><i
                                 class="bi bi-lightning-charge-fill"></i></div>
                         <h4 class="fw-bold">Express Service</h4>
                         <p class="text-muted small">Priority processing with rapid 6-8 hour turnaround. High-heat
                             professional drying ensures your clothes are ready when you need them.</p>
                         <a href="https://wa.me/{{ $whatsapp->number }}" class="btn-action"
                             style="border-color: var(--accent-gold);">Order
                             Express <i class="bi bi-whatsapp"></i></a>
                     </div>
                 </div>
             </div>

             <div class="col-lg-4 col-md-6">
                 <div class="main-service-card">
                     <div class="service-img-wrapper">
                         <div class="status-tag">Perfect for Thobes</div>
                         <img src="https://images.unsplash.com/photo-1489274495757-95c7c837b101?auto=format&fit=crop&q=80&w=800"
                             alt="Ironing">
                     </div>
                     <div class="service-content text-start">
                         <div class="service-icon-box"><i class="bi bi-check-all"></i></div>
                         <h4 class="fw-bold">Press & Fold</h4>
                         <p class="text-muted small">Professional crisp ironing and neat folding. Perfect for your
                             Thobes, Ihram garments, and formal wear.</p>
                         <a href="https://wa.me/{{ $whatsapp->number }}" class="btn-action">Order Now <i
                                 class="bi bi-whatsapp"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
