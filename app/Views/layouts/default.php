<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jquery-ui.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css" />
  <title>TigerPOS</title>
</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <?php echo anchor('/', 'TigerPOS', ['class' => 'navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold']); ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <ul class="navbar-nav d-flex ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome <?= session('username'); ?>
              <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <?= anchor('logout', "Logout", ['class' => "dropdown-item"]) ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <?php echo anchor('/', '<span class="me-2"><i class="bi bi-speedometer2"></i></span><span>Dashboard</span>', ['class' => 'nav-link px-3 active']); ?>
          </li>
          <li class="my-2">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <?php echo anchor('/customers', '<span class="me-2"><i class="fa-solid fa-users"></i></span><span>Customers</span>', ['class' => 'nav-link px-3']); ?>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts3">
              <span class="me-2"><i class="fa-solid fa-box-open"></i></span>
              <span>Products</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts3">
              <ul class="navbar-nav ps-3">
                <li>
                  <?php echo anchor('/categories', '<span class="me-2"><i class="fa-solid fa-box-open"></i></span><span>Product Categories</span>', ['class' => 'nav-link px-3']); ?>
                </li>
                <li>
                  <?php echo anchor('/products', '<span class="me-2"><i class="fa-solid fa-box-open"></i></span><span>Product List</span>', ['class' => 'nav-link px-3']); ?>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <?php echo anchor('/suppliers', '<span class="me-2"><i class="fa-solid fa-people-carry-box"></i></span><span>Suppliers</span>', ['class' => 'nav-link px-3']); ?>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts5">
              <span class="me-2"><i class="fa-solid fa-box-open"></i></span>
              <span>Purchase</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts5">
              <ul class="navbar-nav ps-3">
                <li>
                  <?php echo anchor('/order', '<span class="me-2"><i class="fa-solid fa-file-invoice"></i></span><span>Purchase List</span>', ['class' => 'nav-link px-3']); ?>
                </li>
                <li>
                <?php echo anchor('/purchase', '<span class="me-2"><i class="fa-solid fa-cart-arrow-down"></i></span><span>Add Purchase</span>', ['class' => 'nav-link px-3']); ?>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts4">
              <span class="me-2"><i class="fa-solid fa-box-open"></i></span>
              <span>Sales</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts4">
              <ul class="navbar-nav ps-3">
                <li>
                  <?php echo anchor('/invoice', '<span class="me-2"><i class="fa-solid fa-file-invoice"></i></span><span>Invoice List</span>', ['class' => 'nav-link px-3']); ?>
                </li>
                <li>
                  <?php echo anchor('/invoicedetails', '<span class="me-2"><i class="fa-solid fa-file-invoice-dollar"></i></span><span>Detail Invoice List</span>', ['class' => 'nav-link px-3']); ?>
                </li>
                <li>
                  <?php echo anchor('/sales', '<span class="me-2"><i class="fa-solid fa-cart-shopping"></i></span><span>All Sale</span>', ['class' => 'nav-link px-3']); ?>
                </li>
                <li>
                  <?php echo anchor('/pos', '<span class="me-2"><i class="fa-solid fa-box-open"></i></span><span>POS</span>', ['class' => 'nav-link px-3']); ?>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <?php echo anchor('/expenses', '<span class="me-2"><i class="fa-solid fa-money-check-dollar"></i></span><span>Expenses</span>', ['class' => 'nav-link px-3']); ?>
          </li>
          <li>
            <?php echo anchor('/accounts', '<span class="me-2"><i class="fa-solid fa-money-bill-1"></i></span><span>Payment Accounts</span>', ['class' => 'nav-link px-3']); ?>
          </li>
          <li>
            <?php echo anchor('/users', '<span class="me-2"><i class="bi bi-person"></i></span><span>Users Management</span>', ['class' => 'nav-link px-3']); ?>
          </li>

          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts2">
              <span class="me-2"><i class="fa-regular fa-flag"></i></span>
              <span>Reports</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts2">
              <ul class="navbar-nav ps-3">
                <li>
                  <?php echo anchor('/users', '<span class="me-2"><i class="bi bi-person"></i></span><span>Users</span>', ['class' => 'nav-link px-3']); ?>
                </li>
              </ul>
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="#" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-person-check"></i></span>
                    <span>Role</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- offcanvas -->
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <?= $this->renderSection('contents'); ?>
    </div>
  </main>
  <footer class="bg-light text-center text-lg-start mt-5">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      &copy; <?php echo date("Y"); ?> Copyright :
      <a class="text-decoration-none" href="https://isdbstudents.com/49/">IsDB-BISEW WDPF-49 Students</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script> -->
  <script src="<?php echo base_url() ?>/assets/js/jquery-3.5.1.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
  <?= $this->renderSection('scripts'); ?>
</body>

</html>