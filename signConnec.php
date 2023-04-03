<?php 
    $user="root";
    $password='';
    $server="localhost";
    $db="login";

    $signConnec = mysqli_connect($server,$user,$password,$db);
    if($signConnec){
        ?>
            <script>
                alert("connection successful.")
            </script>
        <?php
        
    }else{
        ?>
            <script>
                alert("connection failed.")
            </script>
        <?php
    }
?>