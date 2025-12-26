@extends('headerfooter')
@section('content')
<style>
     #testimonials .card {
          border-left: 5px solid #0d6efd;
          transition: 0.3s ease;
          background: whitesmoke;
          padding-inline: 5px;
     }

     #testimonials .card:hover {
          transform: scale(1.02);
     }
</style>

<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="container">
          <div class="row">

               <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h3>Let's make your life happier</h3>
                                   <h1>Healthy Living</h1>
                                   <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctors</a>
                              </div>
                         </div>
                    </div>

                    <div class="item item-second">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h3>Aenean luctus lobortis tellus</h3>
                                   <h1>New Lifestyle</h1>
                                   <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                              </div>
                         </div>
                    </div>

                    <div class="item item-third">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h3>Pellentesque nec libero nisi</h3>
                                   <h1>Your Health Benefits</h1>
                                   <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
                              </div>
                         </div>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- ABOUT -->
<section id="about">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                         <h2 class="wow fadeInUp " data-wow-delay="0.6s">Welcome to <span class="  care">Care</span> <span class=" ggroup">Group</span></h2>
                         <div class="wow fadeInUp " data-wow-delay="0.8s">
                              <p class="colourtxt">CARE Group is dedicated to enhancing the delivery of medical services through the integration of advanced technology and patient-centric solutions.</p>
                              <p class="colourtxt"> With a longstanding presence in the healthcare industry, we strive to provide a seamless platform that connects patients with qualified medical professionals across various specialties. Our objective is to simplify appointment scheduling, improve access to healthcare information, and foster efficient communication between patients and healthcare providers. This initiative reflects our commitment to innovation, excellence, and the continuous improvement of healthcare services.</p>
                         </div>
                         <figure class="profile wow fadeInUp" data-wow-delay="1s">
                              <img src="images/author-image.jpg" class="img-responsive" alt="">
                              <figcaption>
                                   <h3>Dr. Neil Jackson</h3>
                                   <p>General Principal</p>
                              </figcaption>
                         </figure>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- TEAM -->
<section id="team" data-stellar-background-ratio="1">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                         <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h2>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div class="col-md-4 col-sm-6">
                    <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                         <img src="images/team-image1.jpg" class="img-responsive" alt="">

                         <div class="team-info">
                              <h3>Nate Baston</h3>
                              <p>General Principal</p>
                              <div class="team-contact-info">
                                   <p><i class="fa fa-phone"></i> 010-020-0120</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">general@company.com</a></p>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-linkedin-square"></a></li>
                                   <li><a href="#" class="fa fa-envelope-o"></a></li>
                              </ul>
                         </div>

                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                         <img src="images/team-image2.jpg" class="img-responsive" alt="">

                         <div class="team-info">
                              <h3>Jason Stewart</h3>
                              <p>Pregnancy</p>
                              <div class="team-contact-info">
                                   <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">pregnancy@company.com</a></p>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square"></a></li>
                                   <li><a href="#" class="fa fa-envelope-o"></a></li>
                                   <li><a href="#" class="fa fa-flickr"></a></li>
                              </ul>
                         </div>

                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                         <img src="images/team-image3.jpg" class="img-responsive" alt="">

                         <div class="team-info">
                              <h3>Miasha Nakahara</h3>
                              <p>Cardiology</p>
                              <div class="team-contact-info">
                                   <p><i class="fa fa-phone"></i> 010-040-0140</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">cardio@company.com</a></p>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-envelope-o"></a></li>
                              </ul>
                         </div>

                    </div>
               </div>

          </div>
     </div>
</section>


<!-- NEWS -->


<!-- COMMON DISEASES -->

<section id="news" data-stellar-background-ratio="2.5">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">

                         <h1 id="cd">Common dieases</h2>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                         <a href="">
                              <img src="images/cancerr.webp" class="img-responsive" alt="">
                         </a>
                         <div class="news-info">
                              <center>
                                   <h2>Cancer</h4>
                              </center>
                              <hr>
                              <h4><a href="https://www.who.int/activities/preventing-cancer">Preventions</a></h4>
                              <h4><a href="https://www.cancer.org/cancer/understanding-cancer/can-cancer-be-cured.html">Cure</a></h4>


                         </div>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                         <a href="/news-details">
                              <img src="images/diabetes.jpg" class="img-responsive" alt="">
                         </a>
                         <div class="news-info">

                              <center>
                                   <h2>Diabetes</h3>
                              </center>
                              <hr>
                              <h4><a href="https://www.who.int/news-room/fact-sheets/detail/diabetes">Preventions</a></h4>
                              <h4><a href="https://www.sciencefocus.com/the-human-body/reverse-type-2-diabetes">Cure</a></h4>

                         </div>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                         <a href="/news-details">
                              <img src="images/hypertension.jpeg" class="img-responsive" alt="">
                         </a>
                         <div class="news-info">
                              <h2>Hypertension</h2>

                              <hr>
                              <h4><a href="https://www.who.int/news-room/fact-sheets/detail/hypertension">Preventions</a></h4>
                              <h4><a href="https://www.healthline.com/health/high-blood-pressure-hypertension#treatment">Cure</a></h4>
                         </div>
                    </div>
               </div>



          </div>
     </div>
</section>


<!-- NEWS -->
<section id="news" data-stellar-background-ratio="2.5">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                         <h2>Latest News</h2>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                         <a href="/news-details">
                              <img src="images/news-image1.jpg" class="img-responsive" alt="">
                         </a>
                         <div class="news-info">
                              <span>March 08, 2018</span>
                              <h3><a href="/news-details">About Amazing Technology</a></h3>
                              <p>Maecenas risus neque, placerat volutpat tempor ut, vehicula et felis.</p>
                              <div class="author">
                                   <img src="images/author-image.jpg" class="img-responsive" alt="">
                                   <div class="author-info">
                                        <h5>Jeremie Carlson</h5>
                                        <p>CEO / Founder</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                         <a href="/news-details">
                              <img src="images/news-image2.jpg" class="img-responsive" alt="">
                         </a>
                         <div class="news-info">
                              <span>February 20, 2018</span>
                              <h3><a href="/news-details">Introducing a new healing process</a></h3>
                              <p>Fusce vel sem finibus, rhoncus massa non, aliquam velit. Nam et est ligula.</p>
                              <div class="author">
                                   <img src="images/author-image.jpg" class="img-responsive" alt="">
                                   <div class="author-info">
                                        <h5>Jason Stewart</h5>
                                        <p>General Director</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="col-md-4 col-sm-6">
                    <!-- NEWS THUMB -->
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                         <a href="/news-details">
                              <img src="images/news-image3.jpg" class="img-responsive" alt="">
                         </a>
                         <div class="news-info">
                              <span>January 27, 2018</span>
                              <h3><a href="/news-details">Review Annual Medical Research</a></h3>
                              <p>Vivamus non nulla semper diam cursus maximus. Pellentesque dignissim.</p>
                              <div class="author">
                                   <img src="images/author-image.jpg" class="img-responsive" alt="">
                                   <div class="author-info">
                                        <h5>Andrio Abero</h5>
                                        <p>Online Advertising</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <img src="images/appointment-image.jpg" class="img-responsive" alt="">
            </div>

            <div class="col-md-6 col-sm-6">
                <!-- APPOINTMENT FORM -->
                <form id="appointment-form" method="POST" action="/appointment">
                    @csrf

                    <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                        <h2>Book an Appointment</h2>
                    </div>

                    <div class="wow fadeInUp" data-wow-delay="0.8s">

                        <div class="col-md-6 col-sm-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="patient_name" required>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="patient_email" required>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label>Select Date</label>
                            <input type="date" class="form-control" name="appointment_date" required>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label>Select City</label>
                            <select class="form-control" id="city" required>
                                <option disabled selected>Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->cityname }}">{{ $city->cityname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Select Branch</label>
                            <select class="form-control" id="branch_id" required>
                                <option disabled selected>Select Branch</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Select Doctor</label>
                            <select class="form-control" name="doctor_id" id="doctor_id" required>
                                <option disabled selected>Select Doctor</option>
                            </select>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" name="phone_number" required>

                            <label>Additional Message</label>
                            <textarea class="form-control" rows="5" name="reason_for_visit"></textarea>

                            <button type="submit" class="form-control" id="cf-submit">
                                Submit
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- JS -->
<script>
let userLat = null;
let userLng = null;

navigator.geolocation.getCurrentPosition(pos => {
    userLat = pos.coords.latitude;
    userLng = pos.coords.longitude;
});

function calcDistance(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a =
        Math.sin(dLat / 2) ** 2 +
        Math.cos(lat1 * Math.PI / 180) *
        Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) ** 2;

    return (R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a))).toFixed(2);
}

// City → Branch
document.getElementById('city').addEventListener('change', function () {
    const city = this.value;
    const branchSelect = document.getElementById('branch_id');
    const doctorSelect = document.getElementById('doctor_id');

    branchSelect.innerHTML = '<option disabled selected>Loading...</option>';
    doctorSelect.innerHTML = '<option disabled selected>Select Doctor</option>';

    fetch('/get-branches-by-city', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ city })
    })
    .then(res => res.json())
    .then(branches => {
        branchSelect.innerHTML = '<option disabled selected>Select Branch</option>';

        branches.forEach(branch => {
            let label = branch.branch_name;

            if (userLat && userLng) {
                const km = calcDistance(
                    userLat,
                    userLng,
                    branch.latitude,
                    branch.longitude
                );
                label += ` — ${km} km`;
            }

            const opt = document.createElement('option');
            opt.value = branch.id;
            opt.textContent = label;
            branchSelect.appendChild(opt);
        });
    });
});

// Branch → Doctor
document.getElementById('branch_id').addEventListener('change', function () {
    const branch_id = this.value;
    const doctorSelect = document.getElementById('doctor_id');

    doctorSelect.innerHTML = '<option disabled selected>Loading...</option>';

    fetch('/get-doctors-by-branch', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ branch_id })
    })
    .then(res => res.json())
    .then(doctors => {
        doctorSelect.innerHTML = '<option disabled selected>Select Doctor</option>';

        if (!doctors.length) {
            doctorSelect.innerHTML = '<option disabled>No doctors available</option>';
            return;
        }

        doctors.forEach(doc => {
            const opt = document.createElement('option');
            opt.value = doc.id;
            opt.textContent = `${doc.name} (${doc.specialization ?? ''})`;
            doctorSelect.appendChild(opt);
        });
    });
});
</script>
<br>
<br>





<!-- GOOGLE MAP -->
<section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>




<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

@endsection