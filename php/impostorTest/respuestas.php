<?php
include_once '../../include/session.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
  header('Location: ../../index.php');
}

$puntos = 0;
for ($i = 1; $i <= 20; $i++)
{
  $p = $_POST["p" . $i];
  $puntos += $p;
}
$pointDivisor = 40;
$blanquear = 0.85;
$startColor = array(80, 219, 7);
// colores en formato rgb(r,g,b)
switch ($puntos)
{
  case $puntos <= 25:
    $endColor = array(90, 207, 0);
    break;
  case $puntos <= 30:
    $endColor = array(118, 207, 23);
    break;
  case $puntos <= 40:
    $endColor = array(150, 207, 23);
    break;
  case $puntos <= 50:
    $endColor = array(196, 196, 4);
    break;
  case $puntos <= 60:
    $endColor = array(189, 165, 11);
    break;
  case $puntos <= 70:
    $endColor = array(189, 136, 11);
    break;
  case $puntos <= 80:
    $endColor = array(204, 98, 6);
    break;
  case $puntos <= 90:
    $endColor = array(196, 65, 0);
    break;
  case $puntos <= 100:
    $endColor = array(196, 26, 0);
    break;
  default:
    $endColor = array(80, 219, 7);
    break;
}
// calculo de colores y puntos
include_once 'pointCalculation.php';
?>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="../../css/impostorTest/score.css">
  <link rel="stylesheet" href="../../css/impostorTest/style.css">
</head>

<style>
  .score-number::after {
    position: absolute;
    top: 42%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-shadow: 0px 1px 2px rgba(150, 150, 150, 0.14);
    font-family: sans-serif;
    z-index: 11;
    font-size: 29px;
    font-weight: 600;
    color: #080;
    content: '<?php echo $puntos; ?>';
    animation: score-counter <?php echo $animationDuration; ?> linear forwards;
  }

  @keyframes score-counter {
    <?php
    for ($i = 0; $i <= $pointDivisor; $i++)
    {
      $percentage = $i * (100 / $pointDivisor);
      $percentage = number_format($percentage, 0, '', '');
      $score = number_format($i * $steps, 0, '', '');
      echo "$percentage% {
                color: {$colors[$i]};
                content: '$score';
            }";
    }
    ?>
  }

  .circle-text-color-anim {
    background: none;
    animation: circle-text-color-anim <?php echo $animationDuration; ?> linear forwards;
  }


  .circle-bg-color-anim {
    animation: circle-bg-color-anim 1.2s normal forwards;
  }

  @keyframes circle-bg-color-anim {
    <?php
    for ($i = 0; $i <= $pointDivisor; $i++)
    {
      $percentage = $i * (100 / $pointDivisor);
      $percentage = number_format($percentage, 0, '', '');
      echo "$percentage% {
              background-color: {$colorBg[$i]};
            }";
    }
    ?>
  }


  @keyframes circle-text-color-anim {
    <?php
    for ($i = 0; $i <= $pointDivisor; $i++)
    {
      $percentage = $i * (100 / $pointDivisor);
      $percentage = number_format($percentage, 0, '', '');
      echo "$percentage% {
                color: {$colors[$i]};
            }";
    }
    ?>
  }

  .progress-right .score-progress {
    animation: progress-right 0.6s linear both,
      circle-progress-color-anim-right 1.2s normal forwards;
  }

  @keyframes progress-right {
    100% {
      transform: <?php echo $animationRight; ?>;
    }
  }

  @keyframes circle-progress-color-anim-right {
    <?php
    for ($i = 0; $i <= $pointDivisor; $i++)
    {
      $percentage = $i * (100 / $pointDivisor);
      $percentage = number_format($percentage, 0, '', '');
      echo "$percentage% {
                background: {$colors[$i]};
            }";
    }
    ?>
  }

  @keyframes circle-progress-color-anim-left {
    <?php
    // la animcion va a empezar en el 50% de la animacion de la derecha con el color del 50% de la animacion de la derecha
    // y van a terminar a la vez
    for ($i = ($pointDivisor / 2); $i <= $pointDivisor; $i++)
    {
      $percentage = ($i - ($pointDivisor / 2)) * number_format(200 / $pointDivisor, 0, '', '');
      $percentage = number_format($percentage, 0, '', '');
      echo "$percentage% {
                background: {$colors[$i]};
            }";
    }
    ?>
  }

  @keyframes progress-left {
    100% {
      transform: <?php echo $animationLeft; ?>;
    }
  }
</style>


<body>
  <?php
  include_once '../../include/navbar.php';
  ?>
  <div class="circle-bg-color-anim score-circular">
    <div class="circle-bg-color-anim score-inner"></div>
    <div class="score-number"></div>
    <div class="circle-text-color-anim score-text">100</div>
    <div class="score-circle">
      <div class="circle-bg-color-anim score-bar progress-right">
        <div class="circle-bg-color-anim score-progress"></div>
      </div>
      <div class="circle-bg-color-anim score-bar progress-left">
        <div class="score-progress"></div>
      </div>
    </div>
  </div>


</body>

</html>