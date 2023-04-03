<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php' ?>
    <?php include 'signConnec.php' ?>
    <title>SignUp Form</title>
</head>
<body>
    <div class="container bg-primary text-center">
        <div class="row">
            <h1>SignUp Form</h1>
            <div class="col-4"></div>
            <div class="col-4 rounded bg-light text-primary mb-5"><br>
                <a href="#" class='bg-danger rounded py-2  px-5 my-3'>Signup from Google</a><br><br>
                <a href="#"class='bg-primary rounded text-light py-2  px-5 '>Signup from facebook</a><br><br>
                <form action="" method='POST'>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">USer Name</span>
                        <input type="text" name='name' class="form-control" placeholder="enter your Name *" aria-label="Username" aria-describedby="addon-wrapping">
                    </div><br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Email</span>
                        <input type="email" name='email' class="form-control" placeholder="enter your email *" aria-label="Username" aria-describedby="addon-wrapping">
                    </div><br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Password</span>
                        <input type="password" name='pass' class="form-control" placeholder="enter your password *" aria-label="Username" aria-describedby="addon-wrapping">
                    </div><br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Confirm Pass</span>
                        <input type="password" name='cpass' class="form-control" placeholder="enter your Confirm password *" aria-label="Username" aria-describedby="addon-wrapping">
                    </div><br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Mobile</span>
                        <input type="number" name='mob' class="form-control" placeholder="enter your Mobile No *" aria-label="Username" aria-describedby="addon-wrapping">
                    </div><br>

                    <input type="submit" class="btn btn-primary rounded my-3 px-5" name='submit' value='Sign Up'>
                    
                    <p>Click Here Go To <a href="loginValid.php">LogIn</a></p>
                </form>
            </div><br><br>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($signConnec,$_POST['name']);
        $email = mysqli_real_escape_string($signConnec,$_POST['email']);
        $pass = mysqli_real_escape_string($signConnec,$_POST['pass']);
        $cpass = mysqli_real_escape_string($signConnec,$_POST['cpass']);
        $mob = mysqli_real_escape_string($signConnec,$_POST['mob']);

        $password = password_hash($pass,PASSWORD_BCRYPT);
        $cPassword = password_hash($cpass,PASSWORD_BCRYPT);

        $token= bin2hex(random_bytes(15));

        $emailQuery = "select * from formvalid where email='$email' ";
        $query = mysqli_query($signConnec,$emailQuery);
        $emailValid = mysqli_num_rows($query);

        if($emailValid>0){
            ?>
                <script>
                    alert("email already Exits");
                </script>
            <?php
        }else{

            if($pass === $cpass){
                $signData = "insert into formvalid (name,email,password,confirmPass,mobileNo,token)
                value('$username','$email','$password','$cPassword','$mob','$token')";

                $signQuery = mysqli_query($signConnec,$signData);
                if($signQuery){
                    ?>
                    <script>
                        alert("validation successful");
                        location.replace('loginValid.php');
                    </script>
                <?php
                }else{
                    ?>
                    <script>
                        alert("error");
                    </script>
                <?php
                }
            }else{
                ?>
                    <script>
                        alert("Password not Matching");
                    </script>
                <?php
            }
        }
    }
    
        
?>