<?php
session_start();

// definir el path del server
$_SERVER['ROOT'] = "http://" . $_SERVER['SERVER_NAME'] . "/Etica/";
?>

<head>
  <!-- favIcon -->
  <link rel="shortcut icon" type="image/png" href="#" />
</head>

<script>
  window.matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', ({
      matches
    }) => {
      if (matches) {
        // asignar favIcon sin utilizar el ID
        document.querySelector("link[rel*='icon']").href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIconLigth.png' ?>";
      } else {
        document.querySelector("link[rel*='icon']").href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIconDark.png' ?>";
      }
    });

  // asignar favIcon utilizando obteniendo el color del tema
  const theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'Ligth' : 'Dark';
  document.querySelector("link[rel*='icon']").href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIcon' ?>" + theme + ".png";
</script>