$(document).ready(function() {
  setInterval(function() {
    $.get("readsensor.php", function(data) {
      var values = data.split("|");
      $("#cekhindex").text(values[0]);
      $("#cekhum").text(values[1]);
      $("#cekrain").text(values[2]);
      $("#ceksoil").text(values[3]);
      $("#ceksun").text(values[4]);
      $("#cektemp").text(values[5]);

      // Update status display
      $("#status_esp32").text(values[7]);

    });
  }, 1000);
});
