<?php ini_set('default_charset','utf-8');?>
<!DOCTYPE html>
<html>
    <title>GUIAS</title>
    <body>
        <main class="container">
        <div class="row  right-align" style="margin-top:40px;">
            <div class="col s12">
                <a href="<?php echo base_url('painel/registro_produto'); ?>" class="waves-effect waves-light btn">Adicionar Produto</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table id="example" class="ui celled table selectable" style="font-size:12px; text-transform: uppercase;">
                    <thead>
                        <tr>
                            <th data-field="id">Nome Produtos</th>
                            <th data-field="name">ONU</th>
                            <th data-field="id">Classe</th>
                            <th data-field="name">Guia</th>
                            <th data-field="id">Reagente à água</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produto as $prod): ?>
                        <tr>
                            <td><a href="<?php echo base_url('painel/mostra_produto/')?>/<?php echo $prod->produto_id ?>" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Abrir <?php echo $prod->nome ?>">
                                <?php echo $prod->nome ?>

                                </a>
                            </td>
                            <td>
                                <?php echo $prod->onu ?>
                            </td>
                            <td>
                                <?php echo $prod->classe ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('painel/mostra_guia/')?>/<?php echo $prod->id_guia ?>" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Abrir Guia <?php echo $prod->guia ?>"><?php echo $prod->guia  ?></a>
                            </td>
                            <td>
                                <?php if ($prod->reag_agua == 1):echo "<i class='material-icons green-text text-lighten-1 tooltipped' data-position='bottom' data-delay='50' data-tooltip='Não usar água, exceto com aprovação de um especialista' style='cursor:default'>star</i>"; else: echo ""; endif; ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        </main>
    </body>
</html>