<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        <div class="forms-container">
             <div class="signin-signup">
                <form action="reset-code.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
               <div class="alert success">
   <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      
                           
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                       <i class="material-icons">vpn_key</i>
                        <input class="form-control" type="text" name="otp" placeholder="Enter code" required>
                    </div>
                   
                        <input class="btn solid" type="submit" name="check-reset-otp" value="Ingrese el codigo">
                   
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>