<?php /** @var Array $data */ ?>

<?php foreach($data['adds'] as $post) {
    if ($post->getId() == $_SESSION['id']) {
        $add = $post;
    }}?>



<!--ADD PRODUCT-->
<div class="container py-5">
    <form method="post" action="?c=home&a=updateProduct&productid=<?= $add->getId() ?>">

        <div class="mb-4">
            <label>Názov produktu</label>
            <input type="text" class="form-control" name="name" value="<?= $add->getName()?>">
        </div>

        <div class="mb-4">
            <label>Číslo produktu</label>
            <input type="text" class="form-control" name="product_number" value="<?= $add->getProductNumber()?>">
        </div>

        <div class="mb-4">
            <label>Cena</label>
            <input type="text" class="form-control" name="price" value="<?= $add->getPrice()?>">
        </div>

        <div class="mb-4">
            <label>Cena bez DPH</label>
            <input type="text" class="form-control" name="price_withoutVAT" value="<?= $add->getPriceWithoutVAT()?>">
        </div>

        <div class="mb-4">
            <label>Počet kusov</label>
            <input type="number" class="form-control" name="amount" value="<?= $add->getAmount()?>">
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Update</button>


    </form>
</div>
