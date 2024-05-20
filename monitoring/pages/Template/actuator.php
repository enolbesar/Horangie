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
</div>