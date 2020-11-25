<?php
    require_once __DIR__ ."/autoload/autoload.php";
    $_SESSION['fashion_store'] = getInput("id_store");
    header("location: index.php");
?>