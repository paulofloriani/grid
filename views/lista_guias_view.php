<?php ini_set('default_charset','utf-8');?>
<!DOCTYPE html>
<html>
    <title>GUIAS</title>
    <body>
        <main class="container">
        <div class="row  right-align" style="margin-top:40px;">
            <div class="col s12">
                <a href="<?php echo base_url('painel/registro_guia'); ?>" class="waves-effect waves-light btn">Adicionar Guia</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table id="example" class="ui celled table selectable" style="font-size:12px; text-transform: uppercase;">
                    <thead>
                        <tr>
                            <th data-field="id">GUIA</th>
                            <th data-field="name">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guia as $guia): ?>
                        <tr onclick="location.href='<?php echo base_url('painel/mostra_guia/')?>/<?php echo $guia->id_guia ?>';" style="cursor:pointer" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Abrir Guia <?php echo $guia->guia ?>">
                            <td>
                                <?php echo $guia->guia ?>
                            </td>
                            <td>
                                <?php echo $guia->guia_desc ?>
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