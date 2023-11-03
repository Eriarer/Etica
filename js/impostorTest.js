document.addEventListener("DOMContentLoaded", function () {
  // Agregar un evento 'submit' al formulario
  document.getElementById("myForm").addEventListener("submit", function (e) {
    if (validarFormulario()) {
      //si no se respondio todo validarormulario = true
      e.preventDefault(); // Evitar que el formulario se envíe
    }
  });

  function validarFormulario() {
    for (var i = 1; i <= 20; i++) {
      var seleccionado = false;
      for (var j = 0; j < 5; j++) {
        tooltipId = "p" + i + "r" + j;
        if (document.getElementById(tooltipId).checked) {
          seleccionado = true;
          break;
        }
      }
      if (!seleccionado) {
        //si un input esta seleccionado, no se muestra el tooltip
        tooltipId = "q" + i;
        // mostrar el tooltip con la variable global
        mostrarTooltip();
        // llamar el foco al primer radio de la pregunta
        document.getElementById("p" + i + "r1").focus();
        return true;
      }
    }
    return false;
  }

  function mostrarTooltip() {
    $("#" + tooltipId)
      .tooltip({
        title: "Selecciona una respuesta",
        placement: "top",
      })
      .tooltip("show");
  }

  // Ocultar cualquier tooltip que se haya mostrado al hacer clic en el formulario
  document.getElementById("myForm").addEventListener("click", function () {
    ocultarTooltips();
  });

  // Ocultar cualquier tooltip que se haya mostrado al cambiar el formulario
  document.getElementById("myForm").addEventListener("change", function () {
    ocultarTooltips();
  });

  function ocultarTooltips() {
    // Ocultar el tooltip si está visible
    $("#" + tooltipId).tooltip("hide");
  }
});
