

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary: #2b8cff;
            --accent: #ff7a59;
            --bg: #f6f8fb;
            --card: #ffffff;
            --radius: 16px;
            --shadow: 0 8px 25px rgba(0,0,0,0.08);
            --muted:#666;
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: 'Inter', sans-serif;
        }

        /* HEADER */
        .gallery-header {
            width: 100%;
            padding: 80px 20px;
            text-align: center;
            background: linear-gradient(to right, var(--primary), var(--accent));
            color: #fff;
        }

        .gallery-header h1 {
            font-size: 42px;
            margin: 0;
            font-weight: 700;
        }

        .gallery-header p {
            font-size: 18px;
            margin-top: 10px;
            opacity: 0.9;
        }

        /* GALLERY GRID */
        .gallery-container {
            max-width: 1200px;
            margin: 60px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 22px;
            padding: 0 20px;
        }

        .gallery-card {
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: 0.3s;
        }

        .gallery-card:hover {
            transform: translateY(-6px);
        }

        .gallery-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .gallery-info {
            padding: 20px;
        }

        .gallery-info h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .gallery-info p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 15px;
        }

        /* LIGHTBOX STYLE */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .lightbox.active {
            display: flex;
        }

             /* Banner */
         .contact-banner {
             background: url('assets/images/banner6.jpg') center/cover no-repeat;
             padding: 120px 20px;
             color: #fff;
             text-align: center;
             position: relative;
             margin-bottom: 50px;
         }
        .contact-banner .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.45);
            border-radius: 12px;
        }
        .contact-banner .content {
            position: relative;
            z-index: 2;
        }
        .contact-banner h1 {
            font-size: 48px;
            font-weight: 700;
            margin: 0;
        }
    </style>


<!-- HEADER -->
    <div class="contact-banner">
        <div class="overlay"></div>
        <div class="content">
            <h1>Our Gallery</h1>
        </div>
    </div>


<!-- GALLERY GRID -->
<div class="gallery-container">
    <div class="gallery-card">
        <img src="https://picsum.photos/id/1018/600/400" onclick="openLightbox(this.src)">
        <div class="gallery-info">
            <h3>Living Room</h3>
            <p>Clean, modern and cozy interior.</p>
        </div>
    </div>

    <div class="gallery-card">
        <img src="https://picsum.photos/id/1015/600/400" onclick="openLightbox(this.src)">
        <div class="gallery-info">
            <h3>Bedroom</h3>
            <p>Warm lighting and elegant bedding.</p>
        </div>
    </div>

    <div class="gallery-card">
        <img src="https://picsum.photos/id/1020/600/400" onclick="openLightbox(this.src)">
        <div class="gallery-info">
            <h3>Kitchen Space</h3>
            <p>Fully equipped modern kitchen.</p>
        </div>
    </div>

    <div class="gallery-card">
        <img src="https://picsum.photos/id/1024/600/400" onclick="openLightbox(this.src)">
        <div class="gallery-info">
            <h3>Outdoor View</h3>
            <p>Beautiful natural surroundings.</p>
        </div>
    </div>
</div>

<!-- LIGHTBOX -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <img id="lightbox-img" src="" />
</div>

<script>
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.add('active');
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
    }
</script>

</body>
</html>
<?php
