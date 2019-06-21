

<div class="container">
    <div class="row">
        <form class="col s12" method="POST" action="<?php echo BASE_URL ?>servicos/add">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">note_add</i>
                    <input name="nome" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Nome do serviço</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">monetization_on</i>
                    <input name="valor" id="icon_telephone" type="tel" class="validate">
                    <label for="icon_telephone">Valor</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix ">timer</i>
                    <input id="icon_prefix" type="time" name="tempo" class="datepicker ">
                    <label for="icon_prefix">Tempo estimado:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea1" name="descricao" class="materialize-textarea"></textarea>
                    <label for="textarea1">Descrição</label>
                </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn pink lighten-2">Cadastrar</button>
        </form>
    </div>
</div>

