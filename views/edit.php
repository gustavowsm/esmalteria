
<div class="container">
    <div class="row">
        <form class="col s12" method="POST" action="<?php echo BASE_URL?>usuarios/true_edit">
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
            <input type="hidden" name="id" value="<?php echo $id?>">
            <button type="submit" class="waves-effect waves-light btn pink lighten-2">Cadastrar</button>
         </form>
    </div>
</div>


