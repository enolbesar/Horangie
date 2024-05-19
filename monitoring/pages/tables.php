<?php
    // Database configuration
    $servername = "localhost"; // Change as needed
    $username = "root"; // Change as needed
    $password = ""; // Change as needed
    $dbname = "db_sensor";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user data from the database
    $sql = "SELECT timestamp, rain, temp, soil, hum, hindex, sun FROM tb_logsensor ORDER BY timestamp DESC LIMIT 15" ; // Adjust the table name and column names as needed
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
  <?php include('template/nav.php'); ?>
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
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Timestamp</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rain Intensity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Air Temperature</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Soil Moisture</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Air Humidity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Heat Index</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunlight</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="weather-table-body">
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
                        <td colspan="6">No data available</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
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

        // // Gantilah URL ini dengan endpoint API Anda
        // const apiUrl = 'https://your-api-endpoint.com/get-weather-data';

        // // Fungsi untuk mengambil data dari API
        // async function fetchWeatherData() {
        //   try {
        //     const response = await fetch(apiUrl);
        //     const data = await response.json();

        //     const tableBody = document.getElementById('weather-table-body');
        //     tableBody.innerHTML = '';

        //     data.forEach(item => {
        //       const row = document.createElement('tr');
              
        //       row.innerHTML = `
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.timestamp}</span></td>
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.rain}</span></td>
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.temp}</span></td>
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.soil}</span></td>
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.hum}</span></td>
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.hindex}</span></td>
        //         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">${item.sun}</span></td>
        //       `;

        //       tableBody.appendChild(row);
        //     });
        //   } catch (error) {
        //     console.error('Error fetching weather data:', error);
        //   }
        // }

        // // Panggil fungsi fetchWeatherData saat halaman dimuat
        // window.onload = fetchWeatherData;
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


