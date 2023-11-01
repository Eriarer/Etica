<?php
include_once 'include/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  include_once 'include/navbar.php';
  ?>
  <div class="form container">
    <div class="row">
      <div class="col">
        <div class="d-flex flex-column  text-center">
          <div class="h4">1.-A menudo he tenido éxito en un examen o tarea, incluso cuando tenía miedo de no hacerlo bien antes de emprender la tarea.</div>
          <div class="radioInput">
            <input class="form-check-input position-static" type="radio" name="p1" id="nunca" value="1">
            <label for="nunca" class="nf nf-md-thumb_down mx-4 radio nunca"></label>
            <input class="form-check-input position-static" type="radio" name="p1" id="raro" value="2">
            <label for="raro" class="nf nf-md-thumb_down_outline mx-4 radio raro"></label>
            <input class="form-check-input position-static" type="radio" name="p1" id="aveces" value="3">
            <label for="aveces" class="nf nf-md-thumbs_up_down_outline mx-4 radio aveces"></label>
            <input class="form-check-input position-static" type="radio" name="p1" id="frecuente" value="4">
            <label for="frecuente" class="nf nf-md-thumb_up_outline mx-4 radio frecuente"></label>
            <input class="form-check-input position-static" type="radio" name="p1" id="siempre" value="5">
            <label for="siempre" class="nf nf-md-thumb_up mx-4 radio siempre"></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>