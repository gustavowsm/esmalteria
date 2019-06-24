<div class="container">
    <?php
    if (!empty($servicoshj2)) {
        foreach ($servicoshj2 as $servicos) {
            $ids[] = $servicos['ID'];
            $horamarcada[] = explode(" ", $servicos['DATAMARCADA']);
            $tempo[] = $servicos['TEMPOESTIMADO'];
        }
        foreach ($horamarcada as $hora1) {
            $hora2[] = $hora1[1];
            $times = array($hora2[0], $tempo[0]);

            $seconds = 0;

            foreach ($times as $time) {
                list( $g, $i ) = explode(':', $time);
                $seconds += $g * 3600;
                $seconds += $i * 60;
            }

            $hours = floor($seconds / 3600);
            $seconds -= $hours * 3600;
            $minutes = floor($seconds / 60);

            $horasSomadas = "{$hours}:{$minutes}:00";
        }
        foreach ($hora2 as $hora3) {
            $hora4 = explode(":", $hora3);
            $hora5[] = $hora4[0];
        }
    }
    ?>

    <h2>Cheque a disponibilidade dos nossos atendentes:</h2>
    <?php
    $abre = $confs[0];
    $fecha = $confs[1];
    $fimDoArray = explode(",", $atendentes['DISPONIBILIDADE']);
    $inicioDoExpediente = explode(",", $atendentes['DISPONIBILIDADE'])[0];
    $fimDoExpediente = end($fimDoArray);
    if (!empty($servicoshj2)) {
        foreach (range($hora5[0], $fimDoExpediente) as $number) {
            $fatidicoArray[] = $number;
        }
    }
    ?>

    <table class="responsive-table">
        <tr>
            <th>
                Horários
            </th>

            <th>
                <?php echo $atendentes['username']; ?>
            </th>

        </tr>
        <?php
        //pego o array do horario de funcionamento do estabelecimento itero ele para dar as horas que o estabelecimento vai 
        //abrir todo dia
        for ($i = $inicioDoExpediente; $i <= $fimDoExpediente; ++$i) {
            ?>
            <tr>
                <td>
                    <?php echo $i ?>:00
                </td>
                <td>
                    <?php
                    if (!empty($servicoshj2)) {
                        if (!in_array($i, $hora5)) {
                            echo "<a href='" . BASE_URL . "agendamento/servicos?data=" . $dia . "&horario=" . $i . "&idatd=" . $atendentes['id'] . "'>Livre</a>";
                        } else {
                            echo "Em serviço";
                        }
                    } else {
                        echo "<a href='" . BASE_URL . "agendamento/servicos?data=" . $dia . "&horario=" . $i . "&idatd=" . $atendentes['id'] . "'>Livre</a>";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>