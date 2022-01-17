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
                <label>Product Name</label>
                <input type="text" class="form-control" name="name" id="nameUpdate" value="<?= $add->getName()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint()"></i>
                <p id="otazka">Enter a name</p>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Product Number</label>
                <input type="text" class="form-control" name="product_number" id="product_numberUpdate" pattern="[0-9]+" value="<?= $add->getProductNumber()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint2()"></i>
                <p id="otazka2">Only accepts numbers</p>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Price</label>
                <input type="text" class="form-control" name="price" id="priceUpdate" pattern="[0-9]+[,]+[0-9]{2}" value="<?= $add->getPrice()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint3()"></i>
                <p id="otazka3">Must have two decimal places use(,)</p>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label>Amount</label>
                <input type="number" class="form-control" name="amount" id="amountUpdate" min="0" step="1" value="<?= $add->getAmount()?>" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint5()"></i>
                <p id="otazka5">Integers only</p>
            </div>
        </div>



        <button type="submit" name="submit" class="btn btn-primary">Update</button>


    </form>
</div>
