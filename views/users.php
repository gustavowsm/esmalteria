<div class="container">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
        <th>Email</th>
        <th>Histórico</th>
        <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($usuarios as $usr) {?>
        <tr>
            <td> <?php echo $usr['username'] ?></td>
            <td> <?php echo $usr['EMAIL'] ?></td>
            <td></td>
            <td>
                <a href="<?php echo BASE_URL ?>usuarios/editar/<?php echo $usr['id'] ?>" >
                    Editar
                </a>
                <a   href="<?php echo BASE_URL ?>usuarios/excluir/<?php echo $usr['id'] ?>" >
                    Excluir
                </a>
            </td>
        </tr>
    <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nome do usuário</th>
        <th>Email</th>
        <th>Histórico</th>
        <th>Ações</th>
            </tr>
        </tfoot>
    </table>
	</div>
</div>
