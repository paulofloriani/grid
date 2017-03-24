<?php ini_set('default_charset','utf-8');
foreach ($usuario as $usu): endforeach;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmação Cadastro Usuário</title>
        <!--CSS APOIO-->
        <link href="<?php echo base_url('assets'); ?>/css/apoio.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/js'); ?>/funcoes.js"></script>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/materialize.min.css" media="screen,projection" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets'); ?>/js/materialize.min.js"></script>
        <!--Mascaras-->
        <?php function mask($val, $mask)
        {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
        if($mask[$i] == '#')
        {
        if(isset($val[$k]))
        $maskared .= $val[$k++];
        }
        else
        {
        if(isset($mask[$i]))
        $maskared .= $mask[$i];
        }
        }
        return $maskared;
        }    ?>
        <!--Mascaras JQuery -->
        <script type="text/javascript" src="<?php echo base_url('assets'); ?>/js/jquery.mask.min.js"></script>
        <script type="text/javascript">
        $(function () {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {
        reverse: true
        });
        $('.clear-if-not-match').mask("00/00/0000", {
        clearIfNotMatch: true
        });
        $('.placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
        });
        $('.fallback').mask("00r00r0000", {
        translation: {
        'r': {
        pattern: /[\/]/,
        fallback: '/'
        },
        placeholder: "__/__/____"
        }
        });
        $('.selectonfocus').mask("00/00/0000", {
        selectOnFocus: true
        });
        $('.cep_with_callback').mask('00000-000', {
        onComplete: function (cep) {
        console.log('Mask is done!:', cep);
        },
        onKeyPress: function (cep, event, currentField, options) {
        console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
        },
        onInvalid: function (val, e, field, invalid, options) {
        var error = invalid[0];
        console.log("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
        }
        });
        $('.crazy_cep').mask('00000-000', {
        onKeyPress: function (cep, e, field, options) {
        var masks = ['00000-000', '0-00-00-00'];
        mask = (cep.length > 7) ? masks[1] : masks[0];
        $('.crazy_cep').mask(mask, options);
        }
        });
        $('.cnpj').mask('00.000.000/0000-00', {
        reverse: true
        });
        $('.cpf').mask('000.000.000-00', {
        reverse: true
        });
        $('.money').mask('#.##0,00', {
        reverse: true
        });
        var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
        onKeyPress: function (val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
        };
        $('.sp_celphones').mask(SPMaskBehavior, spOptions);
        $(".bt-mask-it").click(function () {
        $(".mask-on-div").mask("000.000.000-00");
        $(".mask-on-div").fadeOut(500).fadeIn(500)
        })
        $('pre').each(function (i, e) {
        hljs.highlightBlock(e)
        });
        });
        </script>
        
    </head>
    <body>
        <main class="container">
        <?php echo form_open('cadastro/verifica_cadastro_usuario_2') ?>
        <h5 class="header">Preencha abaixo seu dados para o primeiro acesso ao sistema</h5>
        <div class="row" style="margin-top:40px;">
            <div class="input-field col s12 l6">
                <?php echo form_input(array('name'=>'nome','id'=>'input2'),  set_value('nome'),'autofocus placeholder="Insira o nome do Usu&aacute;rio"  ') ?>
                <?php echo form_error('nome'); ?>
                <label>Nome</label>
            </div>
            <div class="input-field col s12 l6">
                <?php echo form_input(array('name'=>'cpf','id'=>'input'),  set_value('cpf'),'maxlength="14" class="cpf" placeholder="Insira o cpf do Usu&aacute;rio"'); ?>
                <?php echo form_error('cpf'); ?>
                <label>CPF</label>
            </div>
            <div class="input-field col s12 l6">
                <?php echo form_input(array('name'=>'email','id'=>'email'),  set_value('email',isset($usu->usu_email)?$usu->usu_email:''),'maxlength="30" readonly placeholder="Insira o E-mail do Usu&aacute;rio" '); ?>
                <?php echo form_error('email'); ?>
                <label>E-mail</label>
            </div>
            <div class="input-field col s12 l6">
                <?php echo form_password(array('name'=>'senha','id'=>'senha'),set_value('senha'),'');
                echo form_error('senha'); ?>
                <label>Informe sua Senha</label>
            </div>
            <div class="input-field col s12 l6">
                <?php echo form_password(array('name'=>'confirma_senha','id'=>'confirma_senha'),set_value('confirma_senha'),'');
                echo form_error('confirma_senha'); ?>
                <label>Confirme a Senha</label>
            </div>
            <div class="input-field col s12 l6">
                <?php echo form_input(array('name'=>'patente','id'=>'patente'),  set_value('patente'),'placeholder="Patente" ');
                echo form_error('patente');?>
                <label>Patente</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <button type="submit" class="waves-effect waves-light btn">Salvar</button>
            </div>
        </div>
        <?php echo form_input(array('name'=>'usu_id','id'=>'usu_id','type'=>'hidden'),  set_value('usu_id',isset($usu->usu_id)?$usu->usu_id:''),'');?>
        <?php echo form_close(); ?>
        </main>
    </body>
</html>