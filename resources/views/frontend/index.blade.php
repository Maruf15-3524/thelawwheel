<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Law Wheel</title>
    <link rel="icon" href="" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (Ensure Correct Version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{('frontend/style.css')}}">
    <style>
        .bg-appointment {
  background: linear-gradient(rgba(55, 55, 63, 0.7), rgba(55, 55, 63, 0.7)), url('{{ asset('frontend/img/carousel-1.jpg') }}'), no-repeat center center;
  background-size: cover;
}
    </style>
</head>
<body>
    <div class="wraper">
        <!-- top-bar -->
            <div class="top-bar d-none d-sm-block">
                <div class="header-top">
                    <div class="container">
                        <div class="row col-sm-0">
                            <!-- TOP LEFT (Address & Phone) -->
                            <div class="col-12 col-md-8 col-sm-12">
                                <div class="top-address">
                                    <p>							
                                        <span><i class="fas fa-street-view"></i> Room No:505 (4th Floor),Center Law Collage 6,Bijoynagar,Dhaka-1000</span>
                                        <span class="phone"><i class="fas fa-phone"></i> +8801739070990</span>
                                    </p>
                                </div>
                            </div>
                            <!-- TOP RIGHT (Social Media Icons) -->
                            <div class="col-12 col-md-4  col-sm-0">
                                <div class="top-right-menu">
                                    <ul class="social-icons">
                                        <a class="facebook social-icon" href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a class="twitter social-icon" href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        <a class="instagram social-icon" href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                        <a class="linkedin social-icon" href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>								
                                    </ul> 
                                </div>						
                            </div>	
                        </div>	
                    </div>
                </div>
            </div>

        <!-- nav-bar -->
            <div class="nav-bar" id="nav-bar">
                <div class="container"> 
                <div class="logo">
                    <a href="{{route('index')}}"><h1 class="logo-name">THELAWWHEEL</h1></a>
                </div>
        
                <!-- Large & Medium Screen Menu -->
                <div class="menu">
                <ul class="nav-links">
                    <li class="dropdown">
                        <a href="" class="dropbtn">WE</a>
                        <div class="dropdown-content">
                            <a href="{{route('about')}}">About Us</a>
                            <a href="{{route('team')}}">Our Team</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">SERVICE</a>
                        <div class="dropdown-content">
                            <a href="html.html">Criminal Law</a>
                            <a href="#">Civil Law</a>
                            <a href="#">Family Law</a>
                            <a href="#">Company Law</a>
                            <a href="#">It Law</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">RESOURCES</a>
                        <div class="dropdown-content">
                        <a href="{{route('book')}}">Book</a>
                        <a href="{{route('research')}}">Research</a>
                        <a href="{{route('book')}}">Precedents</a>
                        <a href="{{route('video')}}">Video</a>
                        <a href="{{route('book')}}">Case File</a>
                    </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">MEDIA</a>
                        <div class="dropdown-content">
                            <a href="{{route('book')}}">Print Media</a>
                            <a href="{{route('book')}}">electronic</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">PHOTO</a>
                    </li>
                    <li><div class="login-button">
                        <a href="#">APPOINTMENT</a>
                    </div></li>
                </ul>
            </div>
                <!-- Hamburger Button for Small Screens -->
                <div class="hamburger" onclick="toggleMenu()">
                    &#9776;
                </div>
            </div>
            </div>
            <div class="mobile-menu">
                <button class="close-btn" onclick="toggleMenu()">✖</button>
                <div class="mobile-item">
                    <li>
                        WE
                        <ul>
                            <li><a href="{{route('about')}}" class="dropdown-item">About Us</a></li>
                            <li><a href="{{route('team')}}" class="dropdown-item">Our Team</a></li>
                        </ul>
                    </li>
                </div>
                <div class="mobile-item">
                    <li>
                        SERVICE
                        <ul>
                            <li><a href="html.html" class="dropdown-item">Criminal Law</a></li>
                            <li><a href="" class="dropdown-item">Civil Law</a></li>
                            <li><a href="" class="dropdown-item">Family Law</a></li>
                            <li><a href="" class="dropdown-item">Company Law</a></li>
                            <li><a href="" class="dropdown-item">It Law</a></li>
                            
                        </ul>
                    </li>
                </div>
                <div class="mobile-item">
                    <li>
                        RESOURCES
                        <ul>
                            <li><a href="{{route('book')}}" class="dropdown-item">Book</a></li>
                            <li><a href="{{route('research')}}" class="dropdown-item">Research</a></li>
                            <li><a href="{{route('research')}}" class="dropdown-item">Precedents</a></li>
                            <li><a href="{{route('video')}}" class="dropdown-item">Video</a></li>
                            <li><a href="{{route('video')}}" class="dropdown-item">Case File</a></li>
                        </ul>
                    </li>
                </div>
                <div class="mobile-item">
                    <li>
                        MEDIA
                        <ul>
                            <li><a href="{{route('book')}}" class="dropdown-item">Print Media</a></li>
                            <li><a href="{{route('book')}}" class="dropdown-item">electronic</a></li>
                        </ul>
                    </li>
                </div>
                <div class="mobile-item">
                    <li>
                    <a href="">PHOTO</a>
                    </li>
                </div>
            </div>
            <!-- *------feature----* -->
            <div class="feature-top">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-sm-6">
                            <div class="feature-item">
                                <i class="far fa-check-circle"></i>
                                <h3>Legal</h3>
                                <p>Govt Approved</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="feature-item">
                                <i class="fa fa-user-tie"></i>
                                <h3>Attorneys</h3>
                                <p>Expert Attorneys</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="feature-item">
                                <i class="far fa-thumbs-up"></i>
                                <h3>Success</h3>
                                <p>up to 80% Case Won</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="feature-item">
                                <i class="far fa-handshake"></i>
                                <h3>Support</h3>
                                <p>Quick Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *------feature end----* -->
            <!-- about section -->
            <div class="about">
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="about-img">

                                <img src="{{asset('frontend/img/about.jpg')}}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 about-info">
                            <div class="section-header">
                                <h2>LEARN ABOUT THE LAW WHEEL</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Law Wheel is a leading law firm based in Dhaka, Bangladesh. We are known for criminal and constitutional litigations. Our specialty includes civil, company, trust, society, administrative, immigration and family matters. Our team is comprised of dynamic lawyers with sound understanding of law. We render the best services to our clients.
                                </p>
                                
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>
                   
                </div>
               <!-- about section end--> 
            <!-- service section -->
            <div class="service">
                <div class="container">
                    <div class="section-header">
                        <h2>Our Practices Areas</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-landmark"></i>
                                </div>
                                <h3>Civil Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <h3>Family Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 ">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-hand-holding-usd"></i>
                                </div>
                                <h3>Business Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <h3>Education Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <h3>Criminal Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <h3>Cyber Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <h3>Cyber Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <h3>Cyber Law</h3>
                                <p>⦁	Technology Litigation<br>
                                    ⦁	Tech Dispute Resolution
                                    </p>
                                <a class="btn" href="">Learn More<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services End -->

            <!-- Team Start -->
            <div class="container-fluid py-5" style="background-color: #f4f7fc;">
                <div class="container py-5">
                    <div class="text-center pb-2">
                        <h6 class="text-uppercase">Our Attorneys</h6>
                        <h1 class="mb-4">Meet Our Attorneys</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-primary rounded" style="height: 200px;"></div>
                            <div class="owl-carousel team-carousel position-relative" style="margin-top: -97px; padding: 0 30px;">
                                <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                                    <h5 class="mb-2 px-4">Attorney Name</h5>
                                    <p class="mb-3 px-4">Practice Area</p>
                                    <div class="team-img position-relative">
                                        <img class="img-fluid" src="{{asset('frontend/img/team-1.jpg')}}" alt="">
                                        <div class="team-social">
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                                    <h5 class="mb-2 px-4">Attorney Name</h5>
                                    <p class="mb-3 px-4">Practice Area</p>
                                    <div class="team-img position-relative">
                                        <img class="img-fluid" src="{{asset('frontend/img/team-2.jpg')}}" alt="">
                                        <div class="team-social">
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                                    <h5 class="mb-2 px-4">Attorney Name</h5>
                                    <p class="mb-3 px-4">Practice Area</p>
                                    <div class="team-img position-relative">
                                        <img class="img-fluid" src="{{asset('frontend/img/team-3.jpg')}}" alt="">
                                        <div class="team-social">
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                                    <h5 class="mb-2 px-4">Attorney Name</h5>
                                    <p class="mb-3 px-4">Practice Area</p>
                                    <div class="team-img position-relative">
                                        <img class="img-fluid" src="{{asset('frontend/img/team-4.jpg')}}" alt="">
                                        <div class="team-social">
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item text-center bg-white rounded overflow-hidden pt-4">
                                    <h5 class="mb-2 px-4">Attorney Name</h5>
                                    <p class="mb-3 px-4">Practice Area</p>
                                    <div class="team-img position-relative">
                                        <img class="img-fluid" src="img/team-4.jpg" alt="">
                                        <div class="team-social">
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team End -->

            <!-- feature section -->
            <div class="container-fluid py-5" style="background-color: #e2e2e2;">
                <div class="container py-5">
                <div class="feature-section">
                    <div class="feature-image col-sm-12 col-md-12">
                        <img src="{{asset('frontend/img/feature.jpg')}}" alt="Law Image">
                    </div>
                    <div class="feature-content">
                        <h6 class="text-uppercase text-muted">Our Features</h6>
                        <h2 class="fw-bold">Why Choose Us</h2>
                        <div class="Choose-item">
                            <div class="feature-icon">01</div>
                            <div>
                                <div class="feature-title">Best Law Practices</div>
                                <div class="feature-text">Ipsum duo tempor elitr reburn stet magna amet kasd.</div>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">02</div>
                            <div>
                                <div class="feature-title">Efficiency & Trust</div>
                                <div class="feature-text">Ipsum duo tempor elitr reburn stet magna amet kasd.</div>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">03</div>
                            <div>
                                <div class="feature-title">Results You Deserve</div>
                                <div class="feature-text">Ipsum duo tempor elitr reburn stet magna amet kasd.</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- feature end -->
            <!-- media section -->
            <div class="container-fluid py-5" style="background-color: #e2e2e2;">
                    <div class="carousel-container">
                        <div class="owl-carousel">
                            <div>
                                <a href="article1.html" class="media-card">
                                    <img src="{{('frontend/mini_magick20250111-327-8i3k2g.jpg')}}" alt="media Image">
                                    <div class="content">
                                        <h5>উন্ও নিও জাতের প্রেমের বিবাহঃ ১৪ বছরের সাজা</h5>
                                        <p>11 November 2021</p>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="article1.html" class="media-card">
                                    <img src="{{asset('frontend/mini_magick20250111-327-8i3k2g.jpg')}}" alt="media Image">
                                    <div class="content">
                                        <h5>উন্ন ও নিও জাতের প্রেমের বিবাহঃ ১৪ বছরের সাজা</h5>
                                        <p>11 November 2021</p>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="article1.html" class="media-card">
                                    <img src="{{asset('frontend/mini_magick20250111-327-8i3k2g.jpg')}}" alt="media Image">
                                    <div class="content">
                                        <h5>উন্ন ও নিও জাতের প্রেমের বিবাহঃ ১৪ বছরের সাজা</h5>
                                        <p>11 November 2021</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                
                        <!-- Custom Navigation Buttons -->
                        <div class="custom-nav">
                            <button class="prev-btn"><i class="fa fa-chevron-left"></i></button>
                            <button class="next-btn"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
            
            </div>
            <!-- media section end -->
            <!-- appointment  -->
            <div class="container-fluid py-5" style="background-color: #f4f7fc;">
                <div class="container py-5">
                    
                    <div class="bg-appointment rounded">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-lg-6 py-5">
                                <div class="rounded p-5 my-5" style="background: rgba(55, 55, 63, .7);">
                                    <h1 class="text-center text-white mb-4">Get An Appointment</h1>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="date" id="date" data-target-input="nearest">
                                                        <input type="text" class="form-control border-0 p-4 datetimepicker-input" placeholder="Select Date" data-target="#date" data-toggle="datetimepicker"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="time" id="time" data-target-input="nearest">
                                                        <input type="text" class="form-control border-0 p-4 datetimepicker-input" placeholder="Select Time" data-target="#time" data-toggle="datetimepicker"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select border-0 px-4" style="height: 47px;">
                                                <option selected>Select A Service</option>
                                                <option value="1">Service 1</option>
                                                <option value="2">Service 1</option>
                                                <option value="3">Service 1</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Get An Appointment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- appointment -->

            <footer class="footer position-relative">
                <div class="container">
                    <!-- Overlapping Boxes with 40px Gap -->
                    <div class="footer-box location"> <strong>📍Location</strong><br>
                        Room No:505 (4th Floor),<br>
                        Center Law College 6,<br>
                        Bijoynagar, Dhaka-1000</div>
                    <div class="footer-box email"> <strong>✉️ Email</strong><br>info@example.com</div>
                    <div class="footer-box contact"> <strong>📞 Contact</strong><br>01710-699500 <br>01814-339889</div>

                    <!-- Footer Bottom -->
                    <div class="footer-bottom">
                        <p>&copy; 2025 Your Company. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        <a href="https://wa.me/8801739070990" target="_blank" class="whatsapp-button">
            <i class="fab fa-whatsapp"></i>
        </a>
        
        <a href="#" class="back-to-top"><i class="fa-solid fa-chevron-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{asset('frontend/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>