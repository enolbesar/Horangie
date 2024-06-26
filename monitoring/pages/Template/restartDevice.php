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
</div>