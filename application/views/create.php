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
        <form method="POST" action="/grafos/Main/inserir">
            <h4>Inserir Evento</h4>
            <br>
            <div class="form-group">
                <label> Título </label>
                <input type="text" class="form-control" name="titulo"/>
            </div>
            <div class="form-group">
                <label> Período </label>
                <div class="row">
                    <div class="col-md-6">
                        de: <input type="number" class="form-control" name="periodo1"/>
                    </div>
                    <div class="col-md-6">
                        até: <input type="number" class="form-control" name="periodo2"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label> Localização </label>
                <input type="text" class="form-control" name="localizacao"/>
            </div>
            <div class="form-group">
                <label> Tema </label>
                <input type="text" class="form-control" name="tema"/>
            </div>
            <div class="form-group">
                <label> Agentes </label>
                <select class="form-control" multiple="multiple" id="agentes" name="agentes[]"></select>
            </div>
            <div class="form-group">
                <label> Conteúdo </label>
                <textarea class="form-control" rows="10" name="conteudo"></textarea>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>