<style>

    /* Inactive/Active Default input field color */
    .input-field input[type]:not([readonly]),
    .input-field input[type]:focus:not([readonly]),
    .input-field textarea:not([readonly]),
    .input-field textarea:focus:not([readonly]) {
        border-bottom: 1px solid #fff;
        box-shadow: 0 1px 0 0#fff;
    }

    /* Inactive/Active Default input label color */
    .input-field input[type]:focus:not([readonly])+label,
    .input-field textarea:focus:not([readonly])+label {
        color: #fff;
    }

    /* Active/Inactive Invalid input field colors */
    .input-field input[type].invalid,
    .input-field input[type].invalid:focus,
    .input-field textarea.invalid,
    .input-field textarea.invalid:focus {
        border-bottom: 1px solid #fff;
        box-shadow: 0 1px 0 0 #fff;
    }

    /* Active/Inactive Invalid input label color */
    .input-field input[type].invalid:focus+label,
    .input-field input[type].invalid~.helper-text::after,
    .input-field input[type].invalid:focus~.helper-text::after, 
    .input-field textarea.invalid:focus+label,
    .input-field textarea.invalid~.helper-text::after,
    .input-field textarea.invalid:focus~.helper-text::after {
        color: #fff;
    }

    /* Active/Inactive Valid input field color */
    .input-field input[type].valid,
    .input-field input[type].valid:focus,
    .input-field textarea.valid,
    .input-field textarea.valid:focus {
        border-bottom: 1px solid #fff;
        box-shadow: 0 1px 0 0 #fff;
    }

    /* Active/Inactive Valid input label color */
    .input-field input[type].valid:focus+label,
    .input-field input[type].valid~.helper-text::after,
    .input-field input[type].valid:focus~.helper-text::after,
    .input-field textarea.valid:focus+label,
    .input-field textarea.valid~.helper-text::after,
    .input-field textarea.valid:focus~.helper-text::after {
        color: #fff;
    }
    .material-icons.valid:focus{
        color:#fff;
    }
</style>
    <div class="col s12 m6">
        <div class="card pink lighten-2">
            <div class="card-content white-text">
                <span class="card-title">Minha conta</span>
                <div class="row">
                    <form class="col s12" method="POST" action="<?php echo BASE_URL ?>usuarios/edit_self/<?php echo $info['id']; ?>">
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $info['id'] ?>">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_circle</i>
                                <input value="<?php echo $info['username']; ?>" name="nome" style="color:#fff;"id="icon_prefix" type="text" class="validate">
                                <label style="color: white">Nome</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">phone</i>
                                <input value="<?php echo $info['telefone']; ?>" style="color:#fff;" name="telefone" id="icon_telephone" type="tel" class="validate">
                                <label style="color: white" for="icon_telephone">Telefone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix ">email</i>
                                <input  value="<?php echo $info['EMAIL']; ?>"name="email" id="icon_prefix" type="text" style="color:#fff;" class="validate ">
                                <label style="color: white" for="icon_prefix">Email</label>
                            </div>
                        </div>
                        <button type="submit" onclick="submit()" class="waves-effect waves-light btn white"><p style="color:#f06292;">Alterar</p></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

