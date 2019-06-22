<style>p{color:white}
    .checkbox-orange[type="checkbox"].filled-in:checked + label:after{
        border: 2px solid #ff9800;
        background-color: #ff9800;
    }
</style>

<div class="card pink lighten-2">
    <div class="card-content white-text">
        <div class="row">
            <form class="col s12" method="POST" action="<?php echo BASE_URL; ?>configuracoes/altera/ ">
                <span>Horário de funcionamento:</span>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">access_time</i>
                        <input  name="abre" style="color:#fff;"id="icon_prefix" type="time" value="<?php echo $confs['ABRE'] ?>" >
                        <label style="color: white">Abre</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">access_time</i>
                        <input  name="fecha" style="color:#fff;"id="icon_prefix" type="time"  value="<?php echo $confs['FECHA'] ?>">
                        <label style="color: white">Fecha</label>
                    </div>
                </div>
                <?php
                $dias = explode(",", $confs['DIAS']);
                ?>
                <div class="row" >
                    <div class="input-field col s6">
                        Dias de funcionamento:
                        <p><label><input name="dias[]" type="checkbox" value="seg" <?php
                                if ($dias[0] == 'seg') {
                                    echo "checked";
                                }
                                ?> /><span style="color: white;">Segunda</span> </label></p>
                        <p><label><input name="dias[]" type="checkbox" value="ter"  <?php
                                if ($dias[1] == 'ter') {
                                    echo "checked";
                                }
                                ?>/><span style="color: white;">Terça</span> </label></p>
                        <p><label><input name="dias[]" type="checkbox" value="qua"  <?php
                                if ($dias[2] == 'qua') {
                                    echo "checked";
                                }
                                ?>/><span style="color: white;">Quarta</span> </label></p>
                        <p><label><input name="dias[]" type="checkbox" value="qui"  <?php
                                if ($dias[3] == 'qui') {
                                    echo "checked";
                                }
                                ?>/><span style="color: white;">Quinta</span> </label></p>
                        <p><label><input name="dias[]" type="checkbox" value="sex"  <?php
                                if ($dias[4] == 'sex') {
                                    echo "checked";
                                }
                                ?>/><span style="color: white;">Sexta</span> </label></p>
                        <p><label><input name="dias[]" type="checkbox" value="sab"  <?php
                                if (!empty($dias[5]) == 'sab') {
                                    echo "checked";
                                }
                                ?>/><span style="color: white;">Sábado</span> </label></p>
                        <p><label><input name="dias[]" type="checkbox" value="dom"  <?php
                                if (!empty($dias[6]) == 'dom') {
                                    echo "checked";
                                }
                                ?>/><span style="color: white;">Domingo</span> </label></p>
                    </div>
                    <div class="input-field col s6">
                        Feriados:
                    </div>
                </div>

                <button type="submit" onclick="submit()" class="waves-effect waves-light btn white"><p style="color:#f06292;">Alterar</p></button>
            </form>
        </div>
    </div>
</div>

<script>
    // Or with jQuery

    $(document).ready(function () {
        $('.timepicker').timepicker();
    });


</script>
