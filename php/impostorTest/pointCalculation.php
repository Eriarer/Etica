<?php

$pointDivisor = 40;
$steps = $puntos / $pointDivisor;
$colors = [];
$redStep = ($startColor[0] - $endColor[0]) / $pointDivisor;
$greenStep = ($startColor[1] - $endColor[1]) / $pointDivisor;
$blueStep = ($startColor[2] - $endColor[2]) / $pointDivisor;

for ($i = 0; $i <= $pointDivisor; $i++)
{
  $colors[$i] = 'rgb(' . $startColor[0] . ', ' . $startColor[1] . ', ' . $startColor[2] . ')';
  $startColor[0] -= number_format($redStep, 0, '', '');
  $startColor[1] -= number_format($greenStep, 0, '', '');
  $startColor[2] -= number_format($blueStep, 0, '', '');
}

// hacer otro arreglo de colores, similar al anterior, pero que sean blancos con tinte de color
$colorBg = [];

for ($i = 0; $i <= $pointDivisor; $i++)
{
  //obtener el color RGB de  $colors[$i]
  $tempArray = str_replace('rgb(', '', $colors[$i]);
  $tempArray = str_replace(')', '', $tempArray);
  $tempArray = explode(',', $tempArray);

  // Calcula las diferencias entre cada componente de color y el blanco
  $redDiff = (255 - $tempArray[0]) * $blanquear;
  $greenDiff = (255 -  $tempArray[1]) * $blanquear;
  $blueDiff = (255 - $tempArray[2]) * $blanquear;

  // Ajusta los componentes de color para acercarlos al blanco
  $witheR =  number_format($tempArray[0] + $redDiff, 0, '', '');
  $witheG =  number_format($tempArray[1] + $greenDiff, 0, '', '');
  $witheB =  number_format($tempArray[2] + $blueDiff, 0, '', '');

  // Almacena el nuevo color en el array
  $colorBg[$i] = 'rgb(' . $witheR . ', ' . $witheG . ', ' . $witheB . ')';
}

$degree = 3.6; // aumento de grados por punto
$angle = $puntos * $degree;
$animationRight = 'rotate(' . min(180, $angle) . 'deg)';
$animationLeft = 'rotate(' . max(0, $angle - 180) . 'deg)';
$animationDuration = ($animationLeft == 'rotate(0deg)') ? '0.6s' : '1.2s';
