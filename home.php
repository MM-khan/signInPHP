<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <title>Home Page</title>
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn danger" href="loginValid.php">Log Out</a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="bg-warning text-center mt-5">
        <h1>this is just a home page example</h1>
        <p class="col-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis 
            minima, iste natus animi vero nihil ratione itaque non minus atque? Aliquid,
            repellat optio quae quo doloremque ab. Unde, corrupti tempore?
        </p>
        <p class="col-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis 
            minima, iste natus animi vero nihil ratione itaque non minus atque? Aliquid,
            repellat optio quae quo doloremque ab. Unde, corrupti tempore?
        </p>
        <h2 class='bg-success text-light mt-5'>This Home Page Presents By <?php echo $_SESSION['name'] ?></h2>
        <p class="col-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis 
            minima, iste natus animi vero nihil ratione itaque non minus atque? Aliquid,
            repellat optio quae quo doloremque ab. Unde, corrupti tempore?
        </p>
    </div>
</body>
</html>