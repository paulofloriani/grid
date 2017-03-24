<?php foreach ($sessao_usuario as $usuario): endforeach;?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
    <!--CSS APOIO-->
    <link href="<?php echo base_url('assets'); ?>/css/apoio.css" rel="stylesheet" type="text/css" />
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/materialize.min.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/js/materialize.min.js"></script>
    <!--controle das checkboxes no registro de ocorrência -->
    <script src="<?php echo base_url('assets/js'); ?>/funcoes.js"></script>
    <!--Editor de Texto-->
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
    selector: '#notificacao'
    , height: 300
    , language: 'pt_BR'
    , theme: 'modern'
    , content_css: "<?php echo base_url('assets'); ?>/css/tinymce.css"
    , plugins: [
    'save advlist autolink lists charmap hr anchor pagebreak'
    , 'searchreplace visualblocks visualchars code fullscreen'
    , 'insertdatetime nonbreaking save table contextmenu directionality'
    , 'emoticons template paste textcolor colorpicker textpattern imagetools'
    ]
    , toolbar1: 'undo redo | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist outdent indent | link image'
    , image_advtab: true
    , templates: "<?php echo base_url('licenciamento/templates/1');?>"
    , });
    tinymce.init({
    selector: '#desc_lic'
    , height: 300
    , language: 'pt_BR'
    , theme: 'modern'
    , content_css: "<?php echo base_url('assets'); ?>/css/tinymce.css"
    , plugins: [
    'save advlist autolink lists charmap hr anchor pagebreak'
    , 'searchreplace visualblocks visualchars code fullscreen'
    , 'insertdatetime nonbreaking save table contextmenu directionality'
    , 'emoticons template paste textcolor colorpicker textpattern imagetools'
    ]
    , toolbar1: 'undo redo | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist outdent indent | link image'
    , image_advtab: true
    , templates: "<?php echo base_url('licenciamento/templates/1');?>"
    , });
    tinymce.init({
    selector: '#condicionante'
    , height: 300
    , language: 'pt_BR'
    , theme: 'modern'
    , content_css: "<?php echo base_url('assets'); ?>/css/tinymce.css"
    , plugins: [
    'save advlist autolink lists charmap hr anchor pagebreak'
    , 'searchreplace visualblocks visualchars code fullscreen'
    , 'insertdatetime nonbreaking save table contextmenu directionality'
    , 'emoticons template paste textcolor colorpicker textpattern imagetools'
    ]
    , toolbar1: 'undo redo | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist outdent indent | link image'
    , image_advtab: true
    , templates: "<?php echo base_url('licenciamento/templates/2');?>"
    , });
    tinymce.init({
    selector: '#infos'
    , height: 300
    , language: 'pt_BR'
    , theme: 'modern'
    , content_css: "<?php echo base_url('assets'); ?>/css/tinymce.css"
    , plugins: [
    'save advlist autolink lists charmap hr anchor pagebreak'
    , 'searchreplace visualblocks visualchars code fullscreen'
    , 'insertdatetime nonbreaking save table contextmenu directionality'
    , 'emoticons template paste textcolor colorpicker textpattern imagetools'
    ]
    , toolbar1: 'undo redo | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist outdent indent | link image'
    , image_advtab: true
    , templates: "<?php echo base_url('licenciamento/templates/3');?>"
    , });
    </script>
    <!--DataPicker JS-->
    <!--Avisos-->
    <?php if(isset($msg) and $msg == 1):
    echo "  <script type=\"text/javascript\">
    $(document).ready(function() {
    Materialize.toast('<i class=\"material-icons left red-text\">report</i><strong>$mensagem</strong>', 6000, 'white black-text');
    });
    </script>";
    endif;
    ?>
    <!--DataTable JS-->
    <script type="text/javascript">
    $(document).ready(function () {
    var table = $('#example').DataTable({
    lengthChange: false
    , "bAutoWidth": false
    , buttons: {
    buttons: [{
    extend: 'print'
    , text: '<i class="material-icons small ">print</i>'
    , titleAttr: 'imprimir'
    , className: 'btn  tooltipped left'
    , }, {
    extend: 'excel'
    , text: '<i class="material-icons small ">insert_drive_file</i>'
    , titleAttr: 'Excel'
    , className: 'btn  tooltipped left'
    , marginLeft: '10'
    , }
    , ]
    }
    , "oLanguage": {
    "sProcessing": "Aguarde enquanto os dados são carregados ..."
    , "sLengthMenu": "Mostrar _MENU_ registros por pagina"
    , "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado"
    , "sInfoEmtpy": "Sem registros na tabela"
    , "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros"
    , "sInfoFiltered": ""
    , "sSearch": "Procurar"
    , "oPaginate": {
    "sFirst": "Primeiro"
    , "sPrevious": "<i class='material-icons'>chevron_left</i>"
    , "sNext": "<i class='material-icons'>chevron_right</i>"
    , "sLast": "Último"
    }
    }
    , });
    table.page.len(8).draw();
    table.buttons().container().insertBefore('#example_filter');
    });
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/dataTables.jqueryui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/buttons.jqueryui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/dataTable/js/buttons.print.min.js"></script>
    <!--Menu Lateral-->
    <script>
    $(document).ready(function () {
    $('select').material_select();
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'dd/mm/yyyy'
    , });
    $.datepicker.setDefaults($.datepicker.regional["pt-BR"]);
    $('.collapsible').collapsible({
    accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    function doAfterChange() {
    Materialize.updateTextFields();
    }
    });
    </script>
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
    pattern: /[\/]/
    , fallback: '/'
    }
    , placeholder: "__/__/____"
    }
    });
    $('.selectonfocus').mask("00/00/0000", {
    selectOnFocus: true
    });
    $('.cep_with_callback').mask('00000-000', {
    onComplete: function (cep) {
    console.log('Mask is done!:', cep);
    }
    , onKeyPress: function (cep, event, currentField, options) {
    console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
    }
    , onInvalid: function (val, e, field, invalid, options) {
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
    }
    , spOptions = {
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
<!--DIV TEXTO SUPERIOR-->
<div id="conteudo3" style="height:30px;background-color:#FFFFFF;background-image:none; border:none; font-size:16px;font-weight:bold;text-align:center;line-height:30px;color:#000000">
    PROGRAMA DE MITIGAÇÃO DE ACIDENTES ENVOLVENDO TRANSPORTE RODOVIÁRIO DE PRODUTOS PERIGOSOS NA BR-101, TRECHO ENTRE OSÓRIO E TORRES/RS
</div>
<!--FIM TEXTO SUPERIOR-->
<!-- Dropdown Structure -->
<ul id="drop_settings" class="dropdown-content" style="min-width:300px;margin-top:64px;text-transform: uppercase !important">
    <li><a href="#">ATUALIZAR DADOS</a></li>
    <?php if($usuario->usu_nivel == 0): ?>
    <li>
        <a href="<?php echo base_url('painel/altera_capitao')?>">ALTERAÇÃO DE CAPITÃO DO CB</a>
    </li>
    <li>
        <a href="<?php echo base_url('painel/admin')?>">GESTÃO DE OPERADORES</a>
    </li>
    
    <?php endif;?>
    <li><a href="<?php echo base_url('login/logout');?>"><i class="material-icons right">exit_to_app</i>DESLOGAR</a></li>
</ul>
<ul id="drop_relatorios" class="dropdown-content" style="min-width:450px;margin-top:64px;text-transform: uppercase !important">
    <li>
    <blockquote>MAPAS</blockquote>
</li>
<li><a href="arquivos/MAPAS/01 - Mapa_Localizacao_a2.pdf" target="new">LOCALIZAÇÃO</a></li>
<li><a href="arquivos/MAPAS/02 - Mapa_Cobertura_Vegetal_PAE_a2.pdf" target="new">COBERTURA VEGETAL</a></li>
<li><a href="arquivos/MAPAS/03 - Mapa_Uso_do_solo_a2.pdf" target="new">USO DO SOLO</a></li>
<li><a href="arquivos/MAPAS/04_Mapa_Obras_de_Arte_e_Saidas_a2.pdf" target="new">OBRAS DE ARTE</a></li>
<li><a href="arquivos/MAPAS/05 - Mapa_Pontos_de_localizacao_a2.pdf" target="new">PONTOS CRÍTICOS</a></li>
<li><a href="arquivos/MAPAS/06 - Mapa_Atendimento_a22.pdf" target="new">PONTOS DE INTERESSE</a></li>
<li><a href="#" target="new">INFRAESTRUTURA</a></li>
<li><a href="arquivos/MAPAS/07- Mapa_AcidentesPP_4_a2.pdf" target="new">ACIDENTES</a></li>
<li class="divider"></li>
<li>
<blockquote>PRODUTOS PERIGOSOS</blockquote>
</li>
<li><a href="#" target="new">IDENTIFICAÇÃO DE PRODUTOS PERIGOSOS</a></li>
<li><a href="#" target="new">PRODUTOS PERIGOSOS NO TRECHO</a></li>
<li><a href="#" target="new">PLANO DE AÇÃO EMERGENCIAL - PAE</a></li>
<li class="divider"></li>
<li>
<blockquote>INFRAESTRURUA DE APOIO</blockquote>
</li>
<li><a href="<?php echo base_url('painel/orgaos')?>" >ÓRGÃOS PARTICIPANTES DO PLANO</a></li>
<li><a href="#" target="new">SISTEMA DE SAÚDE</a></li>
<li class="divider"></li>
<li>
<a href="#" target="new">
INDICADORES DO SISTEMA
</a>
</li>
<li>
<a href="#" target="new">
FEPAM
</a>
</li>
<li>
<a href="#" target="new">
HISTÓRICO DE ACIDENTES
</a>
</li>
</ul>
<ul id="drop_guias" class="dropdown-content" style="min-width:300px;margin-top:64px;text-transform: uppercase !important">
<li><a href="<?php echo base_url('painel/lista_guias') ?>">LISTA DE GUIAS</a></li>
<li><a href="<?php echo base_url('painel/registro_guia') ?>">REGISTRO DE NOVO GUIA</a></li>
</ul>
<ul id="drop_produtos" class="dropdown-content" style="min-width:300px;margin-top:64px;text-transform: uppercase !important">
<li><a href="<?php echo base_url('painel/lista_produtos') ?>">LISTA DE PRODUTOS</a></li>
<li><a href="<?php echo base_url('painel/registro_produto') ?>">REGISTRO DE NOVO PRODUTO</a></li>
</ul>
<ul id="drop_ocorrencias" class="dropdown-content" style="min-width:300px;margin-top:64px;text-transform: uppercase !important">
<li><a href="<?php echo base_url('painel/registro_ocorrencia') ?>">NOVO INCIDENTE - FASE 1</a></li>
<li><a href="<?php echo base_url('painel/registro_produto') ?>">REGISTRO FASE 2</a></li>
</ul>
<!-- FIM Dropdown Structure -->
<nav style="text-transform: uppercase !important">
<div class=" nav-wrapper ">
<!--MENU DA DIREITA -->
<ul class="right hide-on-med-and-down ">
<li>
<?php echo $usuario->usu_nome; ?> </span>
| <?php if($usuario->usu_nivel == 0): echo "ADM"; else: echo "OPER"; endif;?>
</li>
<!-- Dropdown Trigger -->
<li><a class="dropdown-button" href="#! " data-activates="drop_settings"><i class="material-icons left ">settings</i></a></li>
</ul>
<!--FIM MENU DA ESQUERDA -->
<!--MENU DA ESQUERDA -->
<ul class="left hide-on-med-and-down ">
<li>
<a href="<?php echo base_url('painel') ?>" ><i class="material-icons left">home</i>MAPA</a>
</li>
<li>
<a class="dropdown-button" href="#! " data-activates="drop_relatorios"><i class="material-icons right">arrow_drop_down</i>RELATÓRIOS</a>
</li>
<li>
<a class="dropdown-button" href="#! " data-activates="drop_ocorrencias" ><i class="material-icons right">arrow_drop_down</i>REGISTRO DE ACIDENTE</a>
</li>
<li>
<a class="dropdown-button" href="#! " data-activates="drop_guias"><i class="material-icons right">arrow_drop_down</i>GUIAS DE EMERGÊNCIA</a>
</li>
<li>
<a class="dropdown-button" href="#! " data-activates="drop_produtos"><i class="material-icons right">arrow_drop_down</i>PRODUTOS</a>
</li>
</ul>
<!--FIM MENU DA DIREITA -->
</div>
</nav>