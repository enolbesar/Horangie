

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
  <link rel="stylesheet" href="css/style.css">
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <?php
        include('template/nav.php');
        ?>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <?php
        $page_title = "Input User";
        include('template/header.php');
        ?>

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
                                    <input type="text" name="id" id="getUID" class="form-control" placeholder="Please Tag your Card / Key Chain to display ID" required>
                                </div>  
                                <div class="mb-3">
                                    <label for="input2" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="input3" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" id="input3">
                                        <option value="" selected disabled>Choose gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input4" class="form-label">Email Address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Enter Email Address" required>
                                </div>                                    
                                <div class="mb-3">
                                    <label for="input5" class="form-label">Mobile Number</label>
                                    <input name="mobile" type="text" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>                                    
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-5">
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
                                                      <td align="left"><?php echo $data['id'];?></td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Name</td>
                                                      <td align="left"><?php echo $data['name'];?></td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Gender</td>
                                                      <td align="left"><?php echo $data['gender'];?></td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Email</td>
                                                      <td align="left"><?php echo $data['email'];?></td>
                                                  </tr>
                                                  <tr class="py-4">
                                                      <td class="text-xs font-weight-bold">Mobile Number</td>
                                                      <td align="left"><?php echo $data['mobile'];?></td>
                                                  </tr>
                                              </tbody>
                                            </table>

                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> -->
            </div>    
        </div>
        <?php include('template/footer.php'); ?>
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
