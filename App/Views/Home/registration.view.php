<?php /** @var Array $data */ ?>

<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-7 col-xl-7">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <?php if (isset($_SESSION['message'])): ?>

                                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                        <?php echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                        ?>
                                    </div>
                                <?php endif ?>

                                <form method="post" action="?c=home&a=register" class="mx-1 mx-md-4">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="re bi-envelope-open fa-lg me-3"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="email">Your Email</label>
                                            <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="re bi-person-circle fa-lg me-3"></i>
                                        <div class="form-outline flex-fill mb-0 me-2">
                                            <label for="firstName">Your First Name</label>
                                            <input type="text" id="firstName" name="firstName" class="form-control" required/>
                                        </div>
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="lastName">Your Last Name</label>
                                            <input type="text" id="lastName" name="lastName" class="form-control" required/>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="re bi-lock fa-lg me-3"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="password">Your Password</label>
                                            <input type="password" id="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="submit" value="Register" id="submit" class="btn1">
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
