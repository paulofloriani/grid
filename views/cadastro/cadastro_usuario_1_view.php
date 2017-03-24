<?php ini_set('default_charset','utf-8'); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <title>Cadastrar Usuário</title>
    <body>
        <main class="container">
        <?php echo form_open('cadastro/verifica_cadastro_usuario_1') ?>
        <h5 class="header">Registro de Novo Usuário</h5>
        <div class="row" style="margin-top:40px;">
            <div class="input-field col s12 l6">
                <?php echo form_input(array('name'=>'nome','id'=>'nome'),  set_value('nome'),' placeholder="Insira o nome do usuário" '); ?>
                <?php echo form_error('nome'); ?>
                <label>Nome</label>
            </div>
            <div class="input-field col s12 l6">
                <?php echo form_input(array('name'=>'email','id'=>'email'),  set_value('email'),' placeholder="Insira o E-mail do usuário" '); ?>
                <?php echo form_error('email'); ?>
                <label>E-mail</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a type="button" name="Button" class="waves-effect waves-light btn red" href="<?php echo base_url('painel'); ?>">Voltar</a>
                <button type="submit" class="waves-effect waves-light btn">Salvar</button>
            </div>
        </div>
        <?php echo form_close(); ?>
        </main>
    </body>
</html>