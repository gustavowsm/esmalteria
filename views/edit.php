
<div class="container">
    <div class="row">
        <form class="col s12" method="POST" action="<?php echo BASE_URL ?>usuarios/true_edit">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input name="nome" id="icon_prefix" type="text" value="<?php echo $userdata['username']; ?>" class="validate">
                    <label for="icon_prefix">Nome</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input name="telefone" id="icon_telephone" type="tel" value="<?php echo $userdata['telefone']; ?>"class="validate">
                    <label for="icon_telephone">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix ">email</i>
                    <input name="email" id="icon_prefix" type="text" value="<?php echo $userdata['EMAIL']; ?>" class="validate ">
                    <label for="icon_prefix">Email</label>
                </div>
            </div>
             <input name="atendente"  type="hidden" value="<?php echo $userdata['ATENDENTE']; ?>" >
             <input name="cliente"  type="hidden" value="<?php echo $userdata['CLIENTE']; ?>" >
            <?php $horarios = explode(",", $userdata['DISPONIBILIDADE']);
            if ($userdata['ATENDENTE'] == 1 && $userdata['CLIENTE'] == 0) { ?>
                <div class="row">
                    <div class="input-field col s3">
                        <p><label><input name="horarios[]" <?php if (in_array(8, $horarios)) { echo "checked"; } ?> type="checkbox" value="8"/><span>08:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(9, $horarios)) { echo "checked"; } ?> type="checkbox" value="9"/><span>09:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(10, $horarios)) { echo "checked"; } ?> type="checkbox" value="10"/><span>10:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(11, $horarios)) { echo "checked"; } ?> type="checkbox" value="11"/><span>11:00</span> </label></p>
                    </div>
                    <div class="input-field col s3">
                        <p><label><input name="horarios[]" <?php if (in_array(12, $horarios)) { echo "checked"; } ?> type="checkbox" value="12"/><span>12:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(13, $horarios)) { echo "checked"; } ?> type="checkbox" value="13"/><span>13:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(14, $horarios)) { echo "checked"; } ?> type="checkbox" value="14"/><span>14:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(15, $horarios)) { echo "checked"; } ?> type="checkbox" value="15"/><span>15:00</span> </label></p>
                    </div>
                    <div class="input-field col s3">
                        <p><label><input name="horarios[]" <?php if (in_array(16, $horarios)) { echo "checked"; } ?> type="checkbox" value="16"/><span>16:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(17, $horarios)) { echo "checked"; } ?> type="checkbox" value="17"/><span>17:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(18, $horarios)) { echo "checked"; } ?> type="checkbox" value="18"/><span>18:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(19, $horarios)) { echo "checked"; } ?> type="checkbox" value="19"/><span>19:00</span> </label></p>
                    </div>
                    <div class="input-field col s3">
                        <p><label><input name="horarios[]" <?php if (in_array(20, $horarios)) { echo "checked"; } ?> type="checkbox" value="20"/><span>20:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(21, $horarios)) { echo "checked"; } ?> type="checkbox" value="21"/><span>21:00</span> </label></p>
                        <p><label><input name="horarios[]"<?php if (in_array(22, $horarios)) { echo "checked"; } ?>  type="checkbox" value="22"/><span>22:00</span> </label></p>
                        <p><label><input name="horarios[]" <?php if (in_array(23, $horarios)) { echo "checked"; } ?> type="checkbox" value="23"/><span>23:00</span> </label></p>
                    </div>
                </div>
<?php } ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="waves-effect waves-light btn pink lighten-2">Cadastrar</button>
        </form>
    </div>
</div>


