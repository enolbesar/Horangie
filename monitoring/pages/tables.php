<?php
  // Database configuration
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "db_sensor";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Pagination settings
  $limit = 20; // Number of entries to show per page
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $offset = ($page - 1) * $limit;

  // Fetch total number of records
  $total_result = $conn->query("SELECT COUNT(*) as count FROM tb_logsensor");
  $total_row = $total_result->fetch_assoc();
  $total_records = $total_row['count'];
  $total_pages = ceil($total_records / $limit);

  // Fetch limited data for the current page
  $sql = "SELECT timestamp, rain, temp, soil, hum, hindex, sun FROM tb_logsensor ORDER BY timestamp DESC LIMIT $limit OFFSET $offset";
  $result = $conn->query($sql);

  // Close the connection after fetching data
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Horangie Table
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/0eea203261.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- <script src="../js/handleOnOff.js"></script> -->
  <script src="../js/threshold.js"></script>
  <script src="../js/cekdata.js"></script>
  <script src="../js/handleStatus.js"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html"
        target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Horangie Registration</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/tables.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Table</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/userData.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User Data</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/registration.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Registration</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">History Monitoring</h6>
        </nav>
        <!-- Tempatkan tombol dark mode di sini -->
        <div class="form-check form-switch ps-0 ms-auto my-auto">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
        </div>
      </div>
    </nav>
    <div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-left mb-0 text-center">
                <thead>
                  <tr>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Timestamp</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rain Intensity</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Air Temperature</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Soil Moisture</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Air Humidity</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Heat Index</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunlight</th>
                  </tr>
                </thead>
                <tbody>
                <?php if ($result->num_rows > 0) : ?>
                    <?php while($row = $result->fetch_assoc()) : ?>
                      <tr class="text-xs font-weight-bold mb-0">
                        <td><?php echo htmlspecialchars($row['timestamp']); ?></td>
                        <td><?php echo htmlspecialchars($row['rain']); ?></td>
                        <td><?php echo htmlspecialchars($row['temp']); ?></td>
                        <td><?php echo htmlspecialchars($row['soil']); ?></td>
                        <td><?php echo htmlspecialchars($row['hum']); ?></td>
                        <td><?php echo htmlspecialchars($row['hindex']); ?></td>
                        <td><?php echo htmlspecialchars($row['sun']); ?></td>
                      </tr>
                    <?php endwhile; ?>
                  <?php else : ?>
                    <tr class="text-xs font-weight-bold mb-0">
                      <td colspan="7">No data available</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              <div class="text-right p-3">
                <a href="export_csv.php" class="btn btn-primary">Export to CSV</a>
              </div>
              <div class="text-center p-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <?php
                      $start_page = max(1, $page - 2);
                      $end_page = min($total_pages, $page + 2);

                      if ($start_page > 1) {
                          echo '<li class="page-item"><a class="page-link" href="?page=1">1</a></li>';
                          if ($start_page > 2) {
                              echo '<li class="page-item"><span class="page-link">...</span></li>';
                          }
                      }

                      for ($i = $start_page; $i <= $end_page; $i++) {
                          echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                      }

                      if ($end_page < $total_pages) {
                          if ($end_page < $total_pages - 1) {
                              echo '<li class="page-item"><span class="page-link">...</span></li>';
                          }
                          echo '<li class="page-item"><a class="page-link" href="?page=' . $total_pages . '">' . $total_pages . '</a></li>';
                      }
                    ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <footer class="footer pt-1  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Horangie
                Team</a>
            </div>
          </div>
        </div>
      </div>
    </footer> </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script>
    // Fungsi untuk mengambil data dari API
    async function fetchWeatherData() {
      try {
        const response = await fetch('realTimeStat.php');
        const data = await response.json();

        const tableBody = document.getElementById('weather-table-body');
        tableBody.innerHTML = '';

        data.forEach(item => {
          const row = document.createElement('tr');
              
          row.innerHTML = `
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.timestamp}</span></td>
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.rain}</span></td>
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.temp}</span></td>
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.soil}</span></td>
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.hum}</span></td>
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.hindex}</span></td>
            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.sun}</span></td>
          `;
          tableBody.appendChild(row);
        });
      } catch (error) {
        console.error('Error fetching weather data:', error);
      }
    }

    // Panggil fungsi fetchWeatherData saat halaman dimuat
    document.addEventListener('DOMContentLoaded', fetchWeatherData);
</script>

</body>

</html>


