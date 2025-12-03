<!-- Font Awesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- ====== SCOPED ABOUT PAGE STYLES ====== -->
<style>
    .about-page * { box-sizing: border-box; }

    .about-page {
        --primary: #4f46e5;
        --accent: #f97316;
        --bg: #f9fafb;
        --card: #ffffff;
        --muted: #6b7280;
        --radius: 16px;
        --shadow: 0 12px 36px rgba(0,0,0,0.08);
        font-family: 'Inter', sans-serif;
        background: var(--bg);
        color: #111827;
        padding: 0 25px 60px 25px;
    }

    /* Banner */
    .about-page .banner {
        background-image: url('assets/images/banner3.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        color: #fff;
        padding: 120px 25px;
        text-align: center;
        overflow: hidden;
        margin-bottom: 50px;
        filter: brightness(0.85);
        border-radius: var(--radius);
        height: 300px;
    }
    .about-page .banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.35);
        border-radius: var(--radius);
    }
    .about-page .banner-content { position: relative; z-index: 1; }
    .about-page .banner-content h1 { font-size: 52px; font-weight: 800; margin-bottom: 12px; line-height:1.2; }
    .about-page .banner-content p { font-size: 22px; font-weight:500; }

    /* About Section */
    .about-page .about-section {
        display:flex;
        flex-wrap:wrap;
        gap:30px;
        margin-bottom:50px;
        justify-content:space-between;
        align-items:center;
    }
    .about-page .about-text { flex:1; min-width:280px; }
    .about-page .about-text p { line-height:1.7; font-size:16px; color:var(--muted); }
    .about-page .about-image { flex:1; min-width:280px; }
    .about-page .about-image img { width:100%; border-radius: var(--radius); box-shadow: var(--shadow); transition: transform 0.3s ease; }
    .about-page .about-image img:hover { transform: scale(1.03); }

    /* Story Card & Highlights */
    .about-page .page { display:flex; flex-wrap:wrap; gap:20px; justify-content:space-between; }
    .about-page .card { background: var(--card); padding:20px; flex:1; transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: var(--radius); }
    .about-page .story h2 { margin:0 0 14px; color: var(--primary); font-size: 24px; font-weight:700; }
    .about-page .story p { color: var(--muted); font-size:16px; line-height:1.6; }
    .about-page .highlights { display:flex; flex-wrap:wrap; gap:10px; margin-top:16px; }
    .about-page .pill {
        background: linear-gradient(90deg, rgba(79,70,229,0.08), rgba(249,115,22,0.08));
        padding:8px 16px;
        border-radius:14px;
        font-weight:600;
        color: var(--primary);
        font-size:14px;
        transition: background 0.3s ease;
    }
    .about-page .pill:hover { background: linear-gradient(90deg, rgba(79,70,229,0.15), rgba(249,115,22,0.12)); }

    /* Amenities */
    .about-page aside.amenities h2 { font-size:22px; font-weight:600; margin-bottom:16px; }
    .about-page aside.amenities ul { padding-left:0; list-style:none; }
    .about-page aside.amenities ul li { margin-bottom:10px; font-size:15px; color:var(--muted); display:flex; align-items:center; gap:6px; }

    /* Owner & Testimonials */
    .site-section-heading h2 { font-size:28px; margin-bottom:16px; color:var(--primary); }
    .site-section .img-fluid { border-radius: var(--radius); }

    .text-black h3 { color:#111827; }
    .text-black p { color:#555; font-style: italic; }

    /* Responsive */
    @media(max-width:991px){
        .about-page .about-section { flex-direction:column; margin-left:0; margin-right:0; }
        .about-page .page { flex-direction:column; }
    }
</style>

<div class="about-page">

    <!-- Banner -->
    <div class="banner">
        <div class="banner-content">
            <h1>Our Rental Apartments</h1>
            <p>Comfortable and luxury spaces designed for modern living</p>
        </div>
    </div>

    <!-- About Section -->
    <div class="about-section">
        <div class="about-text">
            <p>Founded with the vision of providing premium rental apartments, we combine modern design, convenience, and comfort. Our apartments are carefully curated to meet the diverse needs of individuals, families, and professionals.</p>
            <p>We prioritize quality living, exceptional service, and attention to detail to ensure every resident enjoys a seamless experience in their new home.</p>
        </div>
        <div class="about-image">
            <img src="https://picsum.photos/600/400?random=201" alt="Apartment building">
        </div>
    </div>

    <!-- Story & Amenities -->
    <main class="page">
        <section class="story card">
            <h2>Our Story</h2>
            <p>Founded in <strong>[Year]</strong>, <strong>[Property Name]</strong> began with a mission to create comfortable, stylish, and secure living spaces. We focus on thoughtful layouts, natural lighting, durable finishes, and excellent maintenance support—ensuring every tenant enjoys a smooth and pleasant living experience.</p>
            <div class="highlights">
                <div class="pill">24/7 Security</div>
                <div class="pill">Flexible Leasing</div>
                <div class="pill">High-speed Internet</div>
                <div class="pill">On-site Maintenance</div>
            </div>
            <p style="margin-top:16px;">Residents appreciate our transparent pricing, friendly support team, and calm community environment. Every detail is designed to make your stay convenient, comfortable, and worry-free.</p>
        </section>

        <aside class="amenities card">
            <h2>Amenities Offered</h2>
            <ul>
                <li>✔ Fast WiFi</li>
                <li>✔ Air Conditioning</li>
                <li>✔ Fully Equipped Kitchen</li>
                <li>✔ Security / CCTV</li>
                <li>✔ Parking</li>
                <li>✔ Generator / Backup Power</li>
                <li>✔ Swimming Pool / Gym (if available)</li>
            </ul>
        </aside>
    </main>

    <!-- Owner -->
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/banner2.jpg" alt="Owner Image" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h2>Owner</h2>
                    <p><strong>Austin Tengbeh</strong> — Property Manager</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="site-section block-13 bg-light">
        <div class="container">
            <div class="site-section-heading text-center mb-5">
                <h2>Testimonials</h2>
            </div>
            <div class="nonloop-block-13 owl-carousel">
                <div class="text-center p-3 p-md-5 bg-white">
                    <div class="mb-4">
                        <img src="images/person_1.jpg" alt="Mark P." class="w-50 mx-auto img-fluid rounded-circle">
                    </div>
                    <div class="text-black">
                        <h3 class="font-weight-light h5">Mark P.</h3>
                        <p class="font-italic">“Excellent amenities and a calm environment. Highly recommended!”</p>
                    </div>
                </div>

                <div class="text-center p-3 p-md-5 bg-white">
                    <div class="mb-4">
                        <img src="images/person_2.jpg" alt="Jane Brooke Cagle" class="w-50 mx-auto img-fluid rounded-circle">
                    </div>
                    <div class="text-black">
                        <h3 class="font-weight-light h5">Jane Brooke Cagle</h3>
                        <p class="font-italic">“Living here has been a delight. The management is responsive and the apartments are well-maintained.”</p>
                    </div>
                </div>

                <div class="text-center p-3 p-md-5 bg-white">
                    <div class="mb-4">
                        <img src="images/person_3.jpg" alt="Philip Martin" class="w-50 mx-auto img-fluid rounded-circle">
                    </div>
                    <div class="text-black">
                        <h3 class="font-weight-light h5">Philip Martin</h3>
                        <p class="font-italic">“Very comfortable apartments with modern amenities.”</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
