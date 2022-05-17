<?php 
require_once "LoginyRegistro/controllerUserData.php"; 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="estilos/style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="index.php"  method="POST" class="sign-in-form">
               <img src="img/Logo.jpg"  alt="" height=250px;
width=250px />
            <h2 class="title">Iniciar Sesión</h2>
            <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input class="form-control" type="email" name="email" placeholder="Correo Electronico" required value="<?php echo $email ?>">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
            </div>
          
            <input  type="submit" name="login" value="Iniciar Sesion" class="btn solid">
            <div class="link forget-pass text-left"><a href="LoginyRegistro/forgot-password.php">Olvidaste la contraseña?,Click aqui</a></div>
          </form>
          
          <form action="#" class="sign-up-form">
            <h2 class="title">Registrarse</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nombre de Usuario"/>
            </div>
            
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Correo" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Repetir Contraseña" />
            </div>
            <input type="submit" class="btn" value="Registrarse" />
              <img src="img/register.svg" class="image" alt="" />
          </form>
        </div>
      </div>
        
      <div class="panels-container">
        <div class="panel left-panel">
    
           <img src="img/register.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
