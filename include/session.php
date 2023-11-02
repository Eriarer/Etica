<?php
session_start();

// definir el path del server
$_SERVER['ROOT'] = "http://" . $_SERVER['SERVER_NAME'] . "/Etica/";
?>

<head>
  <!-- favIcon -->
  <link rel="shortcut icon" type="image/png" href="<?php echo $_SERVER['ROOT'] . 'media/images/favIcon/favIconGray.png' ?>" />
</head>

<script>
  window.matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', ({
      matches
    }) => {
      if (matches) {
        // asignar favIcon sin utilizar el ID
        document.querySelector("link[rel*='icon']").href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIcon/favIconLigth.png' ?>";
      } else {
        document.querySelector("link[rel*='icon']").href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIcon/favIconDark.png' ?>";
      }
    });
</script>