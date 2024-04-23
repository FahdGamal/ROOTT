<?php
    if(session_status() == PHP_SESSION_NONE) session_start();
  ?>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa-solid fa-code"></i></i> Root</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#home" class="nav-item nav-link active">Home</a>

                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#courses" class="nav-item nav-link">COURSES</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">TUTORIAL</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a class="dropdown-item">Frontend</a>
                        <a class="dropdown-item">Backend</a>
                        <a class="dropdown-item">Introduction To Computer</a>
                        <a class="dropdown-item">Python</a>
                    </div>
                </div>
                <?php
                    if(isset($_SESSION['user_id'])) {
                        echo '<a href="logout.php" class="nav-item nav-link">LOGOUT</a>';
                        
                    } else {
                        echo '<a href="login.php" class="nav-item nav-link">LOGIN</a>';
                        // echo '<a href="register.php" class="nav-item nav-link">REGISTRATION</a>';
                    }

                ?>
                <!-- <a href="register.php" class="nav-item nav-link">REGISTRATION</a> -->
                <!-- <a href="logout.php" class="nav-item nav-link">LOGOUT</a> -->
            </div>
            
    </nav>
    <!-- Navbar End -->