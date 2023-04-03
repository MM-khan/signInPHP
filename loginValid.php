<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php' ?>
    <?php include 'signConnec.php' ?>
    <title>Log In</title>
</head>
<body>
    <div class="container bg-primary text-light  text-center">
        <div class="row">
            <h1>Log In Form</h1><br>
            <div class="col-4"></div>
            <div class="col-sm-12 col-md-4 rounded bg-light text-primary mb-5"><br>
                <a href="#" class='bg-danger rounded py-2 px-5 my-3'>Signup from Google</a><br><br>
                <a href="#"class='bg-primary rounded text-light py-2 px-5'>Signup from facebook</a><br><br>
                
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='POST'>
                    
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Email</span>
                        <input type="email" name='mail' class="form-control" placeholder="enter your email *" aria-label="Username" aria-describedby="addon-wrapping"
                        value="<?php if(isset($_COOKIE['emailCookie'])){echo $_COOKIE['emailCookie']; } ?>">
                    </div><br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Password</span>
                        <input type="password" name='pass' class="form-control" placeholder="enter your password *" aria-label="Username" aria-describedby="addon-wrapping"
                        value="<?php if(isset($_COOKIE['passwordCookie'])){echo $_COOKIE['passwordCookie']; } ?>">
                    </div><br>
                    <input type="checkbox" name='remember'> Remember Me <br>
                    <input type="submit" name='submit' class='rounded my-3 btn btn-primary' value='Log In'>
                    
                    <p>Forget Password No Worry? <a href="recoverPass.php">Click Here</a></p>
                    <p>Not Have An Account? <a href="signValid.php">Signup</a></p>
                </form><br><br><br>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $email= $_POST['mail'];
        $pass= $_POST['pass'];

        $selectEmail = "select * from formvalid where email ='$email' ";
        $emailQuery = mysqli_query($signConnec,$selectEmail);
        $checkEmail = mysqli_num_rows($emailQuery);

        if($checkEmail){
            $fetchPass = mysqli_fetch_assoc($emailQuery);

            $checkPass = $fetchPass['password'];
            $_SESSION['name']= $fetchPass['name'];

            $decodePass =password_verify($pass,$checkPass); 
        
            if($decodePass){
                if(isset($_POST['remember'])){
                setcookie("emailCookie",$email,time()+15);
                setcookie("passwordCookie",$pass,time()+15);
                ?>
                <script>
                    alert("login successful");
                    location.replace('home.php');
                </script>
                <?php
                }else{
                    ?>
                    <script>
                        alert("login successful");
                        location.replace('home.php');
                    </script>
                    <?php 
                }
            }else{
                ?>
                <script>
                    alert("incorrect Password")
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("invalid Email")
                </script>
            <?php
        }
    }
?>