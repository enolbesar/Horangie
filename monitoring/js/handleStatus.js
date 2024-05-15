//Handle device (on/off) ==================================================================================================================
function swapIrrPump(value) {
    if (value == true) {
        value = "On";
        document.getElementById('irrigationIcon').classList.remove('bg-gradient-dark');
        document.getElementById('irrigationIcon').classList.add('bg-success');
    } else {
        value = "Off";
        document.getElementById('irrigationIcon').classList.remove('bg-success');
        document.getElementById('irrigationIcon').classList.add('bg-gradient-dark');
    }
    document.getElementById("statusIrrPump").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("statusIrrPump").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleControl.php?device=irrigation&stat=" + value, true);
    xmlhttp.send();
}

function swapMistingPump(value) {
    if (value == true) {
        value = "On";
        document.getElementById('mistingIcon').classList.remove('bg-gradient-dark');
        document.getElementById('mistingIcon').classList.add('bg-success');
    } else {
        value = "Off";
        document.getElementById('mistingIcon').classList.remove('bg-success');
        document.getElementById('mistingIcon').classList.add('bg-gradient-dark');
    }
    document.getElementById("statusMistingPump").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("statusMistingPump").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleControl.php?device=misting&stat=" + value, true);
    xmlhttp.send();
}

function swapHeater(value) {
    if (value == true) {
        value = "On";
        document.getElementById('heaterIcon').classList.remove('bg-gradient-dark');
        document.getElementById('heaterIcon').classList.add('bg-success');
    } else {
        value = "Off";
        document.getElementById('heaterIcon').classList.remove('bg-success');
        document.getElementById('heaterIcon').classList.add('bg-gradient-dark');
    }
    document.getElementById("statusHeater").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("statusHeater").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleControl.php?device=heater&stat=" + value, true);
    xmlhttp.send();
}

function swapLamp(value) {
    if (value == true) {
        value = "On";
        document.getElementById('lampIcon').classList.remove('bg-gradient-dark');
        document.getElementById('lampIcon').classList.add('bg-success');
    } else {
        value = "Off";
        document.getElementById('lampIcon').classList.remove('bg-success');
        document.getElementById('lampIcon').classList.add('bg-gradient-dark');
    }
    document.getElementById("statusLamp").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("statusLamp").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleControl.php?device=lamp&stat=" + value, true);
    xmlhttp.send();
}

//Handle mode ==================================================================================================================


//Handle threshold ==================================================================================================================
function thrIrrPump(value) {
    document.getElementById("posIrrPump").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("posIrrPump").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleThreshold.php?device=irrigation&pos=" + value, true);
    xmlhttp.send();
}

function thrMistPump(value) {
    document.getElementById("posMistPump").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("posMistPump").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleThreshold.php?device=misting&pos=" + value, true);
    xmlhttp.send();
}

function thrHeater(value) {
    document.getElementById("posHeater").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("posHeater").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleThreshold.php?device=heater&pos=" + value, true);
    xmlhttp.send();
}

function thrLamp(value) {
    document.getElementById("posLamp").innerHTML = value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("posLamp").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "handleThreshold.php?device=lamp&pos=" + value, true);
    xmlhttp.send();
}



