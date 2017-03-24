<?php ini_set('default_charset','utf-8'); ?>
    <!DOCTYPE html>
    <html>

 
        <title>Usuários</title>
        

    <body>

        <main class="container">
        <div class="row  right-align" style="margin-top:40px;">
            <div class="col s12">
                <a href="<?php echo base_url('painel/novo_usuario');?>" class="waves-effect waves-light btn">Adicionar Usuário</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table id="example" class="ui celled table selectable" style="font-size:12px; text-transform: uppercase;">
                <thead>
                        <tr id="tabela_titulo">
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>N&iacute;vel</th>
                            <th>Patente</th>
                            <th>Data de cadastro</th>
                            <th>Gerencia</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usuarios as $row):  ?>
                            <tr>
                                <td>
                                    <?php echo $row->usu_nome ?>
                                </td>
                                <td>
                                    <?php echo $row->usu_email ?>
                                </td>
                                <td>
                                    <?php if($row->usu_nivel == 0): echo "Administrador";elseif($row->usu_nivel == 1): echo "Operacional";  endif; ?>
                                </td>
                                <td>
                                    <?php echo $row->usu_patente ?>
                                </td>
                                <td>

                                    <?php 
                                    $inicio = date_create($row->usu_cadastro);

                                    echo date_format($inicio,"d/m/Y"); ?>

                                    <span style="font-size:10px;"><?php echo date_format($inicio,"H:i:s"); ?></span>

                                </td>
                                <td>
                                    <a href="" class="red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Deletar usuário <?php echo $row->usu_nome ?>"><i class="material-icons">delete_forever</i></a>
                                    <a href="" class="amber-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Desbloquear usuário"><i class="material-icons">lock_outline</i></a> 
                                    ou 
                                    <a href="" class="blue-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Bloquear usuário"><i class="material-icons">lock_open</i></a> 
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>
                                </tbody>
                    </table>


            </div>
        </div>
        </main>





    </body>

    </html>