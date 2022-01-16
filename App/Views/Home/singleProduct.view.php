<?php /** @var Array $data */ ?>

<?php foreach($data['adds'] as $post) {
    if ($post->getId() == $_SESSION['id']) {
        $add = $post;
    }}?>

<section class="container sproduct my-5 pt-5">
    <div class="row mt-5">

        <div class="picture col-lg-5 col-md-12 col-12">
            <div class="row">
            <img class="img-fluid w-100 pb-1" src="<?= \APP\Config\Configuration::UPLOAD_DIR . $add->getImage() ?>" alt="..." id="MainImg" onclick="clickme(this)">

            <div class="small-img-group">
                <div class="small-image-col">
                    <img src="<?= \APP\Config\Configuration::UPLOAD_DIR . $add->getImage() ?>"  width="100%" class="smallimg"  alt="..." onclick="clickme(this)">
                </div>

                <?php foreach ($data['pics'] as $pic) { ?>
                <?php if(($pic->getProductId() == $add->getId()) && ($pic->getNumber() == 1 )) { ?>
                <div class="small-image-col">
                    <img src="<?= \APP\Config\Configuration::UPLOAD_DIR . $pic->getImage() ?>"  width="100%" class="smallimg"  alt="..." onclick="clickme(this)">
                </div>
                    <?php } ?>
                <?php } ?>

                <?php foreach ($data['pics'] as $pic) { ?>
                <?php if(($pic->getProductId() == $add->getId()) && ($pic->getNumber() == 2 )) { ?>
                <div class="small-image-col">
                    <img src="<?= \APP\Config\Configuration::UPLOAD_DIR . $pic->getImage() ?>" width="100%" class="smallimg"  alt="..." onclick="clickme(this)">
                </div>
                    <?php } ?>
                <?php } ?>


                <?php foreach ($data['pics'] as $pic) { ?>
                    <?php if(($pic->getProductId() == $add->getId()) && ($pic->getNumber() == 3 )) { ?>
                        <div class="small-image-col">
                            <img src="<?= \APP\Config\Configuration::UPLOAD_DIR . $pic->getImage() ?>" width="100%" class="smallimg"  alt="..." onclick="clickme(this)">
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>


            </div>
        </div>



        <div class="description col-lg-6 col-md-12 col-12 ">
            <h3 class="nazov py-2"><?= $add->getName()?></h3>
            <hr class="p light">
            <h3><?= $add->getPrice()?> €</h3>
            <h4 class="mt-5 mb-5">Product details</h4>
            <span>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
                atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
                sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis
                est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus
                id quod.</span>
            <hr class="p light">
            <input class="mnozstvo" type="number" value="1" max="<?= $add->getAmount()?>" min="0">
            <button class="btn1">Add to basket</button>
        </div>




        <hr class="dark">
        <p class="reviews text-center">Reviews</p>
        <hr class="dark">

        <table class="table">


            <tbody>
            <?php $pom = 1; ?>
            <?php foreach ($data['comm'] as $comm) { ?>
                <tr>
                    <?php if($comm->getProductId() == $_SESSION['id']){ ?>
                    <td class="riadok"><?php echo $pom ?></td>
                    <td class="riadok"><?php echo $comm->getText() ?></td>
                </tr>
                <?php $pom++; } ?>
            <?php } ?>


            </tbody>
        </table>

        <?php if ( \App\Auth::isLogged()) { ?>
        <form method="post" action="?c=home&a=addReview">
            <input type="hidden" name="id" value="<?= $add->getId() ?>">
            <input type="text" name="text" id="text" size="85" class="pole" placeholder="Write your review..."  required>
            <input type="submit" name="comment" value="Send" class="btn3">
        </form>
        <?php } ?>
    </div>
</section>