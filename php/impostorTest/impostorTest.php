<?php
include_once '../../include/session.php';

$cuestionario = array(
  //'He tenido éxito en una prueba o tarea a pesar de que temía no hacerlo bien antes de emprender la tarea.',
  'He tenido éxito en una prueba a pesar de mi temor a no hacerlo bien al principio.',
  'Puedo dar la impresión de que soy más competente de lo que realmente soy.',
  'Evito las evaluaciones si es posible y tengo miedo de que otros me evalúen.',
  //'Cuando la gente me elogia por algo que he logrado, tengo miedo de no poder estar a la altura de sus expectativas hacia mí en el futuro.',
  'Me preocupa no estar a la altura de las expectativas cuando me elogian por mis logros.',
  //'A veces pienso que obtuve mi puesto actual o logré mi éxito actual porque tuve la suerte de estar en el lugar correcto en el momento adecuado o conocí a las personas adecuadas.',
  'A menudo pienso que mi puesto actual se debe a la suerte o a algún otro factor externo.',
  //'Tengo miedo de que las personas importantes para mí descubran que no soy tan capaz como ellos piensan.',
  'Tengo miedo de que las personas que me importan, descubran que no soy tan capaz como ellos piensan.',
  //'Tiendo a recordar los incidentes en los que no he hecho lo mejor más que aquellas veces en las que he dado lo mejor de mí.',
  'Recuerdo más las situaciones en las que no me he esforzado mucho que aquellas en las que di lo mejor de mí.',
  'Rara vez hago un proyecto o tarea tan bien como me gustaría hacerlo.',
  //'A veces siento o creo que mi éxito en mi vida o en mi trabajo ha sido el resultado de algún tipo de error.',
  'Siento que el éxito en mi vida o trabajo es resultado de algún tipo de error.',
  'Me cuesta aceptar cumplidos o elogios sobre mi inteligencia o logros.',
  'A veces siento que mi éxito ha sido debido a algún tipo de suerte.',
  //'A veces estoy decepcionado con mis logros actuales y pienso que debería haber logrado mucho más.',
  'A veces estoy decepcionado con mis logros y pienso que debería haber logrado mucho más.',
  //'A veces tengo miedo de que otros descubran cuánto conocimiento o habilidad me falta realmente.',
  'Suelo temer que otros descubran que no soy tan inteligente o hábil como piensan.',
  'A menudo tengo miedo de que pueda fallar en una nueva tarea o empresa aunque generalmente me va bien en lo que intento.',
  //'Cuando he tenido éxito en algo y he recibido reconocimiento por mis logros, dudo de que pueda seguir repitiendo ese éxito.',
  'Dudo de poder repetir algún éxito cuando recibo reconocimientos por mis logros.',
  //'Si recibo muchos elogios y reconocimiento por algo que he logrado, tiendo a restar importancia a la importancia de lo que he hecho.',
  'Al recibir muchos elogios o reconocimientos por algún logro, tiendo a quitarle importancia al logro.',
  //'A menudo comparo mi capacidad con la de quienes me rodean y pienso que pueden ser más inteligentes que yo.',
  'Suelo comparar mi capacidad con la de quienes me rodean y pienso que pueden ser más inteligentes que yo.',
  //'A menudo me preocupa no tener éxito en un proyecto o examen, aunque los demás a mi alrededor confíen considerablemente en que lo haré bien.',
  'A menudo me preocupa no tener éxito en algo, a pesar de que los demás confíen en que lo haré bien.',
  //'Si voy a recibir un ascenso o ganar reconocimiento de algún tipo, dudo en contárselo a los demás hasta que sea un hecho consumado.',
  'Si voy a recibir un ascenso o ganar algún reconocimiento, dudo en contárselo a los demás hasta que haya sucedido.',
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
  <link rel="stylesheet" href="../../css/impostorTest/style.css">
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>

<body>
  <div class="wrapper">
    <?php
    include_once '../../include/navbar.php';
    ?>
    <form class="myForm" action="respuestas.php" method="post" id="myForm">
      <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2">
        <?php
        $resuestas = array('nunca', 'raro', 'aveces', 'frecuente', 'siempre');
        $meaning = array('Nunca', 'Rara vez', 'A veces', 'Frecuentemente', 'Siempre');
        $nfClass = array('nf-md-thumb_down', 'nf-md-thumb_down_outline', 'nf-md-thumbs_up_down_outline', 'nf-md-thumb_up_outline', 'nf-md-thumb_up');

        for ($i = 1, $j = 1; $i <= 20; $i++)
        {
          echo '<div class="col">';
          echo ' <div class="card card-body  mx-1 mx-sm-1 mx-md-3 mx-lg-5 my-2 my-sm-3 my-md-4 my-lg-5 p-0">';
          echo '  <div class="h4 card-title question" id="q' . $i . '"><div class="nQuestion">' . $i . '</div>' . $cuestionario[$i - 1] . '</div>';
          echo '  <article class="radioInput text-center">';
          for ($j = 0; $j < 5; $j++)
          {
            echo ' <input class="form-check-input position-static" type="radio" name="p' . $i . '" id="p' . $i . 'r' . $j . '" value="' . ($j + 1) . '">';
            echo  '<label for="p' . $i . 'r' . $j . '" class="nf ' . $nfClass[$j] . ' px-3 px-md-3 px-lg-4 radio ' . $resuestas[$j] . ' "></label>';
          }
          echo '   <div class="d-flex justify-content-center">';
          echo '    <h3 class="meaning"></h3>';
          echo '   </div>';
          echo '  </article>';
          echo ' </div>';
          echo '</div>';
        } ?>
      </div>
      <div class="container mb-5">
        <div class="row  row-cols-1 ">
          <div class="col">
            <button type="submit" class="btn  btn-block btn-custom">Enviar</button>
          </div>
        </div>
      </div>
    </form>
</body>
</div>
<script src="../../js/impostorTest.js"></script>


</html>