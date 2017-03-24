<?php ini_set('default_charset','utf-8');
foreach ($sessao_usuario as $usuario): endforeach;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <title>Registro de Nova GUIA</title>
  <body>
    <main class="container">
    <?php echo form_open_multipart(base_url('painel/verifica_registro_guia'),'name="form_registro_guia"  '); ?>
    <h5 class="header">Registro de GUIA </h5><span style="color:#FF0004;font-weight:normal;float:right; size:10px;">(campos marcados com * são obrigatórios)</span>
    <div class="row" style="margin-top:40px;">
      <div class="col s12 card">
        <h5 class="header">Dados Gerais</h5>
        <div class="row">
          <div class="input-field col s12">
            <?php echo form_input(array('name'=>'guia','id'=>'guia'),  set_value('guia'),'autofocus  class="razao"  enable placeholder="Informe o número da GUIA"');?>
            <?php echo form_error('guia'); ?>
            <label>Número do GUIA<span class="red-text"><stronger>*</stronger></span></label>
          </div>
          <div class="input-field col s12">
            <?php echo form_input(array('name'=>'guia_desc','id'=>'guia_desc'),  set_value('guia_desc'),'placeholder="Informe a descrição da GUIA"');?>
            <?php  echo form_error('guia_desc');?>
            <label>Descrição do GUIA<span class="red-text"><stronger>*</stronger></span></label>
          </div>
          <div class="col s12">
            <h5 class="header">Perigos Potenciais</h5>
          </div>
          <div class="input-field col s12">
            <?php echo form_textarea(array('name'=>'1_1','id'=>'1_1'),  set_value('1_1'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
            <?php  echo form_error('1_1');?>
            <label>Fogo ou Explosôes<span class="red-text"><stronger>*</stronger></span></label>
          </div>
          <div class="input-field col s12">
            <?php echo form_textarea(array('name'=>'1_2','id'=>'1_2'),  set_value('1_1'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
            <?php  echo form_error('1_2');?>
            <label>Perigos à Saúde<span class="red-text"><stronger>*</stronger></span></label>
          </div>
        </div>
      </div>
      
      <div class="col s12 card">
        <h5 class="header">Segurança Pública</h5>
        <div class="row">
            <div class="input-field col s12">
              <?php echo form_textarea(array('name'=>'2_','id'=>'2_'),  set_value('2_'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
              <?php  echo form_error('2_');?>
              <label>Observações Gerais<span class="red-text"><stronger>*</stronger></span></label>
            </div>
            <div class="input-field col s12">
              <?php echo form_textarea(array('name'=>'2_1','id'=>'2_1'),  set_value('1_1'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
              <?php  echo form_error('2_1');?>
              <label>Vestimenta de Proteção<span class="red-text"><stronger>*</stronger></span></label>
            </div>
            <div class="input-field col s12">
              <?php echo form_textarea(array('name'=>'2_2_1','id'=>'2_2_1'),  set_value('1_1'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
              <?php  echo form_error('2_2_1');?>
              <label>Derramamento<span class="red-text"><stronger>*</stronger></span></label>
            </div>
            <div class="input-field col s12">
              <?php echo form_textarea(array('name'=>'2_2_2','id'=>'2_2_2'),  set_value('1_1'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
              <?php  echo form_error('2_2_2');?>
              <label>Derramamento<span class="red-text"><stronger>*</stronger></span></label>
            </div>
        </div>
      </div>
      <div class="col s12 card">
        <h5 class="header">Ação de Emergência</h5>
        <div class="row">
          <div class="input-field col s12">
            <?php echo form_textarea(array('name'=>'3_1','id'=>'3_1'),  set_value('3_1'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
            <?php  echo form_error('3_1');?>
            <label>Fogo<span class="red-text"><stronger>*</stronger></span></label>
          </div>
          <div class="input-field col s12">
            <?php echo form_textarea(array('name'=>'3_2','id'=>'3_2'),  set_value('3_2'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
            <?php  echo form_error('3_2');?>
            <label>Vazamento ou Derramamento<span class="red-text"><stronger>*</stronger></span></label>
          </div>
          <div class="input-field col s12">
            <?php echo form_textarea(array('name'=>'3_3','id'=>'3_3'),  set_value('3_3'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
            <?php  echo form_error('3_3');?>
            <label>Primeiros Socorros<span class="red-text"><stronger>*</stronger></span></label>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 right-align ">
        <a class="waves-effect waves-light btn red" href="<?php echo base_url('painel/lista_guias');?>">cancelar</a>
        <button type="submit" name="Submit" class="waves-effect waves-light btn" value="Salvar">Salvar</button>
      </div>
    </div>
    <?php echo form_input(array('name'=>'usu_id','id'=>'usu_id','type'=>'hidden'),set_value('usu_id',isset($usuario->usu_id)?$usuario->usu_id:''),'')?>
    <?php echo form_close(); ?>
    </main>
  </body>
</html>