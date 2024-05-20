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
</div>