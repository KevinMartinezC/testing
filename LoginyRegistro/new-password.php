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
    <title>Create a New Password</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
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
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                   <div class="input-field">
             <i class="material-icons">vpn_key</i>
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    
                        <input class="btn solid" type="submit" name="change-password" value="Change">
                  
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>