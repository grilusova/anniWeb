<?php /** @var Array $data */ ?>

<section class="product">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
            </div>
        </div>


        <div class="row">
            <?php foreach ($data['adds'] as $add) { ?>
            <div class="col-lg-3 text-center">
                <div class="card">
                    <div CLASS="card-body">
                        <img src="<?= \APP\Config\Configuration::UPLOAD_DIR . $add->getImage() ?>" class="w-100" alt="...">
                    </div>
                </div>
                <h6><?php echo $add->getName() ?></h6>
                <p><?php echo $add->getPrice() ?></p>
            </div>
            <?php } ?>
        </div>



    </div>
</section>
