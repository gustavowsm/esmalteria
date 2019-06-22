<table border="1" width="100%" class="striped">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Serviços</th>
        <th>Valor total</th>
        <th>Pagamento</th>
        <th>Data e horário</th>
    </tr>

    <?php foreach ($atendimentos as $a) { ?>
        <tr>
            <td> <?php echo $a['ID'] ?></td>
            <td> <?php echo $a['ID_CLIENTE'] ?></td>
            <td> <?php
                echo $idservs[] = $a['ID_SERVICO'];
                ?></td> 
            <td> <?php echo $a['VALOR_PAGO'] ?></td>
            <td> <?php echo $a['METODO'] ?></td>
            <td> <?php $date = new DateTime($a['DATAMARCADA']);
            echo $date->format('d/m/Y H:i:s');
            ?></td>
        </tr>

    <?php }
    ?>
</table>

