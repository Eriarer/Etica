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
  const faviconLink = document.querySelector("link[rel*='icon']");
  const theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'Light' : 'Dark';
  faviconLink.href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIcon/favIcon' ?>" + theme + ".png";

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', ({
    matches
  }) => {
    const theme = matches ? 'Dark' : 'Light';
    faviconLink.href = "<?php echo $_SERVER['ROOT'] . 'media/images/favIcon/favIcon' ?>" + theme + ".png";
  });
</script>