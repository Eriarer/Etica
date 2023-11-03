<?php
include_once '../include/session.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../index.php');
}

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
    <link rel="stylesheet" href="../css/impostorTest/score.css">
    <link rel="stylesheet" href="../css/impostorTest/style.css">
</head>

<style>
    <?php
    $puntos = 0;
    for ($i = 1; $i <= 20; $i++) {
        $p = $_POST["p" . $i];
        $puntos = $puntos + $p;
    }
    $puntos = $puntos;
    $steps = $puntos / $puntos;
    // generar un arreglo de $puntos elementos de color rojo -> rgb(255, 59, 48) a verde -> rgb(38, 198, 62)
    $colors = array();
    $red = 255;
    $green = 59;
    $blue = 48;
    $redStep = ($red - 38) / $puntos;
    $greenStep = ($green - 198) / $puntos;
    $blueStep = ($blue - 62) / $puntos;
    for ($i = 0; $i <= $puntos; $i++) {
        $colors[$i] = 'rgb(' . $red . ', ' . $green . ', ' . $blue . ')';
        $red = $red - $redStep;
        $green = $green - $greenStep;
        $blue = $blue - $blueStep;
    }


    // 360 = 100pts
    $degree = 3.6; // aumento de grados por punto
    $angle = $puntos * $degree;
    if ($angle > 180) {
        $animationRight = 'rotate(180deg)';
        $animationLeft = 'rotate(' . ($angle - 180) . 'deg)';
    } else {
        $animationRight = 'rotate(' . $angle . 'deg)';
        $animationLeft = 'rotate(0deg)';
    }
    ?>.score-number::after {
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
        <?php
        if ($animationLeft == 'rotate(0deg)') {
            echo 'animation: score-counter 0.6s linear forwards;';
        } else {
            echo 'animation: score-counter 1.2s linear forwards;';
        }
        ?>
    }

    @keyframes score-counter {
        <?php
        for ($i = 0; $i <= $puntos; $i++) {
            echo ($i * (100 / $puntos)) . "% {
                color: " . $colors[$i] . ";
                content: '" . number_format($i * $steps, 0, '', '') . "';
            }";
        }
        ?>
    }

    .circle-text-color-anim {
        background: none;
        <?php
        if ($animationLeft == 'rotate(0deg)') {
            echo 'animation: circle-text-color-anim 0.6s linear forwards;';
        } else {
            echo 'animation: circle-text-color-anim 1.2s linear forwards;';
        }
        ?>
    }

    @keyframes circle-text-color-anim {
        <?php
        for ($i = 0; $i <= $puntos; $i++) {
            echo ($i * (100 / $puntos)) . "% {
                color: " . $colors[$i] . ";
            }";
        }
        ?>
    }

    @keyframes progress-right {
        100% {
            transform: <?php echo $animationRight; ?>;
        }
    }

    @keyframes progress-left {
        100% {
            transform: <?php echo $animationLeft; ?>;
        }
    }
</style>

<body>
    <?php
    include_once '../include/navbar.php';
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