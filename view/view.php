<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
    <style>
        span {
            border: 1px solid black;
            margin: 10px;
        }
    </style>
</head>
<body>
<header>
    <nav style="border: 1px solid black;padding-right:1em;">
        <span><a href="index.php?controller=voiture&action=readAll">Gestion des voitures</a></span>
        <span><a href="index.php?action=readAll&controller=utilisateur">Gestion des utilisateurs</a></span>
        <span><a href="index.php?action=readAll&controller=trajet">Gestion des trajets</a></span>
    </nav>
</header>
<?php
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>

<footer>
    <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de covoiturage de Mfrizzy le 100
    </p>
</footer>

</body>
</html>