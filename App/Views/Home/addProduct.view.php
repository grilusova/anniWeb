<?php /** @var Array $data */ ?>


<?php if ($data['error'] != "") {?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['error'] ?>
    </div>
<?php } ?>

<!--ADD PRODUCT-->
  <div class="container py-5">
    <form method="post" action="?c=home&a=upload" id="addForm">

        <?php if (isset($_SESSION['message'])): ?>

            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

    <div class="row">
        <div class="col-11 mb-4">
            <label for="name">Názov produktu</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="col mb-4">
            <i class="bi bi-question-circle" onmouseover="showHint()"></i>
            <p id="otazka">Zadaj názov</p>
        </div>
    </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label  for="product_number">Číslo produktu</label>
                <input type="text" class="form-control" name="product_number" id="product_number" >
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint2()"></i>
                <p id="otazka2">akceptuje len čísla</p>
            </div>
        </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label for="price">Cena</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint3()"></i>
                <p id="otazka3">Musí mať dve desatiné miesta, použite(,)</p>
            </div>
        </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label for="price_withoutVAT">Cena bez DPH</label>
                <input type="text" class="form-control" name="price_withoutVAT" id="price_withoutVAT">
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint4()"></i>
                <p id="otazka4">Musí mať dve desatiné miesta, použite(,)</p>
            </div>
        </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label for="amount">Počet kusov</label>
                <input type="number" class="form-control" name="amount" id="amount">
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint5()"></i>
                <p id="otazka5">Len celé čísla</p>
            </div>
        </div>




        <div id="submit-info">
            Formulár obsahuje chyby a nie je možné ho odoslať.
        </div>
        <input type="submit" name="submit" value="Odoslať" id="submit" class="btn btn-primary">

    </form>
  </div>