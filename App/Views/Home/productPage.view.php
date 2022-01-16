<?php /** @var Array $data */ ?>

<section class="product">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
            </div>
        </div>

        <?php if (isset($_SESSION['message'])): ?>

            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <div class="row">
            <?php foreach ($data['adds'] as $add) { ?>
            <div class="col-lg-3 text-center">
                <div class="card">
                    <div CLASS="card-body">
                        <a href="?c=home&a=singleProduct&productid=<?= $add->getId() ?>">
                        <img src="<?= \APP\Config\Configuration::UPLOAD_DIR . $add->getImage() ?>"  class="w-100" alt="...">
                        </a>
                    </div>
                </div>
                <h6><?php echo $add->getName() ?></h6>
                <p><?php echo $add->getPrice() ?> €</p>
            </div>
            <?php } ?>
        </div>



    </div>
</section>
