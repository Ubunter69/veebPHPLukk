<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Marek PHP Tööd</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
include ("header.php");
?>
<?php
include ("nav.php");
?>

<main>
<?php
    if (isset($_GET['link'])) {
        include ("content/".$_GET['link']);
    }
    else {
        include("content/avaleht.php");
    }
?>
</main>

<?php
include ("footer.php");
?>
</body>
</html>
