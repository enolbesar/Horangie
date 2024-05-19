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
    <link rel="stylesheet" href="css/style.css">
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

<body class="g-sidenav-show   bg-gray-100">
    <?php include('template/nav.php'); ?>
    
    <main class="main-content position-relative border-radius-lg ">
        <!-- Title -->
        <?php
        $page_title = "Dashboard";
        include('template/header.php');
        ?>
        
        <!-- Title END -->

        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-lg-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-left p-3">
                            <div class="icon text-primary mb-0">
                                <i class="fas fa-mountain text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <div class="text-center flex-grow-1">
                                <h2 class="font-weight-bolder mt-2">
                                    <span id="ceksoil"></span>
                                </h2>
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Soil Moisture</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-left p-3"> <!-- Gaya disesuaikan -->
                            <div class="icon text-primary mb-0">
                                <i class="fas fa-thermometer-half text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <div class="text-center flex-grow-1">
                                <h2 class="font-weight-bolder mt-2">
                                    <span id="cektemp"></span> °C
                                </h2>
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Air Temperature</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-left p-3"> <!-- Gaya disesuaikan -->
                            <div class="icon text-primary mb-0">
                                <i class="fas fa-tint text-lg opacity-10" aria-hidden="true"></i>                        
                            </div>
                            <div class="text-center flex-grow-1">
                                <h2 class="font-weight-bolder mt-2">
                                    <span id="cekhum"></span>
                                </h2>
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Air Humidity</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-left p-3"> <!-- Gaya disesuaikan -->
                            <div class="icon text-primary mb-0">
                                <i class="fas fa-thermometer text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <div class="text-center flex-grow-1">
                                <h2 class="font-weight-bolder mt-2">
                                    <span id="cekhindex"></span>
                                </h2>
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Heat Index</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-left p-3"> <!-- Gaya disesuaikan -->
                            <div class="icon text-primary mb-0">
                                <i class="fas fa-sun text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <div class="text-center flex-grow-1">
                                <h2 class="font-weight-bolder mt-2">
                                    <span id="ceksun"></span>
                                </h2>
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sunlight</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-left p-3"> <!-- Gaya disesuaikan -->
                            <div class="icon text-primary mb-0">
                                <i class="fas fa-cloud-showers-heavy text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <div class="text-center flex-grow-1">
                                <h2 class="font-weight-bolder mt-2">
                                    <span id="cekrain"></span>
                                </h2>
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Rain Intensity</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-5 mb-lg-0 mb-4">
                    <div class="card z-index-3 h-200">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-top">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark">Weekly</h6>
                                            <span class="text-xs" id="selected-option-label"></span>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-primary" type="button" id="weeklyDropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-list"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="weeklyDropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" onclick="updateWeeklyChart('Soil Moisture')">Soil Moisture</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateWeeklyChart('Air Temperature')">Air Temperature</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateWeeklyChart('Air Humidity')">Air Humidity</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateWeeklyChart('Sunlight')">Sunlight</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateWeeklyChart('Heat Index')">Heat Index</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateWeeklyChart('Rain Intensity')">Rain Intensity</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="chart">
                                <canvas id="weeklyChartCanvas" class="chart-canvas" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-top">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark">Daily</h6>
                                            <span class="text-xs" id="selected-option-label-daily"></span>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-primary" type="button" id="dailyDropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-list"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dailyDropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" onclick="updateDailyChart('Soil Moisture')">Soil Moisture</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateDailyChart('Air Temperature')">Air Temperature</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateDailyChart('Air Humidity')">Air Humidity</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateDailyChart('Sunlight')">Sunlight</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateDailyChart('Heat Index')">Heat Index</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="updateDailyChart('Rain Intensity')">Rain Intensity</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="chart">
                                <canvas id="dailyChartCanvas" class="chart-canvas" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-lg-0 mb-3">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Threshold</h6>
                        </div>
                        <ul class="list-group p-3 pt-0 pb-0">
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Irrigation Pump</h6>
                                        <p id="rangeValue1" class="float-end mb-0"><span id="posIrrPump"><?php echo $irrPump_threshold ?></span></p>
                                    </div>
                                </div>
                                <div class="d-flex col-lg-9">
                                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1"
                                        id="customRange1" value="<?php echo $irrPump_threshold ?>" onchange="thrIrrPump(this.value)">
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Misting Pump</h6>
                                        <p id="rangeValue2" class="float-end mb-0"><span id="posMistPump"><?php echo $mistPump_threshold ?></span></p>
                                    </div>
                                </div>
                                <div class="d-flex col-lg-9">
                                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1" id="customRange2" value="<?php echo $mistPump_threshold ?>" onchange="thrMistPump(this.value)">
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Heater</h6>
                                        <p id="rangeValue3" class="float-end mb-0"><span id="posHeater"><?php echo $heater_threshold ?></span></p>
                                    </div>
                                </div>
                                <div class="d-flex col-lg-9">
                                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1" id="customRange3" value="<?php echo $heater_threshold ?>" onchange="thrHeater(this.value)">
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Lamp</h6>
                                        <p id="rangeValue4" class="float-end mb-0"><span id="posLamp"><?php echo $lamp_threshold ?></span></p>
                                    </div>
                                </div>
                                <div class="d-flex col-lg-9">
                                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1" id="customRange4" value="<?php echo $lamp_threshold ?>" onchange="thrLamp(this.value)">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- ================ -->
                <!-- Actuator Control -->
                <!-- ================ -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Actuator Control</h6>
                            <div class="btn-group btn-group-xs">
                                <button id="modeA" type="button" class="btn btn-outline-primary btn-xs mb-0 <?php echo $mode == 1 ? 'active' : ''; ?>">A</button>
                                <button id="modeM" type="button" class="btn btn-outline-primary btn-xs mb-0 <?php echo $mode == 0 ? 'active' : ''; ?>">M</button>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 <?php echo $irrPump == 1 ? 'bg-success' : 'bg-gradient-dark'; ?> shadow text-center" id="irrigationIcon">
                                            <i class="fa-solid fa-fill-drip"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Irrigation Pump</h6>
                                            <span class="text-xs"><span id="statusIrrPump"><?php echo $irrPump == 1 ? "On" : "Off"; ?></span></span>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input button-disable" type="checkbox" role="switch" id="flexSwitchCheckIrrigation" onchange="swapIrrPump(this.checked)" <?php echo $irrPump == 1 ? "checked" : ""; ?>>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 <?php echo $mistPump == 1 ? 'bg-success' : 'bg-gradient-dark'; ?> shadow text-center" id="mistingIcon">
                                            <i class="fa-solid fa-cloud-showers-heavy"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Misting Pump</h6>
                                            <span class="text-xs"><span id="statusMistingPump"><?php echo $mistPump == 1 ? "On" : "Off"; ?></span></span>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input button-disable" type="checkbox" role="switch" id="flexSwitchCheckMisting" onchange="swapMistingPump(this.checked)" <?php echo $mistPump == 1 ? "checked" : ""; ?>>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 <?php echo $heater == 1 ? 'bg-success' : 'bg-gradient-dark'; ?> shadow text-center" id="heaterIcon">
                                            <i class="fa-solid fa-fan"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Heater</h6>
                                            <span class="text-xs"><span id="statusHeater"><?php echo $heater == 1 ? "On" : "Off"; ?></span></span>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input button-disable" type="checkbox" role="switch" id="flexSwitchCheckHeater" onchange="swapHeater(this.checked)" <?php echo $heater == 1 ? "checked" : ""; ?>>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 <?php echo $lamp == 1 ? 'bg-success' : 'bg-gradient-dark'; ?> shadow text-center" id="lampIcon">
                                            <i class="fas fa-lightbulb"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Lamp</h6>
                                            <span class="text-xs"><span id="statusLamp"><?php echo $lamp == 1 ? "On" : "Off"; ?></span></span>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input button-disable" type="checkbox" role="switch" id="flexSwitchCheckLamp" onchange="swapLamp(this.checked)" <?php echo $lamp == 1 ? "checked" : ""; ?>>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ================ -->
                <!-- Actuator Control END -->
                <!-- ================ -->

                <!-- ================ -->
                <!-- Restart -->
                <!-- ================ -->
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Restart</h6>
                        </div>
                        <div class="card-body p-4 mt-2">
                            <ul class="list-group">
                                <li class="list-group-item border-0 mb-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0 mt-0 text-dark text-sm">Wifi Credential</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 mb-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button id="restartWifiBtn" type="button" class="btn btn-primary">Restart</button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 mb-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Microcontroller</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 mb-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button id="restartMicrocontrollerBtn" type="button" class="btn btn-primary">Restart</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>  

                <!-- Alert -->
                <div class="popup-container hidden" id="customAlert">
                    <div class="popup-box bg-primary">
                        <h1 id="alertTitle" class="text-secondary">Restart Wifi</h1>
                        <p id="alertMessage" class="text-secondary">Restart wifi sekarang?</p>
                        <button class="glow-on-hover bg-primary" id="cancelButton">Cancel</button>
                        <button class="glow-on-hover" id="okButton">OK</button>
                    </div>
                </div>
                <!-- Alert END -->

                <!-- ================ -->
                <!-- Restart END -->
                <!-- ================ --> 
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
    function sendModeValue(modeValue) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_mode.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {                
                if (modeValue === 1) {
                    document.getElementById("modeA").classList.add("active");
                    document.getElementById("modeM").classList.remove("active");
                    document.querySelectorAll('.button-disable').forEach(function(el) {
                        el.disabled = true;
                    });
                } else {
                    document.getElementById("modeM").classList.add("active");
                    document.getElementById("modeA").classList.remove("active");
                    document.querySelectorAll('.button-disable').forEach(function(el) {
                        el.disabled = false;
                    });
                }
            }
        };
        xhr.send("mode=" + modeValue);
    }

    window.onload = function() {
        var initialMode = <?php echo $mode; ?>;
        if (initialMode === 1) {
            document.querySelectorAll('.button-disable').forEach(function(el) {
                el.disabled = true;
            });
        }
    };

    document.getElementById("modeA").addEventListener("click", function() {
        sendModeValue(1);
    });

    document.getElementById("modeM").addEventListener("click", function() {
        sendModeValue(0);
    });
    </script>
    <script>
    function updateWeeklyChart(option) {
        document.getElementById('selected-option-label').innerText = option;

        fetch(`weekly.php?option=${option}`)
            .then(response => response.json())
            .then(data => {
                const labels = data.labels;
                const chartData = data.data;

                const ctx = document.getElementById('weeklyChartCanvas').getContext('2d');

                if (window.weeklyChart !== undefined)
                    window.weeklyChart.destroy();

                const gradientStroke2 = ctx.createLinearGradient(0, 230, 0, 50);
                gradientStroke2.addColorStop(1, 'rgba(29,140,248,0.2)');
                gradientStroke2.addColorStop(0.4, 'rgba(29,140,248,0.0)');
                gradientStroke2.addColorStop(0, 'rgba(29,140,248,0)'); // blue colors

                window.weeklyChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: "",
                            tension: 0.4,
                            borderWidth: 3,
                            borderColor: "#5e72e4",
                            backgroundColor: gradientStroke2,
                            fill: true,
                            data: chartData,
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    color: '#fbfbfb',
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    color: '#ccc',
                                    padding: 10,
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    updateWeeklyChart('Soil Moisture');

    </script>
    <script>
        function updateDailyChart(option) {
            document.getElementById('selected-option-label-daily').innerText = option;

            fetch(`daily.php?option=${option}`)
                .then(response => response.json())
                .then(data => {
                    const labels = data.labels;
                    const chartData = data.data;

                    const ctx = document.getElementById('dailyChartCanvas').getContext('2d');

                    if (window.dailyChart !== undefined)
                        window.dailyChart.destroy();

                    const gradientStroke2 = ctx.createLinearGradient(0, 230, 0, 50);
                    gradientStroke2.addColorStop(1, 'rgba(29,140,248,0.2)');
                    gradientStroke2.addColorStop(0.4, 'rgba(29,140,248,0.0)');
                    gradientStroke2.addColorStop(0, 'rgba(29,140,248,0)'); // blue colors

                    window.dailyChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "",
                                tension: 0.4,
                                borderWidth: 3,
                                borderColor: "#5e72e4",
                                backgroundColor: gradientStroke2,
                                fill: true,
                                data: chartData,
                            }],
                        },
                        options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    color: '#fbfbfb',
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    color: '#ccc',
                                    padding: 10,
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });
            })
                .catch(error => console.error('Error fetching data:', error));
        }

        updateDailyChart('Soil Moisture');

    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var restartWifiBtn = document.getElementById("restartWifiBtn");
        var restartMicrocontrollerBtn = document.getElementById("restartMicrocontrollerBtn");

        restartWifiBtn.addEventListener("click", function() {
            updateDevice("wifi");
        });

        restartMicrocontrollerBtn.addEventListener("click", function() {
            updateDevice("board");
        });

        function updateDevice(deviceType) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "handlereset.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            var data = {};
            data[deviceType] = 1;
            xhr.send(JSON.stringify(data));
        }
    });

    // ==========
    // Alert
    // ==========
    document.addEventListener("DOMContentLoaded", function() {
        var restartWifiBtn = document.getElementById("restartWifiBtn");
        var restartMicrocontrollerBtn = document.getElementById("restartMicrocontrollerBtn");
        var customAlert = document.getElementById("customAlert");
        var alertTitle = document.getElementById("alertTitle");
        var alertMessage = document.getElementById("alertMessage");
        var cancelButton = document.getElementById("cancelButton");
        var okButton = document.getElementById("okButton");
        var currentDeviceType = "";
        var sidenav = document.getElementById("sidenav-main");

        function showAlert(deviceType, title, message) {
            alertTitle.textContent = title;
            alertMessage.textContent = message;
            customAlert.classList.remove("hidden");
            currentDeviceType = deviceType;
        }

        function hideAlert() {
            customAlert.classList.add("hidden");
            sidenav.classList.add("hidden");
            
        }

        function updateDevice(deviceType) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "handlereset.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            var data = {};
            data[deviceType] = 1;
            xhr.send(JSON.stringify(data));
        }

        restartWifiBtn.addEventListener("click", function() {
            showAlert("wifi", "Restart Wifi", "Restart wifi sekarang?");
        });

        restartMicrocontrollerBtn.addEventListener("click", function() {
            showAlert("board", "Restart Microcontroller", "Restart microcontroller sekarang?");
        });

        cancelButton.addEventListener("click", function() {
            hideAlert();
        });

        okButton.addEventListener("click", function() {
            hideAlert();
            if (currentDeviceType) {
                updateDevice(currentDeviceType);
            }
        });
    });

    </script>



    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

</body>

</html>