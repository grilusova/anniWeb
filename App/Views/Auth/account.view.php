<?php /** @var Array $data */ ?>


<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-5 col-xl-5">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Your account</p>

                                <?php if (isset($_SESSION['message'])): ?>

                                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                        <?php echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                        ?>
                                    </div>
                                <?php endif ?>
                                <div class="d-flex flex-row align-items-center mb-4">

                                    <table class="table">

                                        <tbody>

                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo \App\Auth::getName() ?></td>
                                        </tr>
                                        <tr>
                                            <th>First Name</th>
                                            <td><?php echo \App\Auth::getFirstName1() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?php echo \App\Auth::getLastName1() ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger">Delete</button>
                                </div>



                                <div id="id01" class="modal">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                        <div class="containeraccount">
                                            <h1>Delete Account</h1>
                                            <p>Are you sure you want to delete your account?</p>

                                            <div class="clearfix">
                                                <a href="?c=auth&a=account" class="btn btn-primary">Cancel</a>
                                                <a href="?c=auth&a=deleteAccount&personid=<?= \App\Auth::getId1() ?>" class="btn btn-danger">Delete</a>

                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>