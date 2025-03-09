<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" href="" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (Ensure Correct Version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
</head>
<body>
    <div class="wraper">

           <!-- nav-bar -->
         <div class="nav-bar other" id="nav-bar">
            <div class="container"> 
            <div class="logo">
                <a href="{{route('index')}}"><h1 class="logo-name">THELAWWHEEL</h1></a>
            </div>
    
            <!-- Large & Medium Screen Menu -->
             <div class="menu">
            <ul class="nav-links">
                <li class="dropdown">
                    <a href="#" class="dropbtn">WE</a>
                    <div class="dropdown-content">
                        <a href="{{route('about')}}">About Us</a>
                        <a href="{{route('team')}}">Our Team</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">SERVICE</a>
                    <div class="dropdown-content">
                        <a href="#">Criminal Law</a>
                        <a href="#">Civil Law</a>
                        <a href="#">Family Law</a>
                        <a href="#">Company Law</a>
                        <a href="#">It Law</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="" class="dropbtn">RESOURCES</a>
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
                    <li><a href="" class="dropdown-item">Criminal Law</a></li>
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
                    <li><a href="{{route('book')}}" class="dropdown-item">Precedents</a></li>
                    <li><a href="{{route('video')}}" class="dropdown-item">Video</a></li>
                    <li><a href="{{route('book')}}" class="dropdown-item">Case File</a></li>
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
   @yield('content')

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="/script.js"></script> -->
    <script>
        function toggleMenu() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.classList.toggle('active');
}
     </script>
</body>
</html>