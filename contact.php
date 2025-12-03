<!-- Contact Banner -->
<div class="contact-banner">
    <div class="overlay"></div>
    <div class="content">
        <h1>Contact Us</h1>
    </div>
</div>

<!-- Contact Section -->
<div class="site-section">
    <div class="container">
        <div class="row">

            <!-- Contact Form -->
            <div class="col-md-12 col-lg-7 mb-5">
                <h2 class="section-title">Get In Touch</h2>

                <form id="contactForm" action="<?= base_url('contact/submit') ?>" method="POST">

                    <div class="form-group mb-3">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="contact_name" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="contact_email" class="form-control" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="6" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn-primary-submit">Send Message</button>

                    <!-- SUCCESS -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div style="color:green; margin-top:15px; font-weight:600;">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- ERROR -->
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div style="color:red; margin-top:15px; font-weight:600;">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                </form>

                <!-- Messages for Ajax -->
                <div id="contactSuccess" style="display:none; color:green; margin-top:15px; font-weight:600;"></div>
                <div id="contactError" style="display:none; color:red; margin-top:15px; font-weight:600;"></div>

            </div>

            <!-- Contact Info + Map -->
            <div class="col-md-12 col-lg-4 ml-auto">
                <div class="contact-info">
                    <h2 class="section-title">Contact Details</h2>

                    <p class="label">Address</p>
                    <p>ggggggggggg</p>

                    <p class="label">Phone</p>
                    <p><a href="tel:+233557913097">000000000</a></p>

                    <p class="label">Email</p>
                    <p><a href="mailto:youremail@domain.com">youremail@domain.com</a></p>
                </div>

                <h2 class="section-title">Find Us Here</h2>
                <div class="map-container">
                    <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18..."
                            width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- CSS Styles -->
<style>
    /* Banner */
    .contact-banner {
        background: url('assets/images/banner5.jpg') center/cover no-repeat;
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
    .contact-banner .content { position: relative; z-index: 2; }
    .contact-banner h1 { font-size: 48px; font-weight: 700; margin: 0; }

    /* Section */
    .site-section { background: #f9f9f9; padding: 80px 0; }
    .section-title { font-size: 28px; font-weight: 700; margin-bottom: 25px; }

    /* Form */
    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
    .form-control:focus {
        border-color: #0077b6;
        box-shadow: 0 0 6px rgba(0,119,182,0.4);
        outline: none;
    }
    .btn-primary-submit {
        background: #0077b6;
        color: #fff;
        border: none;
        padding: 14px 35px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-primary-submit:hover { background: #005f91; }

    .contact-info .label { font-weight: 700; margin-bottom: 3px; color: #333; }
    .map-container { width: 100%; height: 300px; border-radius: 12px; overflow: hidden; margin-top: 20px; }
</style>

<!-- AJAX Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        const btn = form.querySelector('button[type="submit"]');
        const successDiv = document.getElementById('contactSuccess');
        const errorDiv = document.getElementById('contactError');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            btn.disabled = true;
            btn.textContent = 'Sending...';

            fetch('<?= base_url('contact/submit') ?>', {
                method: 'POST',
                body: formData
            })
                .then(res => res.text()) // receive HTML or debugger output
                .then(response => {
                    btn.disabled = false;
                    btn.textContent = 'Send Message';

                    // If response contains "Message sent successfully!", show success
                    if (response.includes('Message sent successfully!')) {
                        successDiv.style.display = 'block';
                        successDiv.innerHTML = 'Message sent successfully!';
                        errorDiv.style.display = 'none';
                        form.reset();
                        setTimeout(() => successDiv.style.display = 'none', 4000);
                    } else {
                        // Show any error (from validation or SMTP)
                        errorDiv.style.display = 'block';
                        errorDiv.innerHTML = response;
                        successDiv.style.display = 'none';
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.textContent = 'Send Message';
                    errorDiv.style.display = 'block';
                    errorDiv.textContent = 'Something went wrong. Please try again.';
                    successDiv.style.display = 'none';
                    console.error(err);
                });
        });
    });
</script>

