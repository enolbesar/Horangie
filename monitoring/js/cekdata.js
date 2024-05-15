$(document).ready(function() {
  setInterval(function() {
    $.get("readsensor.php", function(data) {
      var values = data.split("|");
      $("#cekhindex").html(values[0]);
      $("#cekhum").html(values[1]);
      $("#cekrain").html(values[2]);
      $("#ceksoil").html(values[3]);
      $("#ceksun").html(values[4]);
      $("#cektemp").html(values[5]);
    });
  }, 1000);
});



