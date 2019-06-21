<?php
$hora = explode(" ", $dataescolhida)[1];
$dia = explode(" ", $dataescolhida)[0];
?>
<div class="container">
    <h2>Detalhes do seu agendamento:</h2>
    <table>
        <tr>
            <th>Quem irá te atender:</th>
            <td><?php echo $atendente; ?></td>
        </tr>
        <tr>
            <th>Data e Horário:</th>
            <td><?php
                //dia
                echo explode("-", $dia)[2] . "/";
                //mes
                echo explode("-", $dia)[1] . "/";
                //ano
                echo explode("-", $dia)[0];
                ?>
                ás            
                <?php
                echo $hora;
                ?>
            </td>
        </tr>
        <?php foreach ($dados as $d) { ?>
            <tr>
                <th><?php echo $d['NOME'] ?></th>
                <th><?php echo $d['VALOR'] ?> R$</th>
            </tr>
        <?php } ?>
        <tr>
            <th>Tempo estimado:</th>
            <th>  <?php
                foreach ($dados as $d) {
                    $array[] = $d['TEMPO'];
                }
                $comma_separated = implode(",", $array);
//                echo "<br>";
//                $times = array('01:30:00', '01:30:00');
//                echo "<br>";
//                print_r($times);
//                echo "<br>";
                $EstimativaHorario = explode(",", $comma_separated);
                $seconds = 0;
                foreach ($EstimativaHorario as $time) {
                    list( $g, $i ) = explode(':', $time);
                    $seconds += $g * 3600;
                    $seconds += $i * 60;
                }
                $hours = floor($seconds / 3600);
                $seconds -= $hours * 3600;
                $minutes = floor($seconds / 60);
                echo "<br>";
                echo "{$hours} horas e {$minutes} minutos";
                ?> </th>
        </tr>
        <tr>
            <th>Total dos serviços:</th>
            <th>   <?php
                echo $total = array_sum(array_column($dados, 'VALOR'));
                ?></th>
        </tr>
    </table>
    <?php
    $idservicos = implode(",", array_column($dados, 'ID'));
    ?>
    <form method="POST" action="<?php echo BASE_URL ?>agendamento/finaliza/">
        <input type="hidden" name="idatendente" value="<?php echo $idatendente ?>">
        <input type="hidden" name="total" value="<?php echo $total ?>">
        <input type="hidden" name="servicos" value="<?php echo $idservicos ?>">
        <input type="hidden" name="datamarcada" value="<?php echo $dataescolhida ?>">
        <input type="hidden" name="horas" value="<?php echo $hours ?>">
        <input type="hidden" name="minutos" value="<?php echo $minutes ?>">
        Método de pagamento:
        <div class="row">
            <div class="col s3">
                <p>
                    <label>
                        <input type="radio"  name="pagamento" value="dinheiro"/>
                        <span>Dinheiro</span>
                    </label>
                </p>
            </div>
            <div class="col s3">
                <p>
                    <label>
                        <input type="radio" name="pagamento" value="debito"/>
                        <span>Cartão de débito</span>
                    </label>
                </p>
            </div>
            <div class="col s3">
                <p>
                    <label>
                        <input  type="radio"  name="pagamento" value="credito"/>
                        <span>Cartão de crédito</span>
                    </label>
                </p>
            </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn pink lighten-2">Confirmar serviço</button>
    </form>
</div>