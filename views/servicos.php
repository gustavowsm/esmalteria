    
<table border="1" width="100%" class="striped">
    <tr>
        <th>ID</th>
        <th>Serviço</th>
        <th>Valor</th>
        <th>Disponibilidade</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($servicos as $svr): ?>
        <tr>
            <td><?php echo $svr['ID']; ?></td>
            <td><?php echo utf8_encode($svr['NOME']); ?></td>
            <td><?php echo $svr['VALOR']; ?>   </td>                
            <td style="color:black"><?php if ($svr['DISPONIBILIDADE'] == 1) { ?>
                    <label>
                        <input type="checkbox" checked="checked" disabled="disabled" />
                        <span style="color:black">Disponível</span>
                    </label>
                <?php } else {
                    ?>
                    <p>
                        <label>
                            <input type="checkbox" disabled="disabled" />
                            <span style="color:black">Não disponível</span>
                        </label>
                    </p>
                    <?php
                }
                ?></td>
            <td><?php echo utf8_encode($svr['DESCRICAO']); ?></td>
            <td><a <a href="<?php echo BASE_URL?>servicos/edit/<?php echo $svr['ID']; ?>"> editar</a></td>
            <td><a href="<?php echo BASE_URL?>servicos/delete/<?php echo $svr['ID']; ?>"> excluir</a></td>
        </tr>
    <?php endforeach; ?>
</table>


<script>
    var instance = M.Tabs.init(el, options);

    // Or with jQuery

    $(document).ready(function () {
        $('.tabs').tabs();
    });

</script>