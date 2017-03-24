<?php ini_set('default_charset','utf-8'); 
foreach ($sessao_usuario as $usuario): endforeach;
foreach ($produto as $prod): endforeach;
?>
    <!DOCTYPE html>
    <!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-59-1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Editar produto <?php echo $prod->nome ?></title>
        <link href="<?php echo base_url('assets/css/css_footer.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets'); ?>/css/css_verde.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets'); ?>/css/css_formas.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets'); ?>/css/tooltip.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/js'); ?>/funcoes.js"></script>


    </head>

    <body>


        <main class="container">
            <?php echo form_open_multipart(base_url('painel/editar_registro_produto'),'name="form_registro_produto"  '); ?>
                <h5 class="header">Editar produto </h5><span style="color:#FF0004;font-weight:normal;float:right; size:10px;">(campos marcados com * são obrigatórios)</span>
                <div class="row  right-align" style="margin-top:40px;">

                    <div class="input-field col s6">

                        <?php echo form_input(array('name'=>'onu','id'=>'onu'),  set_value('onu',isset($prod->onu)?$prod->onu:''),'autofocus enable placeholder="Informe o número da ONU do produto"');?>
                            <?php  echo form_error('onu');?>
                                <label>ONU<span class="red-text"><stronger>*</stronger></span></label>
                    </div>
                    <div class="input-field col s6">

                        <?php echo form_input(array('name'=>'classe','id'=>'classe'),  set_value('classe',isset($prod->classe)?$prod->classe:''),'autofocus enable placeholder="Informe o número da classe do produto"');?>
                            <?php  echo form_error('classe');?>
                                <label>Classe<span class="red-text"><stronger>*</stronger></span></label>
                    </div>
                    <div class="input-field col s6">

                        <?php echo form_input(array('name'=>'guia','id'=>'guia'),  set_value('guia',isset($prod->guia)?$prod->guia:''),'autofocus  enable placeholder="Informe o número do GUIA do produto"');?>
                            <?php  echo form_error('guia');?>
                                <label>Número GUIA<span class="red-text"><stronger>*</stronger></span></label>
                    </div>
                    <div class="input-field col s6">

                        <?php echo form_input(array('name'=>'nome','id'=>'nome'),  set_value('nome',isset($prod->nome)?$prod->nome:''),'autofocus  enable placeholder="Informe o nome do produto"');?>
                            <?php  echo form_error('nome');?>
                                <label>Nome do Produto<span class="red-text"><stronger>*</stronger></span></label>
                    </div>
                    <div class="input-field col s6 right">
                        <p>
                            <?php echo form_checkbox('reag_agua', 1, set_value('reag_agua',isset($prod->reag_agua)?$prod->reag_agua:''),'id="reag_agua" onclick="desmarcar_regiao_nenhum()"');    echo form_error('reag_agua');?>
                                <label for="reag_agua">Marque se o produto reage à água</label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align">

                        <?php echo form_input(array('name'=>'usu_id','id'=>'usu_id','type'=>'hidden'),set_value('usu_id',isset($usuario->usu_id)?$usuario->usu_id:''),''); 
                              echo form_input(array('name'=>'produto_id','id'=>'produto_id','type'=>'hidden'),set_value('produto_id',isset($prod->produto_id)?$prod->produto_id:''),'');?>

                            <a href="<?php echo base_url('painel/lista_produtos'); ?>" class="waves-effect waves-light btn red">Cancelar</a>
                            <button type="submit" name="Submit" class="waves-effect waves-light btn" value="Salvar">Atualizar</button>

                    </div>
                </div>

                <?php echo form_close(); ?>
        </main>

    </body>

    </html>