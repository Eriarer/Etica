<?php
include_once '../include/session.php';

$cuestionario = array(
  'He tenido éxito en una prueba o tarea a pesar de que temía no hacerlo bien antes de emprender la tarea.',
  'Puedo dar la impresión de que soy más competente de lo que realmente soy.',
  'Evito las evaluaciones si es posible y tengo miedo de que otros me evalúen.',
  'Cuando la gente me elogia por algo que he logrado, tengo miedo de no poder estar a la altura de sus expectativas hacia mí en el futuro.',
  'A veces pienso que obtuve mi puesto actual o logré mi éxito actual porque tuve la suerte de estar en el lugar correcto en el momento adecuado o conocí a las personas adecuadas.',
  'Tengo miedo de que las personas importantes para mí descubran que no soy tan capaz como ellos piensan.',
  'Tiendo a recordar los incidentes en los que no he hecho lo mejor más que aquellas veces en las que he dado lo mejor de mí.',
  'Rara vez hago un proyecto o tarea tan bien como me gustaría hacerlo.',
  'A veces siento o creo que mi éxito en mi vida o en mi trabajo ha sido el resultado de algún tipo de error.',
  'Me cuesta aceptar cumplidos o elogios sobre mi inteligencia o logros.',
  'A veces siento que mi éxito ha sido debido a algún tipo de suerte.',
  'A veces estoy decepcionado con mis logros actuales y pienso que debería haber logrado mucho más.',
  'A veces tengo miedo de que otros descubran cuánto conocimiento o habilidad me falta realmente.',
  'A menudo tengo miedo de que pueda fallar en una nueva tarea o empresa aunque generalmente me va bien en lo que intento.',
  'Cuando he tenido éxito en algo y he recibido reconocimiento por mis logros, dudo de que pueda seguir repitiendo ese éxito.',
  'Si recibo muchos elogios y reconocimiento por algo que he logrado, tiendo a restar importancia a la importancia de lo que he hecho.',
  'A menudo comparo mi capacidad con la de quienes me rodean y pienso que pueden ser más inteligentes que yo.',
  'A menudo me preocupa no tener éxito en un proyecto o examen, aunque los demás a mi alrededor confíen considerablemente en que lo haré bien.',
  'Si voy a recibir un ascenso o ganar reconocimiento de algún tipo, dudo en contárselo a los demás hasta que sea un hecho consumado.',
  'Me siento mal y desanimado si no soy "el mejor" o al menos "muy especial" en situaciones que involucran logros.'
);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/tooltip.css">
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="../js/impostorTest.js"></script>

</head>
<script>
  window.matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', ({
      matches
    }) => {
      $favIcon = document.getElementById("favicon");
      if (matches) {
        $favIcon.setAttribute("href", "media/images/favIconLigth.png");
      } else {
        $favIcon.setAttribute("href", "media/images/favIconDark.png");
      }
    })
</script>

<body>
  <?php
  include_once '../include/navbar.php';
  ?>
  <form class="container" action="respuestas.php" method="post" id="myForm">
    <div class="row row-cols-1 row-cols-lg-2">
      <?php
      for ($i = 1, $j = 1; $i <= 20; $i++)
      {
        echo '<div class="col d-flex flex-column  text-center">';
        echo '<div class="h4" id="q' . $i . '">' . $i . '.-' . $cuestionario[$i - 1] . '</div>';
        echo '<div class="radioInput">';
        echo '<input class="form-check-input position-static" type="radio" name="p' . $i . '" id="p' . $i . 'r' . $j . '" value="1">
              <label for="p' . $i . 'r' . $j . '" class="nf nf-md-thumb_down mx-4 radio nunca"></label>';
        $j++;
        echo '<input class="form-check-input position-static" type="radio" name="p' . $i . '" id="p' . $i . 'r' . $j . '" value="2">
              <label for="p' . $i . 'r' . $j . '" class="nf nf-md-thumb_down_outline mx-4 radio raro"></label>';
        $j++;
        echo '<input class="form-check-input position-static" type="radio" name="p' . $i . '" id="p' . $i . 'r' . $j . '" value="3">
              <label for="p' . $i . 'r' . $j . '" class="nf nf-md-thumbs_up_down_outline mx-4 radio aveces"></label>';
        $j++;
        echo '<input class="form-check-input position-static" type="radio" name="p' . $i . '" id="p' . $i . 'r' . $j . '" value="4">
              <label for="p' . $i . 'r' . $j . '" class="nf nf-md-thumb_up_outline mx-4 radio frecuente"></label>';
        $j++;
        echo '<input class="form-check-input position-static" type="radio" name="p' . $i . '" id="p' . $i . 'r' . $j . '" value="5">
              <label for="p' . $i . 'r' . $j . '" class="nf nf-md-thumb_up mx-4 radio siempre"></label>';
        echo '</div>';
        echo '</div>';
      } ?>
    </div>
    <div class="row">
      <div class="col">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </form>
</body>

</html>