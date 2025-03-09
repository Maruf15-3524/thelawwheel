<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        (function() {
            window.history.forward();
        })();

        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" href="" type="image/x-icon">
    <!-- Include jQuery CDN before your script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.js"></script>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <style>
        /* Global Styles */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .content {
            margin: 0;
            padding: 0;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 210px;
            height: 100vh;
            background: #6f42c1;
            color: white;
            position: fixed;
            z-index: 10;
            padding-top: 20px;
            transition: width 0.3s;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .sidebar .active {
            background: #4e2b92;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed a span {
            display: none;
        }

        /* Sidebar Logo */
        .sidebar .logo {
            display: block;
            text-align: center;
            transition: all 0.3s;
        }

        .sidebar .logo img {
            width: 40px;
            margin-bottom: 20px;
        }

        /* Main Content */
        .content {
            margin-left: 210px;
            flex-grow: 1;
            margin-top: 50px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        .sidebar.collapsed~.content {
            margin-left: 70px;
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 10px;
            right: -15px;
            background-color: #fff;
            color: #6f42c1;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 100;
        }

        /* Navbar */
        .navbar {
            background-color: #4e2b92;
            width: 100%;
            position: fixed;
            z-index: 10;
        }

        .navbar .navbar-brand {
            color: white;
            margin-left: 20px;
        }

        .navbar .navbar-toggler {
            border-color: white;
        }

        .navbar .navbar-nav .nav-link {
            color: white;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #e8e8e8;
        }

        /* Footer */
        .footer {
            background-color: #495057;
            color: white;
            text-align: center;
            height: 40px;
            width: 100%;
            bottom: 0;
            position: relative;
        }

        .upload-area {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            width: 100%;
            /* Allow the upload box to take up full available width */
        }

        .upload-area:hover {
            background-color: #f8f9fa;
        }



        .uploaded-img {
            flex: 1;
            /* Make this section flexible, adjusting its size depending on the image */
            margin-right: 20px;
            /* Add spacing between the image and the upload box */
        }

        .upload-area {
            flex: 1;
            /* Ensure upload area takes the rest of the space */
        }

        .uploaded-img img {
            max-width: 100%;
            max-height: 150px;
            /* Set a max height for the image preview */
            object-fit: cover;
        }

        /* Mobile Sidebar */
        .hamburger {
            display: none;
            font-size: 30px;
            cursor: pointer;
            color: white;
        }

        .upload-area {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
        }

        .upload-area:hover {
            background-color: #f8f9fa;
        }

        .img-item img {
            height: 206px;
        }

        .upload-img {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            min-height: 208px;
        }

        @media (max-width: 780px) {
            .hamburger {
                display: block;
            }

            .mobile-menu {
                width: 80%;
            }
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 70%;
            height: 100vh;
            background-color: #6f42c1;
            transition: left 0.3s ease-in-out;
            z-index: 1000;
            overflow-y: auto;
        }

        .mobile-menu .logo img {
            width: 100px;
            padding: 20px;
        }

        .mobile-menu ul {
            list-style: none;
            padding: 10px;
        }

        .mobile-menu ul li {
            margin: 10px 0;
            padding-left: 10px;
        }

        .mobile-menu ul li a {
            color: white;
            font-size: 15px;
            text-decoration: none;
            display: block;
        }


        /* Close Button */
        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            color: white;
            font-size: 25px;
            cursor: pointer;
        }

        /* Show Mobile Menu */
        .mobile-menu.active {
            left: 0;
        }

        .footer {
            position: relative;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 60px;
            /* Increased size for better visibility */
            height: 60px;
            /* Increased size for better visibility */
            animation: spin 1s linear infinite, fadeOut 0.5s ease-in-out forwards;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            /* Initially hidden */
            z-index: 9999;
            opacity: 1;
            /* Full opacity for when shown */
            transition: opacity 0.5s ease-in-out;
            /* Smooth fade-out transition */
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* Extra shimmer effect */
        @keyframes shimmer {
            0% {
                background-color: #3498db;
            }

            50% {
                background-color: #9b59b6;
            }

            100% {
                background-color: #3498db;
            }
        }



        /* Responsive Styles */
        @media (max-width: 767px) {
            .toggle-btn {
                position: fixed;
                top: 10px;
                right: 10px;
                z-index: 110;
            }

            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
                padding-bottom: 80px;
            }

            .navbar .navbar-nav {
                text-align: center;
            }

            .navbar .navbar-nav .nav-link {
                padding: 8px 15px;
            }

            .sidebar a {
                padding: 8px 15px;
            }

            .footer {
                position: relative;
            }
        }

        @media (min-width: 1025px) {
            .sidebar {
                width: 210px;
            }

            .content {
                margin-left: 210px;
            }

            .toggle-btn {
                position: absolute;
                top: 10px;
                right: -15px;
            }

            .navbar .navbar-nav .nav-link {
                padding: 10px 20px;
            }

            .footer {
                position: relative;
            }
        }
    </style>
</head>

<body>
    <div class="loader" id="loader"></div>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse col-md-none" id="">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user-circle"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-decoration-none">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>


                </ul>
            </div>
            <div class="hamburger" onclick="toggleMenu()">
                &#9776;
            </div>
        </div>
    </nav>
    <div class="mobile-menu">
        <button class="close-btn" onclick="toggleMenu()">✖</button>
        <div class="logo"><img src="/newlogo.png" alt="logo"></div>
        <div class="mobile-item">
            <li>
                WE
                <ul>
                    <li><a href="aboutus.html" class="dropdown-item">About Us</a></li>
                    <li><a href="team.html" class="dropdown-item">Our Team</a></li>
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
                    <li><a href="story.html" class="dropdown-item">Book</a></li>
                    <li><a href="story.html" class="dropdown-item">Research</a></li>
                    <li><a href="story.html" class="dropdown-item">Precedents</a></li>
                    <li><a href="story.html" class="dropdown-item">Video</a></li>
                    <li><a href="story.html" class="dropdown-item">Case File</a></li>
                </ul>
            </li>
        </div>
        <div class="mobile-item">
            <li>
                MEDIA
                <ul>
                    <li><a href="story.html" class="dropdown-item">Print Media</a></li>
                    <li><a href="story.html" class="dropdown-item">electronic</a></li>
                </ul>
            </li>
        </div>
        <div class="mobile-menu">
            <button class="close-btn" onclick="toggleMenu()">✖</button>
            <ul>
                <li>
                    WE
                    <ul>
                        <li><a href="aboutus.html" class="dropdown-item">About Us</a></li>
                        <li><a href="team.html" class="dropdown-item">Our Team</a></li>
                    </ul>
                </li>
                <li>
                    SERVICE
                    <ul>
                        <li><a href="#" class="dropdown-item">Criminal Law</a></li>
                        <li><a href="#" class="dropdown-item">Civil Law</a></li>
                        <li><a href="#" class="dropdown-item">Family Law</a></li>
                        <li><a href="#" class="dropdown-item">Company Law</a></li>
                        <li><a href="#" class="dropdown-item">IT Law</a></li>
                    </ul>
                </li>
                <li>
                    RESOURCES
                    <ul>
                        <li><a href="story.html" class="dropdown-item">Book</a></li>
                        <li><a href="story.html" class="dropdown-item">Research</a></li>
                        <li><a href="story.html" class="dropdown-item">Precedents</a></li>
                        <li><a href="story.html" class="dropdown-item">Video</a></li>
                        <li><a href="story.html" class="dropdown-item">Case File</a></li>
                    </ul>
                </li>
                <li>
                    MEDIA
                    <ul>
                        <li><a href="story.html" class="dropdown-item">Print Media</a></li>
                        <li><a href="story.html" class="dropdown-item">Electronic</a></li>
                    </ul>
                </li>
                <li><a href="#">PHOTO</a></li>
            </ul>
        </div>

    </div>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- Toggle Button -->
        <button class="toggle-btn" onclick="toggleSidebar()">&#x276E;</button>

        <!-- Logo -->
        <div class="logo">
            <img src="https://via.placeholder.com/40" alt="Logo"> <!-- Replace with your logo -->
        </div>

        <!-- Sidebar Links -->
        <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('users.index') }}" class="{{ Route::is('users.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> <span>Users</span>
        </a>
        <a href="{{ route('teammembers.index') }}" class="{{ Route::is('teammembers.*') ? 'active' : '' }}" onclick="showLoader()"><i class="fas fa-ticket-alt"></i> <span>Team Member</span></a>

        <a href="{{ route('resources.index') }}" class="{{ Route::is('resources.*') ? 'active' : '' }}"><i class="fas fa-ticket-alt"></i> <span>Resource</span></a>

        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Admin Dashboard. All Rights Reserved.</p>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleMenu() {
            const mobileMenu = document.querySelector('.mobile-menu');
            if (mobileMenu.classList.contains('active')) {
                mobileMenu.style.left = '-100%'; // Hide menu
                mobileMenu.classList.remove('active');
            } else {
                mobileMenu.style.left = '0'; // Show menu
                mobileMenu.classList.add('active');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
            const toggleBtn = document.querySelector('.toggle-btn');
            toggleBtn.innerHTML = sidebar.classList.contains('collapsed') ? '&#x276F;' : '&#x276E;';
        }

        function showLoader() {
            const loader = document.getElementById("loader");
            loader.style.display = "block"; // Show the loader
            loader.style.opacity = 1; // Make sure it's fully visible

            // Optional: You can add a delay here before the loader disappears
            setTimeout(function() {
                loader.style.display = "none"; // Hide the loader after some time
            }, 3000); // 3 seconds (adjust based on your needs)
        }

        window.addEventListener("load", function() {
            document.getElementById("loader").style.opacity = 0; // Fade out the loader
            setTimeout(function() {
                document.getElementById("loader").style.display = "none"; // Hide the loader after fading
            }, 500); // 0.5 seconds for the fade-out effect
        });
    </script>


</body>

</html>
