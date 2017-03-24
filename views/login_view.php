<?php ini_set('default_charset','utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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
        
        
    </head>
    <!--DIV TEXTO SUPERIOR-->
    <div id="conteudo3" style="height:30px;background-color:#FFFFFF;background-image:none; border:none; font-size:16px;font-weight:bold;text-align:center;line-height:30px;color:#000000">
        PROGRAMA DE MITIGAÇÃO DE ACIDENTES ENVOLVENDO TRANSPORTE RODOVIÁRIO DE PRODUTOS PERIGOSOS NA BR-101, TRECHO ENTRE OSÓRIO E TORRES/RS
    </div>
    <!--FIM TEXTO SUPERIOR-->
    <!-- Dropdown Structure -->
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
    <blockquote>ANÁLISE DE VULNERABILIDADE</blockquote>
</li>
<li><a href="#" target="new">METODOLOGIA</a></li>
<li><a href="#" target="new">RESULTADOS</a></li>
<li class="divider"></li>
<li>
<blockquote>PRODUTOS PERIGOSOS</blockquote>
</li>
<li><a href="#" target="new">MANUAL DO ABIQUIM</a></li>
<li><a href="#" target="new">IDENTIFICAÇÃO DE PRODUTOS PERIGOSOS</a></li>
<li><a href="#" target="new">PRODUTOS PERIGOSOS NO TRECHO</a></li>
<li><a href="#" target="new">PROCEDIMENTOS DE SEGURANÇA</a></li>
<li><a href="#" target="new">PROCEDIMENTOS PARA ATENDIMENTO</a></li>
<li class="divider"></li>
<li>
<blockquote>INFRAESTRURUA DE APOIO</blockquote>
</li>
<li><a href="#" target="new">ÓRGÃOS PARTICIPANTES DO PLANO</a></li>
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
<!-- FIM Dropdown Structure -->
<nav style="text-transform: uppercase !important">
<div class=" nav-wrapper ">
<!--MENU DA DIREITA -->
<ul class="right hide-on-med-and-down ">
<?php echo form_open('login/verifica_login'); ?>
<li style="margin-right:10px;">
<?php echo form_input(array('name'=>'login','id'=>'login'), set_value('name'),'placeholder="E-mail" ');
echo form_error('login')?>
</li>
<!-- Dropdown Trigger -->
<li style="margin-right:15px;"><?php echo form_password(array('name'=>'senha','id'=>'senha'), set_value(),'placeholder="Senha"  ');
echo form_error('senha')?></li>
<li><button type="submit" class="waves-effect waves-light btn">Entrar</button></li>
<li><a href="<?php echo base_url('/cadastro/cadastro_usuario_1/') ?>" class="waves-effect waves-light btn">Primeiro Acesso</a></li>
<?php form_close(); ?>
</ul>
<!--FIM MENU DA ESQUERDA -->
<!--MENU DA ESQUERDA -->
<ul class="left hide-on-med-and-down ">
<li>
    <a class="dropdown-button" href="#! " data-activates="drop_relatorios"><i class="material-icons right">arrow_drop_down</i>RELATÓRIOS</a>
</li>
</ul>
<!--FIM MENU DA ESQUERDA -->
</div>
</nav>


<body bgcolor="#ffffff" ; style="overflow:hidden">
<iframe src="https://www.google.com/maps/d/embed?mid=18LppgBrdrHBDxm6PLmWqaHG9jkA" width="100%"  style="margin-top:-10px; border:none"></iframe>
</body>
</html>