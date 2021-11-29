<!DOCTYPE html>
<html lang="sk">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>ANNI JEWELRY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jwuery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="public/css.css" type="text/css">

</head>
<body>

<!--Navigation-->

<nav class="navbar <?php if (!\App\Auth::isLogged()) { ?> navbar-expand-lg <?php }else{ ?> navbar-expand-xl  <?php } ?> navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img class="logo" src="public/img/logo1.png" alt="logo"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            <span class="navbar-toggler-icon"> </span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="navbar-nav m-auto my-2 my-lg-0">

                <li class="nav-item active">
                    <a class="nav-link" href="?c=home"">Home</a>
                </li>
                <?php if (!\App\Auth::isLogged()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=FAQ">FAQ</a>
                </li>
                <?php } ?>

                <?php if (\App\Auth::isLogged()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=addProduct">Add Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=display">Product List</a>
                </li>
                <?php } ?>
            </ul>


            <form class="d-flex">
                <input class="me-2 search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn0" type="submit">Search</button>
            </form>



            <?php if (!\App\Auth::isLogged()) { ?>
            <a class="icon" href="<?= \App\Config\Configuration::LOGIN_URL ?>"><i class="bi bi-person"></i></a>
            <?php } ?>


            <a class="icon" href="index.html"><i class="bi bi-bag"></i></a>


            <ul class="navbar-nav my-2 my-lg-0">
            <?php if (\App\Auth::isLogged()) { ?>
            <li class="nav-item">
                <a class="nav-link" href="?c=auth&a=logout">Logout</a>
            </li>
            <?php } ?>
            </ul>

        </div>
    </div>
</nav>



<div>
    <?= $contentHTML ?>
</div>



<!--Footer-->

<footer class="page-footer">
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <img class="bottom-logo" src="public/img/logo1.png" alt="logo">
                <hr class="light">
                <p>555-55-555</p>
                <p>email@mzemail.com</p>
                <p>100 street Name</p>
                <p>City, state, 0000</p>
            </div>

            <div class="col-md-4">
                <hr class="light">
                <h5>Our hours</h5>
                <hr class="light">
                <p>Monday:9am-5pm</p>
                <p>Saturday:10am-4pm</p>
                <p>Sunday:closed</p>
            </div>

            <div class="col-md-4">
                <hr class="light">
                <h5>Shipping/Return</h5>
                <hr class="light">

                <p><a class="nav-link-bottom" href="?c=home&a=FAQ">FAQ</a></p>

                <p><a class="nav-link-bottom" href="index.html">Payment method</a></p>

                <p><a class="nav-link-bottom"  href="index.html">Transport and delivery</a></p>

                <p><a class="nav-link-bottom"  href="index.html">How to return the goods?</a></p>

            </div>

            <div class="col-12">
                <hr class="light">
                <h5>&copy; ANNI.com</h5>
            </div>

        </div>
    </div>

</footer>

</body>
</html>

