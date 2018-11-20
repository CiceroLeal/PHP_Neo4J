<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <?php require 'scripts.php' ?>
    </head>
    <body>
        <?php
            echo '<pre>';
            print_r($pessoas);
            echo '</pre>';
        ?>

    </body>
</html>