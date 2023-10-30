<?php	
	$peticionAjax = true;
	require_once "././core/configAPP.php";
?>

<link href="<?php echo SERVERURL; ?>ajax/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="<?php echo SERVERURL; ?>ajax/bootstrap/css/bootstrap-select.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<link href="<?php echo SERVERURL; ?>ajax/sweetalert/sweetalert.css" rel="stylesheet" crossorigin="anonymous" />

<div id="logreg-forms">
    <!-- Formulario Inicio de Sesion  -->
    <form class="form-signin" id="loginform" action="" method="POST" autocomplete="off">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Iniciar Sesión</h1>

        <p>
            <center><img src="<?php echo SERVERURL; ?>vistas/plantilla/img/logo.svg" width="100%"></center>
        </p>

        <br />

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text boton"><i class="fas fa-envelope-square"></i></span>
            </div>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Correo electrónico"
                required autofocus tabindex="1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text boton"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña"
                required tabindex="2">
            <div class="input-group-append">
                <button id="show_password" class="btn btn-primary boton" type="button" tabindex="3"> <span id="icon"
                        class="fa fa-eye-slash icon"></span> </button>
            </div>
        </div>

        <div class="input-group mb-3" id="groupDB" style="display: none;">
            <div class="input-group-prepend">
                <span class="input-group-text boton"><i class="fas fa-user"></i></i></span>
            </div>
            <input type="number" class="form-control" placeholder="Cliente" aria-label="Cliente"
                aria-describedby="basic-addon2" tabindex="4" id="inputCliente" name="inputCliente">
            <div class="input-group-append">
                <span class="input-group-text boton"><i class="fas fa-key"></i></span>
            </div>
            <input type="number" class="form-control" placeholder="PIN" aria-label="PIN" aria-describedby="basic-addon2"
                tabindex="5" id="inputPin" name="inputPin">
        </div>


        <div class="RespuestaAjax"></div>

        <button class="btn btn-primary btn-block boton" type="submit" id="enviar" tabindex="6"><i
                class="fas fa-sign-in-alt fa-lg"></i> Iniciar Sesión</button>
        <a style="text-decoration:none;" class="ancla" href="#" id="forgot_pswd" tabindex="7">¿Olvido su contraseña?</a>
        <hr>
        <!-- <p>Don't have an account!</p>  -->
        <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i>
            Comienza tu experiencia. Regístrate ahora.</button>
    </form>

    <!-- Formulario Resetear Contraseña  -->
    <form class="form-reset" id="forgot_form" autocomplete="off">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Restablecer Contraseña</h1>
        <p>
            <center><img src="<?php echo SERVERURL; ?>vistas/plantilla/img/logo.svg" width="100%"></center>
        </p>

        <br />

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text boton"><i class="fas fa-envelope-square"></i></span>
            </div>
            <input type="email" class="form-control" placeholder="Correo electrónico" required autofocus
                name="usu_forgot" id="usu_forgot" tabindex="1">
        </div>

        <div class="RespuestaAjax"></div>

        <button class="btn btn-primary btn-block boton" type="submit" tabindex="2"><i class='fas fa-sync-alt fa-lg'></i>
            Restablecer</button>
        <a style="text-decoration:none;" href="#" id="cancel_reset" tabindex="3"><i class="fas fa-angle-left "></i>
            Atrás</a>
    </form>

    <!-- Formulario Registro  -->
    <form class="form-signup" id="form_registro" autocomplete="off">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Formulario de Registro</h1>
        <p>
            <center><img src="<?php echo SERVERURL; ?>vistas/plantilla/img/logo.svg" width="100%"></center>
        </p>

        <br />

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Empresa" required
                autofocus data-toggle="tooltip" data-placement="top" title="Ingrese la empresa o su nombre completo"
                tabindex="1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input type="number" id="user_telefono" name="user_telefono" class="form-control"
                placeholder="Teléfono de Contacto" required tabindex="2">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="email" class="form-control" placeholder="Correo Electrónico" id="mail" name="email" required
                tabindex="3">
            <div class="input-group-append">
                <span class="input-group-text">@algo.com</span>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" id="user-pass" name="user-pass" class="form-control" placeholder="Contraseña"
                required tabindex="4">
            <div class="input-group-append">
                <button id="show_password1" class="btn btn-primary" type="button"> <span id="icon1"
                        class="fa fa-eye-slash icon"></span> </button>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" id="user-repeatpass" class="form-control" placeholder="Repetir Contraseña" required
                tabindex="5">
            <div class="input-group-append">
                <button id="show_password2" class="btn btn-primary" type="button"> <span id="icon2"
                        class="fa fa-eye-slash icon"></span> </button>
            </div>
        </div>

        <button class="btn btn-primary btn-block" type="button" id="registrarse" tabindex="6"><i
                class="fas fa-user-plus"></i>
            ¡Listo para unirte!, Vamos a ello</button>
        <a style="text-decoration:none;" href="#" id="cancel_signup" tabindex="7"><i class="fas fa-angle-left"></i>
            Atrás</a>
    </form>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        © 2021 - <?php echo date("Y");?> Copyright:
        <center>
            <p class="navbar-text"> Todos los derechos reservados
            </p>
        </center>
    </div>
    <!-- Copyright -->

    <p style="text-align:center">
        <a href="http://bit.ly/2RjWFMfunction toggleResetPswd(e){
           e.preventDefault();
           $('#logreg-forms .form-signin').toggle() // display:block or none
           $('#logreg-forms .form-reset').toggle() // display:block or none
        }

        function toggleSignUp(e){
           e.preventDefault();
           $('#logreg-forms .form-signin').toggle(); // display:block or none
           $('#logreg-forms .form-signup').toggle(); // display:block or none
        }

        $(()=>{
           // Login Register Form
           $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
           $('#logreg-forms #cancel_reset').click(toggleResetPswd);
           $('#logreg-forms #btn-signup').click(toggleSignUp);
           $('#logreg-forms #cancel_signup').click(toggleSignUp);
        })g" </p>
</div>

<script src="<?php echo SERVERURL; ?>ajax/query/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="<?php echo SERVERURL; ?>ajax/popper/popper.min.js" crossorigin="anonymous"></script>
<script src="<?php echo SERVERURL; ?>ajax/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?php echo SERVERURL; ?>ajax/bootstrap/js/bootstrap-select.min.js" crossorigin="anonymous"></script>
<script src="<?php echo SERVERURL; ?>ajax/sweetalert/sweetalert.min.js" crossorigin="anonymous"></script>
<script src="<?php echo SERVERURL; ?>ajax/js/script_login.js" crossorigin="anonymous"></script>


<?php
    require_once "./ajax/js/login.php";
?>