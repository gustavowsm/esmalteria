<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">        
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
        </script> 
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/materialize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/materialize.min.css" />
        <meta charset="UTF-8">
    </head>
    <style>

        .collapsible-body{
            margin-left: 30px;
        }

        .blackIcon {color:#000;}
    </style>
    <body>
        <nav>
            <div style="background-color:#f06292 " class="nav-wrapper ">
                <div class="center-wrapper">
                    <a href="<?php echo BASE_URL ?>" class="brand-logo">Anna's Smalteria</a>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col s3">
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <img class="responsive-img"  src="https://media.istockphoto.com/photos/various-hair-dresser-tools-on-pink-background-with-copy-space-picture-id1024577404">
                    <li>
                        <?php if ($viewData['tipo'] == true) { ?>
                            <a href="<?php echo BASE_URL; ?>">Olá,<?php echo $viewData['name']; ?>!</a>
                        <?php } else { ?>
                            <a href="<?php echo BASE_URL; ?>agendamento/">Olá,<?php echo $viewData['name']; ?>!</a>
                        <?php } ?>
                    </li>
                    <ul class="collapsible">
                        <li>
                            <?php if ($viewData['tipo'] == true) { ?>
                                <div class="collapsible-header"><i class="material-icons black-text" >settings</i>Gerencial</div>
                                <div class="collapsible-body"> 
                                    <a href="<?php echo BASE_URL; ?>usuarios/">
                                        <span>
                                            <div class="valign-wrapper">
                                                <i class="material-icons black-text">settings</i> 
                                                <div class="center-wrapper">
                                                    <p class="black-text">Usuários</p>
                                                </div>
                                            </div>
                                        </span>
                                    </a>
                                </div>
                                <div class="collapsible-body"> 
                                    <a href="<?php echo BASE_URL ?>servicos/">
                                        <span>
                                            <div class="valign-wrapper">
                                                <i class="material-icons black-text">view_list</i> 
                                                <div class="center-wrapper">
                                                    <p class="black-text">Serviços</p>
                                                </div>
                                            </div>
                                        </span>
                                    </a>
                                </div>
                                <div class="collapsible-body"> 
                                    <a href="<?php echo BASE_URL ?>configuracoes/">
                                        <span>
                                            <div class="valign-wrapper">
                                                <i class="material-icons black-text">perm_data_setting</i> 
                                                <div class="center-wrapper">
                                                    <p class="black-text">Configurações</p>
                                                </div>
                                            </div>
                                        </span>
                                    </a>
                                </div>
                            </li>

                        <?php } ?>
                        <li>

                        </li>
                        <a href="<?php echo BASE_URL ?>usuarios/minha_conta/">
                            <li>
                                <div class="collapsible-header" style="color:black">
                                    <i class="material-icons black-text">account_circle</i>
                                    Minha conta
                                </div>
                            </li>
                        </a>
                        <a href="<?php echo BASE_URL ?>usuarios/meus_servicos/">
                            <li>
                                <div class="collapsible-header" style="color:black">
                                    <i class="material-icons black-text">menu</i>
                                    Meu histórico
                                </div>
                            </li>
                        </a>
                        <a href="<?php echo BASE_URL ?>login/logout/">
                            <li>
                                <div class="collapsible-header" style="color:black">
                                    <i class="material-icons black-text">exit_to_app</i>
                                    Sair
                                </div>
                            </li>
                        </a>
                    </ul>
                </ul>
            </div>
            <div class="col s9">

                <?php $this->loadViewInTemplate($viewName, $viewData); ?>

            </div>
        </div>      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/materialize.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/materialize.min.js"></script>
        <script type="text/javascript" >

                document.addEventListener('DOMContentLoaded', function () {
                    var elems = document.querySelectorAll('.collapsible');
                    var instances = M.Collapsible.init(elems, options);
                });

                // Or with jQuery

                $(document).ready(function () {
                    $('.collapsible').collapsible();
                });
                document.addEventListener('DOMContentLoaded', function () {
                    var elems = document.querySelectorAll('.dropdown-trigger');
                    var instances = M.Dropdown.init(elems, options);
                });

                // Or with jQuery

                $('.dropdown-trigger').dropdown();

                $(document).ready(function () {
                    $('select').formSelect();
                });


        </script>

    </body>
</html>