<?php
  session_start();
?>

<nav class="navbar navbar-expand-lg .bg-* navbar-light mb-5 fixed-top">
  <div class="container-fluid">
    <a href="http://localhost:3000">
      <img id="logo" src="logo.jpg" alt="Logo" href="http://localhost:3000">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="inventory.php">Inventory</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Reports
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="customerReport.php">Customer</a></li>

            <?php if($_SESSION['job'] == 'President and CEO' ||
                      $_SESSION['job'] == 'Vice President and CFO' ||
                      $_SESSION['job'] == 'Store Manager' ||
                      $_SESSION['job'] == 'Office Manager'): ?>
              <li><a class="dropdown-item" href="empReport.php">Employee</a></li>
            <?php endif; ?>

            <li><a class="dropdown-item" href="productReport.php">Products</a></li>
            <li><a class="dropdown-item" href="salesSummary.php">Sales</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="statement.php">Statements</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="receipt.php">Receipts</a>
        </li>

      </ul>
    </div>
  </div>
</nav>