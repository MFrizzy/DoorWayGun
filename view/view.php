<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
    <link rel="stylesheet" href="<?php File::build_path(array('style','material.min.css')) ?>">
</head>
<body>
<header>
    <nav style="border: 1px solid black;padding-right:1em;">
    </nav>
</header>
<?php
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>

<footer>
    <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Footer
    </p>
</footer>

</body>
</html>