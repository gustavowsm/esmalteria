<div class="container">
    <h2>Escolha nossos serviços:</h2>
    Olá,<?php echo $name ?>!<br>
    Seu atendimento estará sendo marcado para as
    <?php
    $hora = explode(" ", $dataEscolhida)[1];
    $dia = explode(" ", $dataEscolhida)[0];
    //mostra a hora do dia que foi escolhido
    echo $hora
    ?>  do dia <?php
    //dia
    echo explode("-", $dia)[2] . "/";
    //mes
    echo explode("-", $dia)[1] . "/";
    //ano
    echo explode("-", $dia)[0];
    ?> com  <?php echo $atendente['username']; ?>.<br>
    Como último passo,escolha o(s) serviço(s) que deseja fazer conosco:
    <form action="<?php echo BASE_URL ?>agendamento/confirma" method="POST">
        <input type="hidden" value="<?php echo $name ?>" name="nome">
        <input type="hidden" value="<?php echo $atendente['username'] ?>" name="atendente">
        <input type="hidden" value="<?php echo $atendente['id'] ?>" name="idatendente">
        <input type="hidden" value="<?php echo $dataEscolhida ?>" name="dataescolhida">
        <div class="row" >
            <div class="input-field col s9">
                <select multiple required="true" name="servico[]">
                    <?php foreach ($servicos as $s) { ?>
                        <option value="<?php echo $s['ID'] . ","; ?>"><?php echo $s['NOME'] ?>-<?php echo $s['VALOR'] ?> R$</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row" >
            <button type="submit" class="waves-effect waves-light btn pink lighten-2">Confirmar</button>
        </div>
    </form>
</div>