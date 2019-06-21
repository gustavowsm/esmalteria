<div class="container">
    <h4>Novo usuário</h4>

    <?php if (!empty($msg)): ?>
        <div class="warning">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        Usuário:<br/>
        <input type="text" name="username" /><br/><br/>

        Senha:<br/>
        <input type="password" name="pass" /><br/><br/>

        <button class="waves-effect waves-light btn" type="submit" />Cadastrar</button>
    </form>
</div>


