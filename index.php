<style>
    /* ===== GLOBAL ===== */
    body {
        margin: 0;
        font-family: 'Georgia', serif;
        background: #ffffff; /* white background */
        color: #111111; /* dark text */
    }

    /* HERO SECTION */
    .hero-container {
        display: flex;
        width: 100%;
        height: 60vh;
        overflow: hidden;
    }

    .left-section {
        width: 50%;
        padding: 120px 80px;
        background: #f9f9f9; /* very light gray */
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #111111;
    }

    .left-section h5 {
        font-size: 14px;
        letter-spacing: 4px;
        color: :#007bff; /* gold accent */
        text-transform: uppercase;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .left-section h1 {
        font-size: 95px;
        line-height: 0.9;
        margin: 0;
        font-weight: 600;
        color: #111111;
    }

    .btns {
        margin-top: 40px;
        display: flex;
        gap: 25px;
    }

    .btn-dark {
        background: :#007bff; /* gold button */
        padding: 18px 45px;
        color: #ffffff; /* white text */
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s ease;
        font-weight: 600;
    }
    .btn-dark:hover { background: :#007bff; }

    .btn-light {
        background: transparent;
        padding: 18px 45px;
        font-size: 16px;
        border: 2px solid :#007bff;
        color: :#007bff;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s ease;
        font-weight: 600;
    }
    .btn-light:hover { background: :#007bff; color: #ffffff; }

    .right-section {
        width: 50%;
        height: 100%;
        background-image: url('assets/images/banner2.jpg');
        background-size: cover;
        background-position: center;
        filter: brightness(1); /* normal brightness on white theme */
    }

    /* BOOKING BAR */
    .booking-bar {
        width: 85%;
        margin: -60px auto 50px auto;
        background: #ffffff; /* white bar */
        padding: 35px 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        position: relative;
        z-index: 10;
        color: #111111;
    }

    .booking-item h4 {
        margin-bottom: 10px;
        font-size: 14px;
        text-transform: uppercase;
        color: :#007bff; /* gold heading */
        font-weight: 600;
        letter-spacing: 1px;
    }

    .booking-item input,
    .booking-item select {
        width: 100%;
        padding: 12px 0;
        border: none;
        border-bottom: 2px solid #007bff;
        background: transparent;
        outline: none;
        font-size: 15px;
        color: #111111;
    }

    .booking-item input::placeholder {
        color: #999999;
    }

    .check-btn {
        background: #007bff;
        color: #ffffff;
        padding: 18px 45px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        letter-spacing: 1px;
        transition: 0.3s ease;
        font-weight: 600;
    }
    .check-btn:hover { background: #c9a437; }

    /* ABOUT SECTION */
    .container {
        width: 90%;
        margin: 120px auto;
    }

    .featured-property-half {
        display: flex;
        gap: 60px;
        align-items: center;
    }

    .featured-property-half .image {
        flex: 1;
        min-height: 400px;
        border-radius: 20px;
        background-size: cover;
        background-position: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .featured-property-half .text {
        flex: 1;
        color: #111111;
    }

    .featured-property-half h2 {
        font-size: 42px;
        margin-bottom: 20px;
        font-weight: 700;
        color: #007bff; /* gold heading */
    }

    .featured-property-half p {
        font-size: 18px;
        line-height: 1.7;
        color: #555555;
    }

    .btn-featured {
        background: #007bff;
        color: #ffffff;
        font-size: 16px;
        border-radius: 50px;
        transition: 0.3s ease;
        padding: 14px 40px;
        font-weight: 600;
    }
    .btn-featured:hover { background: #007bff; }
</style>


<div class="hero-container">
    <div class="left-section">
        <h5>THE ULTIMATE LUXURY EXPERIENCE</h5>
        <h1>Luxury<br> Apartments</h1>
        <div class="btns">
            <a href="apartments" class="btn-dark">TAKE A TOUR</a>
            <a href="about" class="btn-light">LEARN MORE</a>
        </div>
    </div>
    <div class="right-section"></div>
</div>






<div class="booking-bar">
    <div class="booking-item">
        <h4>Arrival Date</h4>
        <input type="date" id="barCheckin" placeholder="24th March 2020">
    </div>
    <div class="booking-item">
        <h4>Departure Date</h4>
        <input type="date" id="barCheckout" placeholder="30th March 2020">
    </div>
    <div class="booking-item">
        <h4>Guests</h4>
        <select id="barGuests">
            <option value="">Select From Here</option>
            <option>1 Guest</option>
            <option>2 Guests</option>
            <option>3 Guests</option>
        </select>
    </div>
    <div class="booking-item">
        <h4>Apartment Type</h4>
        <select id="barApartment">
            <option value="">Select Apartment</option>
            <option>1 Bedroom</option>
            <option>2 Bedroom</option>
            <option>3 Bedroom</option>
        </select>
    </div>

    <button id="checkAvailabilityBtn" class="check-btn">CHECK AVAILABILITY</button>

    <div id="barMessage" style="margin-top:10px; font-weight:600;"></div>
    <div id="barPrice" style="margin-top:10px; font-weight:700; color:#0077b6;"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const btn = document.getElementById('checkAvailabilityBtn');
        const checkin = document.getElementById('barCheckin');
        const checkout = document.getElementById('barCheckout');
        const guests = document.getElementById('barGuests');
        const apartment = document.getElementById('barApartment');
        const message = document.getElementById('barMessage');
        const priceBox = document.getElementById('barPrice');

        // Apartment prices per night
        const apartmentPrices = {
            "1 Bedroom": 345,
            "2 Bedroom": 658,
            "3 Bedroom": 985,
        };

        // Update price function
        const updatePrice = () => {
            priceBox.textContent = '';
            if(!apartment.value || !checkin.value || !checkout.value) return;

            const start = new Date(checkin.value);
            const end = new Date(checkout.value);
            const days = Math.ceil((end - start)/(1000*60*60*24));

            if(days <= 0){
                priceBox.textContent = 'Invalid dates';
                return;
            }

            const price = (apartmentPrices[apartment.value] || 0) * days;
            if(price > 0){
                priceBox.textContent = `Total Price: GHC${price}`;
            }
        };

        // Update price whenever inputs change
        [apartment, checkin, checkout].forEach(el=>{
            el.addEventListener('change', updatePrice);
        });

        // Check availability button
        btn.addEventListener('click', function(){
            const data = {
                apartment: apartment.value,
                checkin: checkin.value,
                checkout: checkout.value,
                guests: guests.value
            };

            console.log('Availability check data:', data); // <-- Debug

            // Validate fields
            if(!data.apartment || !data.checkin || !data.checkout || !data.guests){
                message.style.color = 'red';
                message.textContent = 'Please fill all fields.';
                priceBox.textContent = '';
                return;
            }

            fetch('<?= base_url("pages/api_check_availability") ?>', {
                method: 'POST',
                headers: {'Content-Type':'application/json'},
                body: JSON.stringify(data)
            })
                .then(res => res.json())
                .then(res => {
                    console.log('API Response:', res); // <-- Debug

                    if(res.available){
                        message.style.color = 'green';
                        message.textContent = 'Apartment is available! Proceed to booking.';
                        updatePrice();
                    } else {
                        message.style.color = 'red';
                        message.textContent = res.message || 'Not available for selected dates.';
                        priceBox.textContent = '';
                    }
                })
                .catch(err=>{
                    console.error(err);
                    message.style.color = 'red';
                    message.textContent = 'Error checking availability. Try again.';
                    priceBox.textContent = '';
                });
        });
    });
</script>






<div class="container">
    <div class="featured-property-half">
        <div class="image" style="margin-left: 10px; background-image: url('assets/images/banner1.jpg');"></div>
        <div class="text">
            <h2>About Us</h2>
            <p>
                From sunlit living spaces to state-of-the-art kitchens, every detail is curated to provide comfort,
                style, and convenience. Whether you are relaxing, working, or entertaining, our apartments are built to
                meet the demands of modern life.
            </p>
            <p>
                Our dedicated team ensures that every resident enjoys a seamless experience, combining luxury living
                with exceptional service.
            </p>
            <a href="about" class="btn-featured">Learn more about us</a>
        </div>
    </div>
</div>
