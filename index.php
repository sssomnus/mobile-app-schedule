<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wikimania 2017 Schedule</title>
    <meta name="description" content="Wikimania 2017 Schedule">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/ga-with-do-not-track-check.js"></script>
    <script>
      WebAnalytics();
    </script>
    <script src="vendor/js/modernizr.js"></script>
  </head>
  <body>
    <?php
    if ($_GET['l'] == fr) {
      include("index_fr.php");
    } else if ($_GET['l'] == en) {
      include("index_en.php");
    } else {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang){
    case "fr":
      include("index_fr.php");
      break;
    case "en":
      include("index_en.php");
      break;
    default:
      include("index_en.php");
      break;
    }
    }
    ?>
  </body>
</html>