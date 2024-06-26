<div class="col-lg-2 mb-lg-0 mb-3">
    <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="mb-0">Device</h6>
        </div>
        <div class="card-body p-3 mt-1">
            <ul class="list-group">
                <li class="list-group-item border-0 mb-0 p-1">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column">
                            <h6 class="mb-0 text-dark text-sm">Status Device</h6>
                        </div>
                    </div>
                </li>
                <li class="list-group-item border-0 p-0">
                    <h5 class="font-weight-bolder mt-0 text-center">
                        <span id="status_esp32" class="text-small">Online</span>
                    </h5>
                </li>
                <li class="list-group-item border-0 mb-0 mt-1 p-1">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column">
                            <h6 class="mb-0 mt-0 text-dark text-sm">Wifi Credential</h6>
                        </div>
                    </div>
                </li>
                <li class="list-group-item border-0 mt-0 mb-1 p-1">
                    <div class="d-flex justify-content-center align-items-center">
                        <button id="restartWifiBtn" type="button" class="btn btn-primary btn-sm">Restart</button>
                    </div>
                </li>
                <li class="list-group-item border-0 mb-0 p-1">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column">
                            <h6 class="mb-0 mt-0  text-dark text-sm">Microcontroller</h6>
                        </div>
                    </div>
                </li>
                <li class="list-group-item border-0 mb-0 p-1">
                    <div class="d-flex justify-content-center align-items-center">
                        <button id="restartMicrocontrollerBtn" type="button" class="btn btn-primary btn-sm">Restart</button>
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
        <button class="glow-on-hover bg-primary btn-sm" id="cancelButton">Cancel</button>
        <button class="glow-on-hover btn-sm" id="okButton">OK</button>
    </div>
</div>

<script>
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
