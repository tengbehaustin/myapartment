<style>
    :root{
        --bg:#f6f8fb;
        --card:#ffffff;
        --muted:#6b7280;
        --accent:#ff7a59;
        --accent-2:#2b8cff;
        --radius:14px;
        --shadow: 0 8px 30px rgba(13,20,40,0.08);
        font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }

    *{box-sizing:border-box}
    body{margin:0; background:var(--bg); color:#0f172a; padding:20px;}

    /* Banner */
    .banner{
        width:100%; background:#007bff; color:#fff; padding:60px 20px; text-align:center; border-radius:12px; margin-bottom:30px;
    }
    .banner h1{margin:0; font-size:36px; font-weight:700;}
    .banner p{margin:10px 0 0; font-size:18px;}

    /* Apartment Cards */
    .container{max-width:1000px; margin:0 auto 30px;}
    .apartment-card{
        background:var(--card);
        overflow:hidden;
        display:flex;
        gap:16px;
        align-items:flex-start;
        padding:15px;
        position:relative;
        margin-bottom:30px;
    }

    /* Gallery */
    .gallery{
        width:40%;
        min-width:250px;
        background:linear-gradient(180deg,#f8fafc,#fff);
        padding:12px;
        display:flex;
        flex-direction:column;
        gap:10px;
        align-items:center;
    }
    .main-image{
        width:100%;
        overflow:hidden;
    }
    .main-image img{
        display:block;
        width:100%;
        height:220px;
        object-fit:cover;
        transition: opacity 0.6s ease-in-out;
    }
    .thumbs{
        width:100%;
        display:flex;
        gap:6px;
        justify-content:flex-start;
        flex-wrap:wrap;
    }
    .thumbs button{
        border:0;
        padding:0;
        background:transparent;
        border-radius:6px;
        overflow:hidden;
        cursor:pointer;
        width:60px; height:60px;
        box-shadow:0 4px 14px rgba(12,20,40,0.04);
        transition:opacity .2s;
    }
    .thumbs button:hover{opacity:.8;}
    .thumbs img{width:100%; height:100%; object-fit:cover}

    /* Details */
    .details{
        flex:1;
        display:flex;
        flex-direction:column;
        gap:10px;
    }
    .topline{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:10px;
    }
    .title-block h2{margin:0;font-size:18px;text-transform:uppercase;font-weight:700;color:#0b1220;}
    .subtitle{color:var(--muted);font-size:13px;margin-top:4px;}
    .price{text-align:right;}
    .price .amount{font-size:20px;font-weight:700;color:var(--accent);}
    .price .period{display:block;color:var(--muted);font-size:12px;}
    .description{color:#1f2937;font-size:14px;line-height:1.4;}

    /* Amenities */
    .amenities{display:flex; flex-wrap:wrap; gap:10px; margin-top:6px;}
    .amenity{
        background:#f3f6fb;
        padding:10px 8px;
        font-size:12px;
        color:#0f172a;
        display:flex;
        flex-direction:column;
        align-items:center;
        gap:6px;
        justify-content:center;
        min-width:70px;
    }
    .amenity i{font-size:20px; color:var(--accent-2);}

    /* Buttons */
    .btns { display:flex; gap:10px; flex-wrap:wrap; margin-top:10px; }
    .btn-dark { background:#007bff; padding:10px 25px; color:#fff; font-size:14px; border:none;  cursor:pointer; font-weight:700; transition:0.3s ease; }
    .btn-dark:hover { background:#0063d1; }
    .btn-light { background:transparent; padding:10px 25px; font-size:14px; border:2px solid #007bff; color:#007bff;  cursor:pointer; font-weight:700; transition:0.3s ease; }
    .btn-light:hover { background:#007bff; color:#fff; }

    /* Check Availability */
    .check-availability {
        width:180px;
        background:#f3f6fb;
        padding:15px;
        border-radius:12px;
        display:flex;
        flex-direction:column;
        gap:10px;
        align-items:flex-start;
        font-size:13px;
    }
    .check-availability label{font-weight:600;}
    .check-availability input, .check-availability select{
        width:100%;
        padding:6px 8px;
        border:1px solid #ccc;
        font-size:13px;
    }
    .check-availability button{
        width:100%;
        padding:8px;
        border:none;
        background:#007bff;
        color:#fff;
        font-weight:700;
        cursor:pointer;
        transition:0.3s ease;
    }
    .check-availability button:hover{background:#0063d1;}

    /* Responsive */
    @media (max-width:880px){
        .apartment-card{flex-direction:column;}
        .gallery{width:100%;min-width:unset;}
        .details{width:100%;}
        .check-availability{width:100%; margin-top:15px;}
    }
</style>

<!-- Banner -->
<div class="banner" style="
    background-image: url('assets/images/banner4.jpg');
    background-size: cover;
    background-position: center;
    position: relative;
    color: #fff;
    padding: 80px 20px;
    text-align: center;
    overflow: hidden;
">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 12px;"></div>
    <div style="position: relative; z-index: 1;">
        <h1 style="margin:0; font-size:36px; font-weight:700;">Find Your Dream Apartment</h1>
        <p style="margin:10px 0 0; font-size:18px;">Luxury apartments available for every lifestyle</p>
    </div>
</div>

<!-- Apartments -->
<div class="container">

    <!-- Apartment Card Template -->
    <div class="apartment-card">
        <div class="gallery">
            <div class="main-image"><img id="gallery1" src="https://picsum.photos/1200/800?random=101"></div>
            <div class="thumbs">
                <button onclick="swapImage('gallery1',101)"><img src="https://picsum.photos/200/200?random=101"></button>
                <button onclick="swapImage('gallery1',102)"><img src="https://picsum.photos/200/200?random=102"></button>
                <button onclick="swapImage('gallery1',103)"><img src="https://picsum.photos/200/200?random=103"></button>
                <button onclick="swapImage('gallery1',104)"><img src="https://picsum.photos/200/200?random=104"></button>
            </div>
        </div>
        <div class="details">
            <div class="topline">
                <div class="title-block"><h2>DOUBLE BED</h2><div class="subtitle">Luxury Double Bed</div></div>
                <div class="price"><div class="amount">GHC345</div><div class="period">/Daily</div></div>
            </div>
            <div class="description">Comfortable double bed apartment perfect for small families.</div>
            <div class="amenities">
                <div class="amenity"><i class="fa-solid fa-snowflake"></i> AC</div>
                <div class="amenity"><i class="fa-solid fa-wifi"></i> WiFi</div>
                <div class="amenity"><i class="fa-solid fa-utensils"></i> Breakfast</div>
            </div>
            <div class="btns">
                <a href="contacts" class="btn-dark">Contact</a>
                <a href="booking" class="btn-light">Book</a>
            </div>
        </div>

        <!-- Check Availability Form -->
        <div class="check-availability">
            <label>Check IN:</label>
            <input type="date" class="checkin">
            <label>Check Out:</label>
            <input type="date" class="checkout">
            <label>Guests:</label>
            <select class="guests">
                <option>1</option>
                <option selected>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <label>Apartment:</label>
            <select class="apartment">
                <option value="">Select Apartment</option>
                <option>1 Bedroom</option>
                <option>2 Bedroom</option>
                <option>3 Bedroom</option>
            </select>
            <button class="check-btn">Check Availability</button>
            <div class="availability-message" style="margin-top:10px; font-weight:600;"></div>
            <div class="price-box" style="margin-top:5px; font-weight:600;"></div>
        </div>
    </div>
 <!-- Apartment Card Template -->
    <div class="apartment-card">
        <div class="gallery">
            <div class="main-image"><img id="gallery1" src="https://picsum.photos/1200/800?random=101"></div>
            <div class="thumbs">
                <button onclick="swapImage('gallery1',101)"><img src="https://picsum.photos/200/200?random=101"></button>
                <button onclick="swapImage('gallery1',102)"><img src="https://picsum.photos/200/200?random=102"></button>
                <button onclick="swapImage('gallery1',103)"><img src="https://picsum.photos/200/200?random=103"></button>
                <button onclick="swapImage('gallery1',104)"><img src="https://picsum.photos/200/200?random=104"></button>
            </div>
        </div>
        <div class="details">
            <div class="topline">
                <div class="title-block"><h2>DOUBLE BED</h2><div class="subtitle">Luxury Double Bed</div></div>
                <div class="price"><div class="amount">GHC345</div><div class="period">/Daily</div></div>
            </div>
            <div class="description">Comfortable double bed apartment perfect for small families.</div>
            <div class="amenities">
                <div class="amenity"><i class="fa-solid fa-snowflake"></i> AC</div>
                <div class="amenity"><i class="fa-solid fa-wifi"></i> WiFi</div>
                <div class="amenity"><i class="fa-solid fa-utensils"></i> Breakfast</div>
            </div>
            <div class="btns">
                <a href="contacts" class="btn-dark">Contact</a>
                <a href="booking" class="btn-light">Book</a>
            </div>
        </div>

        <!-- Check Availability Form -->
        <div class="check-availability">
            <label>Check IN:</label>
            <input type="date" class="checkin">
            <label>Check Out:</label>
            <input type="date" class="checkout">
            <label>Guests:</label>
            <select class="guests">
                <option>1</option>
                <option selected>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <label>Apartment:</label>
            <select class="apartment">
                <option value="">Select Apartment</option>
                <option>1 Bedroom</option>
                <option>2 Bedroom</option>
                <option>3 Bedroom</option>
            </select>
            <button class="check-btn">Check Availability</button>
            <div class="availability-message" style="margin-top:10px; font-weight:600;"></div>
            <div class="price-box" style="margin-top:5px; font-weight:600;"></div>
        </div>
    </div>
 <!-- Apartment Card Template -->
    <div class="apartment-card">
        <div class="gallery">
            <div class="main-image"><img id="gallery1" src="https://picsum.photos/1200/800?random=101"></div>
            <div class="thumbs">
                <button onclick="swapImage('gallery1',101)"><img src="https://picsum.photos/200/200?random=101"></button>
                <button onclick="swapImage('gallery1',102)"><img src="https://picsum.photos/200/200?random=102"></button>
                <button onclick="swapImage('gallery1',103)"><img src="https://picsum.photos/200/200?random=103"></button>
                <button onclick="swapImage('gallery1',104)"><img src="https://picsum.photos/200/200?random=104"></button>
            </div>
        </div>
        <div class="details">
            <div class="topline">
                <div class="title-block"><h2>DOUBLE BED</h2><div class="subtitle">Luxury Double Bed</div></div>
                <div class="price"><div class="amount">GHC345</div><div class="period">/Daily</div></div>
            </div>
            <div class="description">Comfortable double bed apartment perfect for small families.</div>
            <div class="amenities">
                <div class="amenity"><i class="fa-solid fa-snowflake"></i> AC</div>
                <div class="amenity"><i class="fa-solid fa-wifi"></i> WiFi</div>
                <div class="amenity"><i class="fa-solid fa-utensils"></i> Breakfast</div>
            </div>
            <div class="btns">
                <a href="contacts" class="btn-dark">Contact</a>
                <a href="booking" class="btn-light">Book</a>
            </div>
        </div>

        <!-- Check Availability Form -->
        <div class="check-availability">
            <label>Check IN:</label>
            <input type="date" class="checkin">
            <label>Check Out:</label>
            <input type="date" class="checkout">
            <label>Guests:</label>
            <select class="guests">
                <option>1</option>
                <option selected>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <label>Apartment:</label>
            <select class="apartment">
                <option value="">Select Apartment</option>
                <option>1 Bedroom</option>
                <option>2 Bedroom</option>
                <option>3 Bedroom</option>
            </select>
            <button class="check-btn">Check Availability</button>
            <div class="availability-message" style="margin-top:10px; font-weight:600;"></div>
            <div class="price-box" style="margin-top:5px; font-weight:600;"></div>
        </div>
    </div>
 <!-- Apartment Card Template -->
    <div class="apartment-card">
        <div class="gallery">
            <div class="main-image"><img id="gallery1" src="https://picsum.photos/1200/800?random=101"></div>
            <div class="thumbs">
                <button onclick="swapImage('gallery1',101)"><img src="https://picsum.photos/200/200?random=101"></button>
                <button onclick="swapImage('gallery1',102)"><img src="https://picsum.photos/200/200?random=102"></button>
                <button onclick="swapImage('gallery1',103)"><img src="https://picsum.photos/200/200?random=103"></button>
                <button onclick="swapImage('gallery1',104)"><img src="https://picsum.photos/200/200?random=104"></button>
            </div>
        </div>
        <div class="details">
            <div class="topline">
                <div class="title-block"><h2>DOUBLE BED</h2><div class="subtitle">Luxury Double Bed</div></div>
                <div class="price"><div class="amount">GHC345</div><div class="period">/Daily</div></div>
            </div>
            <div class="description">Comfortable double bed apartment perfect for small families.</div>
            <div class="amenities">
                <div class="amenity"><i class="fa-solid fa-snowflake"></i> AC</div>
                <div class="amenity"><i class="fa-solid fa-wifi"></i> WiFi</div>
                <div class="amenity"><i class="fa-solid fa-utensils"></i> Breakfast</div>
            </div>
            <div class="btns">
                <a href="contacts" class="btn-dark">Contact</a>
                <a href="booking" class="btn-light">Book</a>
            </div>
        </div>

        <!-- Check Availability Form -->
        <div class="check-availability">
            <label>Check IN:</label>
            <input type="date" class="checkin">
            <label>Check Out:</label>
            <input type="date" class="checkout">
            <label>Guests:</label>
            <select class="guests">
                <option>1</option>
                <option selected>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <label>Apartment:</label>
            <select class="apartment">
                <option value="">Select Apartment</option>
                <option>1 Bedroom</option>
                <option>2 Bedroom</option>
                <option>3 Bedroom</option>
            </select>
            <button class="check-btn">Check Availability</button>
            <div class="availability-message" style="margin-top:10px; font-weight:600;"></div>
            <div class="price-box" style="margin-top:5px; font-weight:600;"></div>
        </div>
    </div>

    <!-- Repeat apartment cards as needed -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const apartmentPrices = { "1 Bedroom": 345, "2 Bedroom": 640, "3 Bedroom": 985 };

        document.querySelectorAll('.check-availability').forEach(section => {
            const checkin = section.querySelector('.checkin');
            const checkout = section.querySelector('.checkout');
            const guests = section.querySelector('.guests');
            const apartment = section.querySelector('.apartment');
            const btn = section.querySelector('.check-btn');
            const message = section.querySelector('.availability-message');
            const priceBox = section.querySelector('.price-box');

            const updatePrice = () => {
                priceBox.textContent = '';
                if(!apartment.value || !checkin.value || !checkout.value) return;
                const start = new Date(checkin.value);
                const end = new Date(checkout.value);
                const days = Math.ceil((end-start)/(1000*60*60*24));
                if(days <= 0){ priceBox.textContent = 'Invalid dates'; return; }
                const price = (apartmentPrices[apartment.value] || 0) * days;
                if(price > 0) priceBox.textContent = `Total Price: GHC${price}`;
            };

            [apartment, checkin, checkout].forEach(el => el.addEventListener('change', updatePrice));

            btn.addEventListener('click', function() {
                const data = { apartment: apartment.value, checkin: checkin.value, checkout: checkout.value, guests: guests.value };
                console.log('Availability check data:', data);
                if(!data.apartment || !data.checkin || !data.checkout || !data.guests){
                    message.style.color='red'; message.textContent='Please fill all fields.'; priceBox.textContent=''; return;
                }
                fetch('<?= base_url("pages/api_check_availability") ?>', {
                    method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify(data)
                })
                    .then(res=>res.json())
                    .then(res=>{
                        console.log('API Response:', res);
                        if(res.available){ message.style.color='green'; message.textContent='Apartment is available! Proceed to booking.'; updatePrice(); }
                        else { message.style.color='red'; message.textContent=res.message||'Not available for selected dates.'; priceBox.textContent=''; }
                    })
                    .catch(err=>{ console.error(err); message.style.color='red'; message.textContent='Error checking availability. Try again.'; priceBox.textContent=''; });
            });
        });
    });

    // Swap images
    function swapImage(targetId, imgId){
        const img = document.getElementById(targetId);
        img.style.opacity=0;
        setTimeout(()=>{ img.src=`https://picsum.photos/1200/800?random=${imgId}`; img.style.opacity=1; }, 300);
    }

    // Auto-slide galleries
    const galleries = [
        {id:'gallery1', images:[101,102,103,104], current:0},
        {id:'gallery2', images:[201,202,203,204], current:0},
        {id:'gallery3', images:[301,302,303,304], current:0}
    ];
    function autoSlide(){
        galleries.forEach(g=>{
            g.current++; if(g.current>=g.images.length) g.current=0;
            const img=document.getElementById(g.id);
            img.style.opacity=0;
            setTimeout(()=>{ img.src=`https://picsum.photos/1200/800?random=${g.images[g.current]}`; img.style.opacity=1; },300);
        });
    }
    setInterval(autoSlide,3000);
</script>
