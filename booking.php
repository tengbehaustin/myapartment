<div class="booking-page">

    <!-- BOOKING PAGE WRAPPER -->
    <div class="booking-banner">
        <div class="overlay"></div>
        <div class="content">
            <h1>Book Your Stay</h1>
            <p>Choose your dates and reserve your preferred apartment</p>
        </div>
    </div>

    <div class="booking-section">
        <div class="container">
            <div class="row">

                <!-- FORM SECTION -->
                <div class="col-lg-7 col-md-12 mb-5">
                    <h2 class="section-title">Reservation Form</h2>
                    <form id="bookingForm">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Your Name" required />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required />
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required />
                        </div>

                        <div class="form-group">
                            <label>Apartment Type</label>
                            <select name="apartment" class="form-control" required>
                                <option value="">Select Apartment</option>
                                <option>1 Bedroom</option>
                                <option>2 Bedroom</option>
                                <option>3 Bedroom</option>
                            </select>
                        </div>

                        <div class="date-row">
                            <div class="form-group w-50">
                                <label>Check-in Date</label>
                                <input type="date" name="checkin" class="form-control" required />
                            </div>
                            <div class="form-group w-50">
                                <label>Check-out Date</label>
                                <input type="date" name="checkout" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Number of Guests</label>
                            <select name="guests" class="form-control" required>
                                <option value="">Select Guests</option>
                                <option>1 Guest</option>
                                <option>2 Guests</option>
                                <option>3 Guests</option>
                                <option>4+ Guests</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Special Requests</label>
                            <textarea name="requests" rows="5" class="form-control" placeholder="Any additional notes..."></textarea>
                        </div>

                        <button type="submit" class="btn-primary-submit">Confirm Booking</button>

                        <div class="bookingSuccess" style="display:none; color:green; margin-top:15px; font-weight:600;"></div>
                        <div class="bookingError" style="display:none; color:red; margin-top:15px; font-weight:600;"></div>
                    </form>
                </div>

                <!-- SUMMARY SECTION -->
                <div class="col-lg-4 ml-auto summary-box">
                    <h2 class="section-title">Booking Summary</h2>
                    <div class="summary-item">
                        <span>Apartment:</span>
                        <strong class="summaryApartment">Not selected</strong>
                    </div>
                    <div class="summary-item">
                        <span>Check-in:</span>
                        <strong class="summaryCheckin">—</strong>
                    </div>
                    <div class="summary-item">
                        <span>Check-out:</span>
                        <strong class="summaryCheckout">—</strong>
                    </div>
                    <div class="summary-item">
                        <span>Guests:</span>
                        <strong class="summaryGuests">—</strong>
                    </div>
                    <div class="price-box">
                        <div>Total Price</div>
                        <h3 class="summaryPrice">—</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>



<style>
    .booking-page .booking-banner {
        background: url('assets/images/banner2.jpg') center/cover no-repeat;
        padding: 120px 20px;
        border-radius: 12px;
        color: #fff;
        text-align: center;
        position: relative;
        margin-bottom: 40px;
    }
    .booking-page .booking-banner .overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.45); border-radius: 12px; }
    .booking-page .booking-banner .content { position: relative; z-index: 2; }
    .booking-page .booking-banner h1 { font-size: 44px; font-weight: 700; margin-bottom: 10px; }
    .booking-page .booking-banner p { font-size: 18px; opacity: 0.9; }

    .booking-page .booking-section { background: #f9f9f9; padding: 70px 0; }
    .booking-page .section-title { font-size: 28px; font-weight: 700; margin-bottom: 25px; }
    .booking-page .form-control { width: 100%; padding: 12px; border-radius: 6px; border: 1px solid #ccc; font-size: 15px; }
    .booking-page .form-control:focus { border-color: #0077b6; box-shadow: 0 0 6px rgba(0,119,182,0.4); outline: none; }
    .booking-page .date-row { display: flex; gap: 15px; }
    .booking-page .btn-primary-submit { background: #0077b6; color: #fff; border: none; padding: 14px 35px; border-radius: 6px; font-weight: 600; cursor: pointer; transition: .3s; }
    .booking-page .btn-primary-submit:hover { background: #005f91; }

    .booking-page .summary-item { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
    .booking-page .summary-item span { color: #555; }
    .booking-page .price-box { text-align: center; margin-top: 20px; }
    .booking-page .price-box h3 { font-size: 28px; color: #0077b6; }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const page = document.querySelector('.booking-page');
        if(!page) return; // exit if not on booking page

        const form = page.querySelector('#bookingForm');
        const btn = form.querySelector('button[type="submit"]');

        const apartment = form.querySelector('select[name="apartment"]');
        const checkin = form.querySelector('input[name="checkin"]');
        const checkout = form.querySelector('input[name="checkout"]');
        const guests = form.querySelector('select[name="guests"]');

        const summaryApartment = page.querySelector('.summaryApartment');
        const summaryCheckin = page.querySelector('.summaryCheckin');
        const summaryCheckout = page.querySelector('.summaryCheckout');
        const summaryGuests = page.querySelector('.summaryGuests');
        const summaryPrice = page.querySelector('.summaryPrice');

        const bookingSuccess = page.querySelector('.bookingSuccess');
        const bookingError = page.querySelector('.bookingError');

        const apartmentPrices = {
            "1 Bedroom": 345,
            "2 Bedroom": 640,
            "3 Bedroom": 985
        };

        const updateSummary = () => {
            summaryApartment.textContent = apartment.value || 'Not selected';
            summaryCheckin.textContent = checkin.value || '—';
            summaryCheckout.textContent = checkout.value || '—';
            summaryGuests.textContent = guests.value || '—';

            let price = 0;
            if(apartment.value && checkin.value && checkout.value){
                const days = Math.ceil((new Date(checkout.value) - new Date(checkin.value)) / (1000*60*60*24));
                if(days > 0){
                    price = (apartmentPrices[apartment.value] || 0) * days;
                }
            }
            summaryPrice.textContent = price > 0 ? `GHC${price}` : '—';
        };

        apartment.addEventListener('change', updateSummary);
        checkin.addEventListener('change', updateSummary);
        checkout.addEventListener('change', updateSummary);
        guests.addEventListener('change', updateSummary);

        updateSummary();

        form.addEventListener('submit', function(e){
            e.preventDefault();
            const formData = new FormData(this);
            btn.disabled = true;
            btn.textContent = 'Sending...';

            fetch('<?= base_url("booking-submit") ?>', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.textContent = 'Confirm Booking';
                    if(data.status === 'success'){
                        bookingSuccess.style.display = 'block';
                        bookingSuccess.textContent = data.message;
                        bookingError.style.display = 'none';
                        form.reset();
                        updateSummary();
                        setTimeout(()=>bookingSuccess.style.display='none',5000);
                    } else {
                        bookingError.style.display = 'block';
                        bookingError.textContent = data.message || 'Please check your input.';
                        bookingSuccess.style.display = 'none';
                    }
                })
                .catch(err=>{
                    btn.disabled = false;
                    btn.textContent = 'Confirm Booking';
                    bookingError.style.display = 'block';
                    bookingError.textContent = 'Something went wrong. Please try again.';
                    bookingSuccess.style.display = 'none';
                    console.error(err);
                });
        });
    });
</script>
