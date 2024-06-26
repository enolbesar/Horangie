<?php
    $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
    file_put_contents('UIDContainer.php',$Write);
?>

<div class="card">
    <div class="card-body">
        <div class="text-center">
            <h3 id="blink">Please Tag to Display ID or User Data</h3>
        </div>
        <div id="getUID" hidden></div>
        <div id="show_user_data">
            <!-- Placeholder untuk menampilkan data pengguna -->
            <form class="form-container">
    <div class="form-group row">
        <label class="col-sm-5 col-form-label font-weight-bold">ID</label>
        <div class="col-sm-9">
            <label class="col-form-label font-weight-normal" id="userDataID">----------</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-5 col-form-label font-weight-bold">Name</label>
        <div class="col-sm-9">
            <label class="col-form-label font-weight-normal" id="userDataName">----------</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-5 col-form-label font-weight-bold">Gender</label>
        <div class="col-sm-9">
            <label class="col-form-label font-weight-normal" id="userDataGender">----------</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-5 col-form-label font-weight-bold">Email</label>
        <div class="col-sm-9">
            <label class="col-form-label font-weight-normal" id="userDataEmail">----------</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-5 col-form-label font-weight-bold">Mobile Number</label>
        <div class="col-sm-9">
            <label class="col-form-label font-weight-normal" id="userDataMobile">----------</label>
        </div>
    </div>
</form>


        </div>
    </div>
</div>

<!-- Modal untuk menampilkan pesan error -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="errorModalBody">
                <!-- Isi pesan error akan ditampilkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            // Load UID dari UIDContainer.php
            $("#getUID").load("UIDContainer.php");

            // Set interval untuk reload UIDContainer.php setiap 500ms
            setInterval(function() {
                $("#getUID").load("UIDContainer.php");  
            }, 500);
        });

        var myVar = setInterval(myTimer, 1000);
        var myVar1 = setInterval(myTimer1, 1000);
        var oldID="";
        clearInterval(myVar1);

        function myTimer() {
            var getID=document.getElementById("getUID").innerHTML;
            oldID=getID;
            if(getID!="") {
                myVar1 = setInterval(myTimer1, 500);
                showUser(getID); // Panggil fungsi showUser saat ID didapatkan
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
                // Lakukan request untuk mengambil data pengguna berdasarkan ID
                $.ajax({
                    url: "read tag user data.php",
                    type: "GET",
                    data: { id: str },
                    success: function(response) {
                        if (response.error) {
                            // Tampilkan modal error jika ID tidak ditemukan
                            showErrorModal("ID not registered in the database.");
                        } else {
                            // Tampilkan data pengguna ke dalam form-container
                            $("#userDataID").text(response.id);
                            $("#userDataName").text(response.name);
                            $("#userDataGender").text(response.gender);
                            $("#userDataEmail").text(response.email);
                            $("#userDataMobile").text(response.mobile);
                        }
                    },
                    error: function(xhr, status, error) {
                        showErrorModal("Error occurred while fetching user data.");
                    }
                });
            }
        }
        
        function showErrorModal(message) {
            $("#errorModalBody").text(message);
            $("#errorModal").modal("show");
        }
        
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 750); 
    </script>
