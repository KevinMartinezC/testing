<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
      <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../estilos/style.css">
</head>
<body>
 <div class="container">
    <div class="forms-container">
             <div class="signin-signup">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Olvidaste la contraseña</h2>
                    <p class="text-center">Ingresa tu correo electrónico</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
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
                  
                        <input class="btn solid" type="submit" name="check-email" value="Continue">
                    
                </form>
           
        </div>
         </div>
    </div>
    
</body>
</html>