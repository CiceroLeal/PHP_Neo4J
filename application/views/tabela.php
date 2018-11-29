<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <?php require 'scripts.php' ?>
        <script src="/grafos/assets/index.js" ></script>
        <style>
            .acao{
                margin: 5px;
                color: #000;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" style="width: 80%">
        <br>
        <a href="/grafos/Main/Criar" class="btn btn-success" style="float: right;">Criar Evento</a>
        <br>
        <h2>Eventos</h2>
        <table id="tabela" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Conteúdo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
             <?php
             for ($i = 0; $i < count($evento); $i++){
             ?>
                    <tr>
                        <td><?php echo $evento[$i]['titulo'] ?></td>
                        <td><?php echo $evento[$i]['conteudo'] ?></td>
                        <td>
                            <a href="/grafos/Main/Editar/<?= $evento[$i]['id']?>"><span class="fa fa-edit acao"></span></a>
                            <a href="/grafos/Main/Excluir/<?= $evento[$i]['id']?>"><span class="fa fa-times acao"></span></a>
                        </td>
                    </tr>
            <?php
                }?>
            </tbody>
        </table>
        </div>
    </body>
</html>