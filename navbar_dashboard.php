<!-- Title -->
      <center>
        <h1>ADMIN PANEL DASHBOARD</h1>
      </center> 
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark" style="border-radius: 5px;">
        <a class="navbar-brand" href="#"><?php echo($_SESSION['nome']); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="colaboradores.php">Colaboradores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1">Disabled</a>
            </li>
          </ul>
          <span class="navbar-text">
           <a href="homepage.html"><strong><i class="fas fa-shopping-cart"></i> Go to Shop</strong></a>
          </span>
        </div>
      </nav>