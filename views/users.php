<table border="1" width="100%">
    <tr>
        <th>Nome do usuário</th>
        <th>Email</th>
        <th>Histórico</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $usr) { ?>
        <tr
            <?php if ($usr['ATENDENTE'] == 0 && $usr['CLIENTE'] == 1) { ?>style="background-color: #f06292;color: white"<?php } else { ?> style="background-color: white;color: #f06292"   <?php } ?>>
            <td> <?php echo $usr['username'] ?></td>
            <td> <?php echo $usr['EMAIL'] ?></td>
            <td></td>
            <td> 
                <a class="waves-effect waves-light btn-small" 
                <?php if ($usr['ATENDENTE'] == 0 && $usr['CLIENTE'] == 1) { ?>
                       style="background-color: white;color: #f06292"
                   <?php } else { ?>
                       style="background-color: #f06292;color: white"
                   <?php } ?>
                   href="<?php echo BASE_URL ?>usuarios/editar/<?php echo$usr['id'] ?>" >
                    Editar
                </a>
                <a class="waves-effect waves-light btn-small" 
                <?php if ($usr['ATENDENTE'] == 0 && $usr['CLIENTE'] == 1) { ?>

                       style="background-color: white;color: #f06292"
                   <?php } else { ?>
                       style="background-color: #f06292;color: white"
                   <?php } ?>
                   href="<?php echo BASE_URL ?>usuarios/excluir/<?php echo $usr['id'] ?>" >
                    Excluir
                </a>
            </td>
        </tr>
    <?php } ?>

</table>


