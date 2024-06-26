<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>Horangie Registration</title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/0eea203261.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- <script src="../js/handleOnOff.js"></script> -->
  <script src="../../js/threshold.js"></script>
  <script src="../../js/cekdata.js"></script>
  <script src="../../js/handleStatus.js"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="../css/style.css">
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <?php
    // Get the current file name
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="../pages/dashboard.php"
                target="_blank">
                <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Horangie Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav" id="nav-list">
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>" href="../../pages/dashboard.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page == 'tables.php' ? 'active' : ''; ?>" href="../../pages/tables.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Table</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page == 'userData.php' ? 'active' : ''; ?>" href="../../pages/userData.php">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Data</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page == 'registration.php' ? 'active' : ''; ?>" href="../../pages/regist/registration.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Input User</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

  <main class="main-content position-relative border-radius-lg">
    <?php
        $page_title = "Input User";
    ?>
    <header>
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
          <div class="container-fluid py-1 px-3">
              <nav aria-label="breadcrumb">
                  <h6 class="font-weight-bolder text-white mb-0"><?php echo isset($page_title) ? $page_title : 'Default Title'; ?></h6>
              </nav>
              <!-- Tempatkan tombol dark mode di sini -->
              <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
              </div>
          </div>
      </nav>
    </header>
    <div class="container mt-3"> <!-- Mengubah mt-2 menjadi mt-4 untuk sedikit mengurangi margin top -->
      <div class="row">
        <div class="col-md-7">
          <div class="card shadow">
            <div class="card-body">
              <h3 class="card-title text-center">Input User Form</h3>
              <form action="insertDB.php" method="post">
                <div class="form-group">
                  <label for="getUID">ID</label>
                  <textarea name="id" id="getUID" class="form-control" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" required></textarea>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input name="email" type="email" class="form-control" placeholder="Enter Email Address" required>
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile Number</label>
                  <input name="mobile" type="text" class="form-control" placeholder="Enter Mobile Number" required>
                </div>
                <div class="mt-5">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <?php include('read tag.php'); ?>
        </div>
      </div>
    </div>
  </main>
  <!-- Bootstrap core JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.2/assets/js/argon.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#getUID").load("UIDContainer.php");
      setInterval(function () {
        $("#getUID").load("UIDContainer.php");
      }, 500);
    });
  </script>
</body>

</html>
