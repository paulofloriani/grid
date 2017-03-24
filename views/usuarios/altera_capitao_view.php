<?php ini_set('default_charset','utf-8'); ?>
    <!DOCTYPE html>
    <html>
        <title>Cadastro de Úsuario</title>
       

    <body>

<main class="container">
        <?php echo form_open('painel/valida_capitao') ?>
        <h5 class="header">Registro de Novo Capitão</h5>
        <div class="row" style="margin-top:40px;">
            <div class="input-field col s12">
                <?php echo form_input(array('name'=>'email','id'=>'email'),  set_value('email'),'placeholder="Insira o E-mail do novo Capitão" '); ?>
                <?php echo form_error('email'); ?>
                <label>E-mail</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a type="button" name="Button" class="waves-effect waves-light btn red" href="<?php echo base_url('painel'); ?>">Voltar</a>
                <button type="submit" class="waves-effect waves-light btn">Enviar</button>
            </div>
        </div>
        <?php echo form_close(); ?>
        </main>


    </body>

    </html>