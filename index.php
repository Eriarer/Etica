<?php
include_once 'include/session.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/tooltip.css">

  <!-- favIcon -->
  <link id="favicon" rel="shortcut icon" type="image/png" href="#" />


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
  include_once 'include/navbar.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>