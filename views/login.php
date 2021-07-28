<h1>Login</h1>

<?php if (isset($_SESSION['reg_success'])){ ?>
<div class="alert alert-success" role="alert">
    <?php
        echo $_SESSION['reg_success'];
    ?>
</div>
<?php
    }
    unset($_SESSION['reg_success']);
?>

<form action="" method="post">
    
    <label for="email">Your Email</label>
    <input type="email" name="email" id="email">
    <?php 
        if(isset($email_err)){
            echo '<span>'. $email_err .'</span>'; 
        }
    ?>
    
    <br><br>

    <label for="password">Your Password</label>
    <input type="password" name="password" id="password">  
    <?php 
        if(isset($pass_err)){
            echo '<span>'. $pass_err .'</span>'; 
        }
    ?>

    <br><br>

    <input type="submit" name="login" value="Login">
</form>