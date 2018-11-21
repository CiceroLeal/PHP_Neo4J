<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <?php require 'scripts.php' ?>
        <script src="/grafos/assets/index.js" ></script>
    </head>
    <body>
        <div class="container-fluid">
        <br>
        <?php for ($i = 0; $i < count($pessoas); $i++){ ?>
        <h4>Pessoa <?= $i + 1 ?></h4>
        <table id="tabela" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Propriedade</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
             <?php
                foreach ($pessoas[$i] as $prop => $val){
             ?>
                    <tr>
                        <td><?php echo $prop ?></td>
                        <td><?php echo $val ?></td>
                    </tr>
            <?php
                }?>
            </tbody>
        </table>
         <?php }?>
        </div>
    </body>
</html>