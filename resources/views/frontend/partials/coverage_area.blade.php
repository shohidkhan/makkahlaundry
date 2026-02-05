<style>
    :root {
        --makkah-teal: #00d2d2;
        /* Brighter teal for high contrast on dark */
        --dark-bg: #0b1121;
        /* Deep navy/dark background */
        --glass-card: rgba(255, 255, 255, 0.05);
        --glass-border: rgba(255, 255, 255, 0.1);
    }



    /* Coverage Section */
    #coverage-section {
        position: relative;
        padding: 100px 0;
        overflow: hidden;
        min-height: 80vh;
        display: flex;
        align-items: center;
    }

    /* Particles.js Background Layer */
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }

    .container {
        position: relative;
        z-index: 2;
    }

    /* Dark Glassmorphism Content Box */
    .coverage-glass-box {
        background: var(--glass-card);
        padding: 28px 15px;
        border-radius: 30px;
        text-align: center;
        border: 1px solid var(--glass-border);
        backdrop-filter: blur(1px);
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
    }

    .coverage-badge {
        background: var(--makkah-teal);
        color: #000;
        padding: 6px 25px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        display: inline-block;
        margin-bottom: 25px;
        box-shadow: 0 0 20px rgba(0, 210, 210, 0.4);
    }

    .coverage-title {
        font-size: 40px;
        font-weight: 800;
        margin-bottom: 25px;
        line-height: 1.2;

        /* Luxury Gold & Teal Gradient */
        background: linear-gradient(to right, #ffffff 20%, #40c9ff 50%, #e81cff 80%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;

        /* Adds depth to the letters */
        filter: drop-shadow(0px 5px 15px rgba(0, 0, 0, 0.4));
    }

    .coverage-desc {
        color: #a0aec0;
        font-size: 1.1rem;
        max-width: 850px;
        margin: 0 auto 50px;
        line-height: 1.8;
    }

    /* Location Tags Styling */
    .location-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    .location-tag {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        padding: 12px 15px;
        border-radius: 50px;
        font-weight: 600;
        border: 1px solid var(--glass-border);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: floating 5s ease-in-out infinite;
    }

    @keyframes floating {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    /* Staggered animation for variety */
    .location-tag:nth-child(even) {
        animation-delay: 1.5s;
    }

    .location-tag:nth-child(3n) {
        animation-delay: 2.5s;
    }

    .location-tag:hover {
        background: var(--makkah-teal);
        color: #000;
        border-color: var(--makkah-teal);
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(0, 210, 210, 0.3);
    }

    .location-tag i {
        color: var(--makkah-teal);
        transition: 0.3s;
    }

    .location-tag:hover i {
        color: #000;
    }

    @media (max-width: 768px) {
        .coverage-title {
            font-size: 2rem;
        }

        .coverage-glass-box {
            padding: 40px 20px;
        }
    }
</style>
<section id="coverage-section" style="background-color: #0b1121; padding: 50px 10px;">
    <div id="particles-js"></div>

    <div class="container">
        <div class="coverage-glass-box">
            <span class="coverage-badge">Coverage Areas</span>
            <h2 class="coverage-title">Located at Makkah Al Heram Serving All Nearby Hotels</h2>

            <p class="coverage-desc">
                We're located right at the closest laundry to Masjid
                al-Haram! Pickup and delivery available across all hotel zones: Clock Tower, Ajyad, Jabal Omar,
                Misfalah. When you search "laundry near me" in Makkah, we're your nearest choice!
            </p>

            <div class="location-grid">
                <div class="location-tag"><i class="bi bi-geo-alt-fill"></i> Ajyad</div>
                <div class="location-tag"><i class="bi bi-geo-alt-fill"></i> Ibrahim Khalil</div>
                <div class="location-tag"><i class="bi bi-geo-alt-fill"></i> Jabal Omar</div>
                <div class="location-tag"><i class="bi bi-geo-alt-fill"></i> Misfalah</div>
                <div class="location-tag"><i class="bi bi-geo-alt-fill"></i> Central Area (near Haram)</div>
                <div class="location-tag"><i class="bi bi-geo-alt-fill"></i> Abraj Al Bait / Clock Towers</div>
            </div>
        </div>
    </div>
</section>

<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 100,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#00d2d2"
            },
            "shape": {
                "type": "circle"
            },
            "opacity": {
                "value": 0.6,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 4,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 4,
                    "size_min": 0.3,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#00d2d2",
                "opacity": 0.2,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 2,
                "direction": "none",
                "random": true,
                "straight": false,
                "out_mode": "out",
                "bounce": false
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "grab"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 200,
                    "line_linked": {
                        "opacity": 0.5
                    }
                },
                "push": {
                    "particles_nb": 4
                }
            }
        },
        "retina_detect": true
    });
</script>
