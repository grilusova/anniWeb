<?php /** @var Array $data */ ?>

<?php foreach($data['adds'] as $post) {
    if ($post->getId() == $_SESSION['id']) {
        $add = $post;
    }}?>



<!--ADD PRODUCT-->
<div class="container py-5">
    <form method="post" action="?c=home&a=updateProduct&productid=<?= $add->getId() ?>" >



        <div class="row">
            <div class="col-11 mb-4">
                <label>Názov produktu</label>
                <input type="text" class="form-control" name="name" id="nameUpdate" value="<?= $add->getName()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint()"></i>
                <li id="otazka">Zadaj meno</li>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Číslo produktu</label>
                <input type="text" class="form-control" name="product_number" id="product_numberUpdate" pattern="[0-9]+" value="<?= $add->getProductNumber()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint2()"></i>
                <li id="otazka2">akceptuje len čísla</li>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Cena</label>
                <input type="text" class="form-control" name="price" id="priceUpdate" pattern="[0-9]+[,]+[0-9]{2}" value="<?= $add->getPrice()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint3()"></i>
                <li id="otazka3">Musí mať dve desatiné miesta, použite(,)</li>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Cena bez DPH</label>
                <input type="text" class="form-control" name="price_withoutVAT" id="price_withoutVATUpdate" pattern="[0-9]+[,]+[0-9]{2}" value="<?= $add->getPriceWithoutVAT()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint4()"></i>
                <li id="otazka4">ZMusí mať dve desatiné miesta, použite(,)</li>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Počet kusov</label>
                <input type="number" class="form-control" name="amount" id="amountUpdate" pattern="[0-9]+" value="<?= $add->getAmount()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint5()"></i>
                <li id="otazka5">Len celé čísla</li>
            </div>
        </div>



        <button type="submit" name="submit" class="btn btn-primary">Update</button>


    </form>
</div>
