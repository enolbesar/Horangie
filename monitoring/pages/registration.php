<?php
    include("realTimeStat.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Horangie Registration
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
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html" target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Horangie Registration</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/tables.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Table</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/userData.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User Data</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/registration.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-check-bold text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Registration</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
    <main class="main-content position-relative border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-white mb-0">Input User</h6>
                </nav>
                <!-- Tempatkan tombol dark mode di sini -->
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-7">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Input User Form</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-3">
                              <form>
                                <div class="mb-3">
                                    <label for="input1" class="form-label">ID</label>
                                    <div class="col-sm-9">
                                        <textarea name="id" id="getUID" class="form-control" placeholder="Please Tag your Card / Key Chain to display ID" rows="2" required></textarea>
                                    </div>
                                </div>  
                                <div class="mb-3">
                                    <label for="input2" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="input2" placeholder="Enter name">
                                </div>
                                <div class="mb-3">
                                    <label for="input3" class="form-label">Gender</label>
                                    <select class="form-select" id="input3">
                                        <option value="" selected disabled>Choose gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input4" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="input4" placeholder="Enter email">
                                </div>                                    
                                <div class="mb-3">
                                    <label for="input5" class="form-label">Mobile Number</label>
                                    <input type="tel" class="form-control" id="input5" placeholder="Enter mobile number">
                                </div>                                    

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                  <div class="card mb-4">
                      <div class="card-header pb-0">
                      </div>
                      <div class="card-body px-0 pt-0 pb-2">
                          <div class="p-3">
                              <h3 class="text-center" id="blink">Please Tag to Display ID or User Data</h3>
                              <p id="getUID" hidden></p>
                              <br>
                              <div id="show_user_data">
                                  <form>
                                      <div class="table-responsive">
                                          <table class="table align-items-center mb-0">
                                              <thead>
                                                  <tr>
                                                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Field</th>
                                                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Value</th>
                                                  </tr>
                                              </thead>
                                                <tbody>
                                                  <tr class="mb-5">
                                                      <td class="text-xs font-weight-bold">ID</td>
                                                      <td class="text-xs">--------</td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Name</td>
                                                      <td class="text-xs">--------</td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Gender</td>
                                                      <td class="text-xs">--------</td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Email</td>
                                                      <td class="text-xs">--------</td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Mobile Number</td>
                                                      <td class="text-xs">--------</td>
                                                  </tr>
                                              </tbody>
                                            </table>

                                      </div>
                                  </form>
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
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Horangie
                                Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

<script>
    var myVar = setInterval(myTimer, 1000);
    var myVar1 = setInterval(myTimer1, 1000);
    var oldID="";
    clearInterval(myVar1);

    function myTimer() {
        var getID=document.getElementById("getUID").innerHTML;
        oldID=getID;
        if(getID!="") {
            myVar1 = setInterval(myTimer1, 500);
            showUser(getID);
            clearInterval(myVar);
        }
    }
    
    function myTimer1() {
        var getID=document.getElementById("getUID").innerHTML;
        if(oldID!=getID) {
            myVar = setInterval(myTimer, 500);
            clearInterval(myVar1);
        }
    }
    
    function showUser(str) {
        if (str == "") {
            document.getElementById("show_user_data").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("show_user_data").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","read tag user data.php?id="+str,true);
            xmlhttp.send();
        }
    }
    
    var blink = document.getElementById('blink');
    setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
    }, 750); 
</script>
<script>
    $(document).ready(function(){
        $("#getUID").load("UIDContainer.php");
        setInterval(function() {
            $("#getUID").load("UIDContainer.php");
        }, 500);
    });
</script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Argon Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>
</html>
