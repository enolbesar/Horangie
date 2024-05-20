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
        Horangie Dashboard
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

<body class="g-sidenav-show   bg-gray-100">
    <?php include('template/nav.php'); ?>
    
    <main class="main-content position-relative border-radius-lg ">
        <!-- Title -->
        <?php
        $page_title = "Dashboard";
        include('template/header.php');
        ?>
        <!-- ======= -->

        <div class="container-fluid py-2">
            <!-- Data Device -->
            <?php include('template/dataRealTime.php'); ?>
            <!-- =========== -->

            <!-- Grafik -->
            <?php include('template/grafik.php'); ?>
            <!-- ========== -->
            

            <div class="row mt-4">
                <!-- threshold -->
                <?php include('template/threshold.php'); ?>
                <!-- ========= -->
                
                <!-- Actuator Control -->
                <?php include('template/actuator.php'); ?>
                <!-- ================ -->

                <!-- Restart -->
                <?php include('template/restartDevice.php'); ?>
                <!-- ======= -->
            </div>
        </div>
        <!-- Footer -->
        <?php include('template/footer.php'); ?>
        <!-- ====== -->

    </main>



    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

</body>

</html>