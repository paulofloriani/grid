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
    <body>
        <main class="container">
        <?php echo form_open_multipart(base_url('painel/verifica_registro_ocorrencia'),'name="form_registro_ocorrencia"  '); ?>
        <h5 class="header">Registro de Ocorrência </h5><span style="color:#FF0004;font-weight:normal;float:right; size:10px;">(campos marcados com * são obrigatórios)</span>
        <div class="row" style="margin-top:40px;">
            <!--esquerda-->
            <div class="col s12 l6">
                <div class="input-field col s12">
                    <?php echo form_input(array('name'=>'km','id'=>'km'),  set_value('km'),'autofocus  class="razao" enable placeholder="Informe o KM aproximado do acidente"');?>
                    <?php  echo form_error('km');?>
                    <label>Local da Ocorrência<span class="red-text"><stronger>*</stronger></span></label>
                </div>
                <div class="input-field col s12">
                    <?php echo form_textarea(array('name'=>'veiculos','id'=>'veiculos'),  set_value('veiculos'),'autofocus  class="materialize-textarea" enable placeholder="Descrição"');?>
                    <?php  echo form_error('veiculos');?>
                    <label>Informe se houve outro(s) veículos envolvidos no acidente<span class="red-text"><stronger>*</stronger></span></label>
                </div>
                <div class="input-field col s12 l3">
                    <h6 class="header">Vítimas no Local?<span class="red-text"><stronger>*</stronger></span></h6>
                    <p>
                        <?php $vitimas = array('name'=>'vitimas',
                        'id'          => 'vitimas1',
                        'value'       => 1,
                        'checked'     => (set_value('vitimas') === '1' ? TRUE : FALSE));
                        echo form_radio($vitimas);?>
                        <label for="vitimas1">Sim</label>
                        <?php $vitimas = array('name'=>'vitimas',
                        'id'          => 'vitimas2',
                        'value'       => 0,
                        'checked'     => (set_value('vitimas') === '0' ? TRUE : FALSE));
                        echo form_radio($vitimas);?>
                        <label for="vitimas2">Não</label>
                        <?php  echo form_error('vitimas');?>
                    </p>
                </div>
                <div class="input-field col s12 l9">
                    <?php echo form_input(array('name'=>'n_vitimas','id'=>'n_vitimas'),  set_value('n_vitimas'),'autofocus enable placeholder="Informe o número de vítimas"');?>
                </div>
                <div class="input-field col s12">
                    <h6 class="header">Condições do Tráfego<span class="red-text"><stronger>*</stronger></span></h6>
                    <p>
                        <?php $trafego = array('name'     => 'trafego',
                        'id'          => 'trafego1',
                        'value'       => 1,
                        'checked'     => (set_value('trafego') === '1' ? TRUE : FALSE),
                        );
                        echo form_radio($trafego);  ?>
                        <label for="trafego1">Livre</label>
                        
                        <?php $trafego = array('name'     => 'trafego',
                        'id'          => 'trafego2',
                        'value'       => 0,
                        'checked'     => (set_value('trafego') === '0' ? TRUE : FALSE));
                        echo form_radio($trafego);    ?>
                        <label for="trafego2">Congestionado</label>
                    </p>
                    <?php  echo form_error('trafego');?>
                </div>
                <div class="input-field col s12">
                    <h6 class="header">Condições do Clima<span class="red-text"><stronger>*</stronger></span></h6>
                    <p>
                        <?php $clima = array('name' => 'clima',
                        'id'          => 'clima1',
                        'value'       => 0,
                        'checked'     => (set_value('clima') === '0' ? TRUE : FALSE),
                        );
                        echo form_radio($clima);  ?>
                        <label for="clima1">Está Chovendo</label>
                        <?php $clima = array('name' => 'clima',
                        'id'          => 'clima2',
                        'value'       => 1,
                        'checked'     => (set_value('clima') === '1' ? TRUE : FALSE));
                        echo form_radio($clima);    ?>
                        <label for="clima2">Choveu</label>
                        <?php $clima = array('name'=> 'clima',
                        'id'          => 'clima3',
                        'value'       => 2,
                        'checked'     => (set_value('clima') === '2' ? TRUE : FALSE));
                        echo form_radio($clima);    ?>
                        <label for="clima3">Tempo Limpo</label>
                    </p>
                    <?php  echo form_error('clima');?>
                </div>
            </div>
            <!--direita-->
            <div class="col s12 l6">
                <div class="input-field col s12">
                    <?php echo form_input(array('name'=>'produto','id'=>'produto'),  set_value('produto'),'autofocus class="razao" enable placeholder="Informe o número do Produto"'); ?>
                    <?php  echo form_error('produto');?>
                    <label>Produtos Envolvidos<span class="red-text"><stronger>*</stronger></span></label>
                </div>
                
                <div class="input-field col s6">
                    <h6 class="header">Caracteristicas da Região</h6>
                    <p>
                        <?php echo form_checkbox('regiao_moradia', 1, set_value('regiao_moradia'),'id="regiao_moradia" ');    echo form_error('regiao_moradia');?>
                        <label for="regiao_moradia">Moradias</label>
                    </p>
                    
                    <p>
                        <?php echo form_checkbox('regiao_ind',1, set_value('regiao_ind'),'id="regiao_ind" ');    echo form_error('regiao_ind');?>
                        <label for="regiao_ind">Industrias</label>
                    </p>
                </div>
                <div class="input-field col s16">
                    <h6 class="header">Estão no local ou já foram acionados</h6>
                    <p>
                        <?php echo form_checkbox('prf', 1, set_value('prf'),'id="prf" ');    echo form_error('prf');?>
                        <label for="prf">Polícia Rodoviária Federal</label>
                    </p>
                    
                    <p>
                        <?php echo form_checkbox('defciv', 1, set_value('defciv'),'id="defciv" ');    echo form_error('defciv');?>
                        <label for="defciv">Defesa Civil</label>
                    </p>
                    
                    <p>
                        <?php echo form_checkbox('dnit', 1, set_value('dnit'),'id="dnit" ');    echo form_error('dnit');?>
                        <label for="dnit">DNIT</label>
                    </p>
                    
                </div>
                <div class="input-field col s12">
                    <h6 class="header">Ocorrência de incêndios, explosão e liberação de produtos na atmosfera?</h6>
                    <p>
                        <?php echo form_checkbox('explosao', 1, set_value('explosao'),'id="explosao" ');    ?>
                        <label for="explosao">Explosão</label>
                    </p>
                    
                    
                    <p>
                        <?php echo form_checkbox('incendio', 1 , set_value('incendio'),'id="incendio"');    ?>
                        <label for="incendio">Incêndio</label>
                    </p>
                    
                    <p>
                        <?php echo form_checkbox('ar', 1, set_value('ar'),'id="ar"');?>
                        <label for="ar">Liberação de produto no ar</label>
                    </p>
                    
                </div>
                <div class="input-field col s12" style="margin-top: 40px;">
                    <?php echo form_input(array('name'=>'nome_informante','id'=>'nome_informante'),  set_value('nome_informante'),'  ');
                    echo form_error('nome_informante');     ?>
                    <label>Nome do Contato</label>
                </div>
                <div class="input-field col s12">
                    <?php echo form_input(array('name'=>'telefone_informante','id'=>'telefone_informante'),  set_value('telefone_informante'),'  ');
                    echo form_error('telefone_informante');     ?>
                    <label>Telefone</label>
                </div>
            </div>
        </div>
        <!--botões-->
        <div class="row">
            <div class="col s12 right-align">
                <a href="<?php echo base_url('painel'); ?>">
                    <button type="button" name="Button" class="waves-effect waves-light btn red">Cancelar</button>
                </a>
                <button type="submit" name="Submit" class="waves-effect waves-light btn" value="Salvar">Salvar</button>
            </div>
        </div>
        <?php echo form_input(array('name'=>'usu_id','id'=>'usu_id','type'=>'hidden'),set_value('usu_id',isset($usuario->usu_id)?$usuario->usu_id:''),'')?>
        <?php echo form_close(); ?>
        </main>
    </body>
    
</html>