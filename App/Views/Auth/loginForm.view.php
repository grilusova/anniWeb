<?php /** @var Array $data */ ?>


<!--LOGIN IN-->

<div class="container-fluid">
    <div class="row login ">
        <div class="col-md">
            <div class="leftside">
                <?php if ($data['error'] != "") {?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                       <?php echo $data['error'] ?>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['message'])): ?>

                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
                        <?php echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif ?>

                <p class="nadpis">Are you already registered?</p>
                <form method="post" action="?c=auth&a=login">
                    <div class="mb-3">
                        <label  class="form-lable">Email</label>
                        <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-lable">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" id="loginSubmit" class="btn1">Log In</button>
                </form>


            </div>
        </div>

        <div class="col-md-6 text-center" id="rightsidegrey">
            <div class="rightside">

                <p class="nadpis">Is this your first time shopping?</p>
                <form method="post" action="?c=home&a=registration">
                <button type="submit" class="btn1">Create Account</button>
                </form>
                <h5>YOU CAN GET</h5>
                <p><i class="bi bi-envelope-open"></i>10% discount on newsletter subscription</p>
                <p><i class="bi bi-search"></i>A convenient way to track your order</p>
                <p><i class="bi bi-stopwatch"></i>Easy access to order history</p>

            </div>
        </div>

    </div>
</div>
