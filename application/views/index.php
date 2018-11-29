<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <?php require 'scripts.php' ?>
        <style>
            .acao{
                margin: 5px;
                color: #000;
            }

            .add{
                position: fixed;
                right: 15px;
                bottom: 15px;
                color: #ffffff!important;
                z-index: 3;
                background: #a7a7a7;
                padding: 7px;
                border-radius: 6px;
                text-decoration: none!important;
            }
        </style>
    </head>
    <body>
    <div>
        <a href="/grafos/Main/Criar" class="add"> <span class="fa fa-plus"></span> Criar Evento</a>
    </div>
    <div class="timeline-container" id="timeline-1" style="padding-bottom: 270px">
        <div class="timeline-header">
            <h2 class="timeline-header__title">Eventos Históricos do Brasil</h2>
            <h3 class="timeline-header__subtitle">Ordenados por período</h3>
        </div>
        <div class="timeline">
            <?php foreach ($eventos as $i => $evento){ ?>
                <div class="timeline-item" data-text="<?=$evento['titulo']?>">
                    <div class="timeline__content">
                        <h2 class="timeline__content-title"><?= $evento['Periodo']['de']?> - <?= $evento['Periodo']['ate']?></h2>
                        <p class="timeline__content-desc"><?=$evento['conteudo']?></p>
                        <a style="color: #FFF" href="/grafos/Main/Editar/<?= $evento['id']?>">Leia Mais...</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <script src="/grafos/assets/index.js" ></script>
    </body>
</html>