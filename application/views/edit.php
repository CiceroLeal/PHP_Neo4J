<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <?php require 'scripts.php' ?>
    <script src="/grafos/assets/create.js" ></script>
</head>
<body>
<div class="container-fluid">
    <div style="width: 50%; margin: 20px auto">
        <form method="POST" action="/grafos/Main/atualizar/<?=$id?>">
            <h4>Detalhes Evento</h4>
            <br>
            <div class="form-group">
                <label> Título </label>
                <input type="text" class="form-control" name="titulo" value="<?= $Evento['titulo']?>"/>
            </div>
            <div class="form-group">
                <label> Período </label>
                <div class="row">
                    <div class="col-md-6">
                        de: <input type="number" class="form-control" name="periodo1" value="<?= $Periodo['de'] ?>"/>
                    </div>
                    <div class="col-md-6">
                        até: <input type="number" class="form-control" name="periodo2" value="<?= $Periodo['ate'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label> Localização </label>
                <input type="text" class="form-control" name="localizacao" value="<?= $Localizacao ?>"/>
            </div>
            <div class="form-group">
                <label> Tema </label>
                <input type="text" class="form-control" name="tema" value="<?= $Tema ?>"/>
            </div>
            <div class="form-group">
                <label> Agentes </label>
                <select class="form-control" multiple="multiple" id="agentes" name="agentes[]">
                    <?php foreach ($Agentes as $k => $agente){ ?>
                        <option selected><?=$agente?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label> Conteúdo </label>
                <textarea class="form-control" rows="10" name="conteudo"><?=$Evento['conteudo']?></textarea>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>