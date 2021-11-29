<?php /** @var Array $data */ ?>



<!--LOGIN IN-->

<div class="container-fluid">
    <div class="row login ">
        <div class="col-md">
            <div class="leftside">

                <?php if ($data['error'] != "") {?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Chyba!</strong> Nesprávne meno alebo heslo.
                    </div>
                <?php } ?>

                <p class="nadpis">Are you already registered?</p>
                <form method="post" action="?c=auth&a=login">
                    <div class="mb-3">
                        <label for="exampleForControlInput1" class="form-lable">Email</label>
                        <input type="email" class="form-control" name="login" id="exampleForControlInput1" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleForControlInput2" class="form-lable">Heslo</label>
                        <input type="password" class="form-control" name="password" id="exampleForControlInput2" required>
                    </div>
                    <button type="submit" class="btn1">Log In</button>
                </form>


            </div>
        </div>

        <div class="col-md-6 text-center" id="rightsidegrey">
            <div class="rightside">

                <p class="nadpis">Is this your first time shopping?</p>
                <button type="submit" class="btn1">Create Account</button>
                <h5>YOU CAN GET</h5>
                <p><i class="bi bi-envelope-open"></i>10% discount on newsletter subscription</p>
                <p><i class="bi bi-search"></i>A convenient way to track your order</p>
                <p><i class="bi bi-stopwatch"></i>Easy access to order history</p>

            </div>
        </div>

    </div>
</div>