<?php ini_set('default_charset','utf-8');
foreach ($ocorrencia as $ocor): endforeach;
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
        
        <main class="container">
        <div id="dados">
            <div id="bloco_inteiro">
                <div id="titulo" style="width:99%; text-align:center; color:#5D5D5D; background-color:#ccc ; margin-top: 20px;">PLANO EMERGÊNCIAL DE RESPOSTA
                    
                    <div class="fixed-action-btn horizontal">
                        <a class="btn-floating btn-large red tooltipped" onclick="imprimir()" data-position="left" data-delay="50" data-tooltip="Imprimir">
                            <i class="large material-icons">print</i>
                        </a>
                    </div>
                </div>
                <div style="width:100%;text-align:left"><!--DIV LOCAL-->
                <div id="titulo" style="width:99%; text-align:left; color:#5D5D5D; background-color:#ccc; "><blockquote>INFORMAÇÕES GERAIS</blockquote></div>
                <span id="titulo" style="width:99%;">BR-101 - KM <?php echo $ocor->km ?> |
                    <?php if ($ocor->trafego == 1):echo "Trânsito Livre"; else: echo "Congestionado"; endif; ?> |
                    <?php if ($ocor->prf == 1):echo "Polícia Rodoviária Federal"; endif; ?><?php if ($ocor->defciv == 1 and $ocor->prf == 1):echo " e Defesa Civil";elseif ($ocor->defciv == 1): echo "Defesa Civil";  endif; ?><?php if ($ocor->dnit == 1):echo " e DNIT"; endif; ?><?php if ($ocor->defciv == 1 or $ocor->prf == 1 or $ocor->dnit == 1):echo "<span style=\"font-weight:normal\"> no local</span>"; endif; ?> |
                    <span style="color:#FF0004"><?php if ($ocor->vitimas == 1):echo $ocor->n_vitimas." vítimas envolvidas, <span style=\"color:#000\">encaminhar para</span> ".$ocor->hosp_nome; else: echo "<span style=\"color:#000\">sem vítimas</span>"; endif; ?></span> |
                    <span style="font-weight:normal">Porte do Vazamento: </span> Grande |
                    <span style="color:#FF0004">
                        <?php if ($ocor->ocorrencia_explosao == 1):echo "Explosão"; endif; ?>
                        <?php if ($ocor->ocorrencia_incendio == 1 and $ocor->ocorrencia_explosao == 1):echo " e Incêncio";elseif ($ocor->ocorrencia_incendio == 1): echo "Incêncio";  endif; ?>
                        <?php if ($ocor->ocorrencia_prod_ar == 1):echo " e Produto no Ar"; endif; ?>
                        <?php if ($ocor->ocorrencia_explosao == 1 or $ocor->ocorrencia_incendio == 1 or $ocor->ocorrencia_prod_ar == 1):echo "<span style=\"font-weight:normal\"> no local |</span>"; endif; ?>
                    </span>
                    <span style="color:#FF0004">
                        <?php if ($ocor->clima == 1):echo "Chovendo no local |"; endif; ?>
                        <?php if ($ocor->clima == 0):echo "Choveu no local |"; endif; ?>
                        <?php if ($ocor->clima == 2):echo ""; endif; ?>
                    </span>
                    <?php if ($ocor->regiao_moradia == 1):echo "Residências"; endif; ?>
                    <?php if ($ocor->regiao_moradia == 1 and $ocor->regiao_ind == 1):echo " e Industrias";elseif ($ocor->regiao_moradia == 1): echo "Residências";  endif; ?>
                    <?php if ($ocor->regiao_ind == 1 or $ocor->regiao_moradia == 1):echo "<span style=\"font-weight:normal\"> próximos do local |</span>"; endif; ?>
                </span>
                </br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3471.328474117952!2d-50.0298243566122!3d-29.535927062607648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95188287cb19e689%3A0x8597f07f3b3ff7ce!2sRod.+Gov.+M%C3%A1rio+Covas%2C+Tr%C3%AAs+Forquilhas+-+RS%2C+95575-000!5e0!3m2!1spt-BR!2sbr!4v1448475213312" width="99%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div><!--FIM - DIV LOCAL-->
                <div style="width:100%; text-align:left"><!--DIV PRODUTO - PROCEDIMENTOS-->
                <span id="titulo" style="width:100%;">PRODUTO ENVOLVIDO  - <?php echo $ocor->nome ?> - ONU <?php echo $ocor->produto ?> -  <span style="color:#FF0004">Classe  <?php echo $ocor->classe ?><?php if ($ocor->reag_agua == 1):echo " - Reage com água"; endif; ?></span></span>
                <span id="titulo" style="width:100%;">
                    <?php
                    
                    if ($ocor->isolamento_id != 0):
                    if ($ocor->porte == 0 and $ocor->turno == 'noite'):echo "Isolar um raio de <span style=\"color:#ff0004\">".$ocor->pq_isole."</span> e protejer as pessoas, no sentido do vento, a uma distancia de <span style=\"color:#ff0004\">".$ocor->pq_prot_noite."</span>";
                    elseif ($ocor->porte == 0 and $ocor->turno == 'dia'):echo "Isolar um raio de <span style=\"color:#ff0004\">".$ocor->pq_isole."</span> e protejer as pessoas, no sentido do vento, a uma distancia de <span style=\"color:#ff0004\">".$ocor->pq_prot_dia."</span>";
                    elseif ($ocor->porte == 1 and $ocor->turno == 'noite'):echo "Isolar um raio de <span style=\"color:#ff0004\">".$ocor->gr_isole."</span> e protejer as pessoas, no sentido do vento, a uma distancia de <span style=\"color:#ff0004\">".$ocor->gr_prot_noite."</span>";
                    elseif ($ocor->porte == 1 and $ocor->turno == 'dia'):echo "Isolar um raio de <span style=\"color:#ff0004\">".$ocor->gr_isole."</span> e protejer as pessoas, no sentido do vento, a uma distancia de <span style=\"color:#ff0004\">".$ocor->gr_prot_dia."</span>";
                    endif;
                    ;
                    endif;
                    
                    ?>
                </span>
                <span id="titulo" style="width:100%; font-weight:normal">Procedimentos conforme <span style="font-weight:bold">GUIA <?php echo $ocor->guia." - ".$ocor->guia_desc ?></span> do Manual ABIQUIM </span>
                <div id="titulo" style="width:99%; text-align:left; color:#5D5D5D; background-color:#ccc"><blockquote>PERIGOS POTENCIAIS</blockquote></div>
                <span id="titulo" class="subtitulos" style="width:100%;"><blockquote>FOGO OU EXPLOSÃO</blockquote></span>
                <div style="padding:5px;font-weight: normal">
                    <?php echo $ocor->{'1_1'} ?>
                </div>
                <span id="titulo" class="subtitulos" style="width:100%;"><blockquote>PERIGOS À SAÚDE</blockquote></span>
                <div style="padding:5px;">
                    <?php echo $ocor->{'1_2'} ?>
                </div>
                <div id="titulo" style="width:99%; text-align:left; color:#5D5D5D; background-color:#ccc"><blockquote>SEGURANÇA PÚBLICA</blockquote></div>
                <div style="padding:5px;">
                    <?php echo $ocor->{'2_'} ?>
                </div>
                <span id="titulo" class="subtitulos" style="width:100%;"><blockquote>VESTIMENTAS DE PROTEÇÃO</blockquote></span>
                <div style="padding:5px;">
                    <?php echo $ocor->{'2_1'} ?>
                </div>
                <span id="titulo" class="subtitulos" style="width:100%;"><blockquote>EVACUAÇÃO</blockquote></span>
                <div style="padding:5px;">
                    <?php echo $ocor->{'2_2_1'} ?>
                </div>
                </br>
                <?php if ($ocor->ocorrencia_incendio == 1): echo "<div style=\"padding:5px;\"> ".$ocor->{'2_2_2'}."</div>"; endif; ?>
                <div id="titulo" style="width:99%; text-align:left; color:#5D5D5D; background-color:#ccc"><blockquote>AÇÃO DE EMERGÊNCIA</blockquote></div>
                <?php if ($ocor->ocorrencia_incendio == 1): echo "<span id=\"titulo\" class=\"subtitulos\" style=\"width:100%;\">FOGO</span> <div style=\"padding:5px;\"> ".$ocor->{'3_1'}."</div>"; endif; ?>
                <span id="titulo" class="subtitulos" style="width:100%;"><blockquote>VAZAMENTO OU DERRAMAMENTO</blockquote></span>
                <div style="padding:5px;">
                    <?php echo $ocor->{'3_2'} ?>
                </div>
                <span id="titulo" class="subtitulos" style="width:100%;"><blockquote>PRIMEIROS SOCORROS</blockquote></span>
                <div id="subconteudo">
                    <?php echo $ocor->{'3_3'} ?>
                </div>    
                </div><!--FIM - DIV PRODUTO - PROCEDIMENTOS-->
            </div>
            </div><!--FIM DIV DADOS--> 
            </main>
        </body>
    </html>