<?php ini_set('default_charset','utf-8');
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
        <meta charset="UTF-8">
        <title></title>
        <link href="<?php echo base_url('assets'); ?>/css/css_formas.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/css_footer.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets'); ?>/css/css_verde.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets'); ?>/css/css_print.css" rel="stylesheet" type="text/css" />
        
        <SCRIPT LANGUAGE="JavaScript">
        <!-- Begin
        function imprimir(text){
        text=document
        print(text)
        }
        //  End -->
        </script>
    </head>
    <body>
        <!--modal confirma excluir-->
        <div id="modal-excluir" class="modal modal-fixed-footer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; height: 30%; width: 40%">
            <?php echo form_open(base_url('painel/deletar_produto/'),'name="form_editar_produto"  '); ?>
                <div class="modal-content center-align">
                    <input type="hidden" id="" name="produto_id" value="<?php echo $prod->produto_id ?>" />
                    <div class="container">
                        <h5>Deseja realmente excluir este produto?</h5><br><h6> A ação não poderá ser desfeita.</h6>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-action modal-close btn-flat waves-effect waves-light" aria-hidden="true">Não</button>
                    <button class="modal-action modal-close btn-flat waves-effect waves-light ">Sim</button>
                </div>
            <?php echo form_close()?>
        </div>
        <!--fim modal confirma excluir-->
        <!--dropdown editar e excluir-->
        <ul id="drop_acoes" class="dropdown-content" style="min-width:150px;margin-top:40px;text-transform: uppercase !important">
            <li><a href="<?php echo base_url('painel/editar_produto/'.$prod->produto_id) ?>"><i class="material-icons left">edit</i>editar</a></li>
            <li><a href="#modal-excluir" data-toggle="modal" class="red-text modal-trigger"><i class="material-icons left">delete</i>excluir</a></li>
            
        </ul>
        <!--fim dropdown editar e excluir-->
        <main class="container">
        <div class="row" style="margin-top:40px">
            <div class="col s12 right-align">
                <a href="<?php echo base_url('painel/lista_produtos'); ?>" class="waves-effect waves-light btn">Voltar</a>
                <a class="dropdown-button waves-effect waves-light btn tooltipped" href="#! " data-activates="drop_acoes" data-position="right" data-delay="0" data-tooltip="Ferramentas"><i class="material-icons">more_horiz</i></a>
            </div>
            <div class="col s12">
                <h5><i class="material-icons amber-text left">poll</i><span style="font-weight:bold"><?php echo $prod->nome ?></span> - ONU <?php echo $prod->onu ?> | Classe - <?php echo $prod->classe ?> | <span class="green-text"><strong><?php if ($prod->reag_agua == 1):echo "Produto reagente à água"; endif; ?></strong></span></h5>
                
                
                <span id="titulo" style="width:100%; font-weight:normal; text-align:left"><span style="font-weight:bold"></span> </span>
                
            </div>
            <div class="col s12">
                <h5><i class="material-icons amber-text left">book</i>GUIA <?php echo $prod->guia?> - <?php echo $prod->guia_desc ?></h5>
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active"><i class="material-icons amber-text">warning</i>PERIGOS POTENCIAIS</div>
                        <div class="collapsible-body" style="padding:20px;">
                        <blockquote>FOGO OU EXPLOSÃO</blockquote>
                        <?php echo $prod->{'1_1'} ?>
                    <blockquote>PERIGOS À SAÚDE</blockquote>
                    <?php echo $prod->{'1_2'} ?>
                </div>
            </li>
            <li>
                <div class="collapsible-header active"><i class="material-icons amber-text">warning</i>SEGURANÇA PÚBLICA</div>
                <div class="collapsible-body" style="padding:20px;">
                    <blockquote><span style="font-style: italic;"><?php echo $prod->{'2_'} ?></span> </blockquote>
                <blockquote>VESTIMENTAS DE PROTEÇÃO</blockquote>
                <?php echo $prod->{'2_1'} ?>
            <blockquote>EVACUAÇÃO</blockquote>
            <?php echo $prod->{'2_2_1'} ?>
            <br>
            <?php echo $prod->{'2_2_2'} ?>
        </div>
    </li>
    <li>
        <div class="collapsible-header active"><i class="material-icons amber-text">warning</i>AÇÃO DE EMERGÊNCIA</div>
        <div class="collapsible-body" style="padding:20px;">
        <blockquote>FOGO</blockquote>
        <?php echo $prod->{'3_1'} ?>
    <blockquote>VAZAMENTO OU DERRAMAMENTO</blockquote>
    <?php echo $prod->{'3_2'} ?>
<blockquote>PRIMEIROS SOCORROS</blockquote>
<?php echo $prod->{'3_3'} ?>
</div>
</li>
</ul>
</div>
</div>
</main>
</body>
</html>