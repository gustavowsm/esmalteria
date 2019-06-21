<table border="1" width="100%" class="striped">
    <tr>
        <th>ID</th>
        <th>Atendente</th>
        <th>Cliente</th>
        <th>Servico</th>
        <th>Valor</th>
        <th>Data</th>
        <th>Ações</th>
        <th></th>
    </tr>
    <?php foreach ($atendimentos as $atendimento2): ?>
        <tr>
            <td><?php echo $atendimento2['ID']; ?></td>
            <td><?php echo $atendimento2['atendenteNome']; ?></td>
            <td><?php echo $atendimento2['NOME_CLIENTE']; ?>   </td>                
            <td><?php echo $atendimento2['nomeServico']; ?></td>
            <td><?php echo $atendimento2['VALOR_PAGO']; ?></td>
            <td><?php $date = new DateTime($atendimento2['DATAMARCADA']);
    echo $date->format('d/m/Y H:i:s');
        ?></td>
            <td> editar<?php $atendimento2['ID']; ?></td>
            <td> excluir<?php $atendimento2['ID']; ?></td>
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