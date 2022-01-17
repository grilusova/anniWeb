<?php /** @var Array $data */ ?>


<?php if ($data['error'] != "") {?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['error'] ?>
    </div>
<?php } ?>

<!--ADD PRODUCT-->
  <div class="container py-5">
      <form method="post" enctype="multipart/form-data" action="?c=home&a=upload" id="addForm">


        <?php if (isset($_SESSION['message'])): ?>

            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

    <div class="row">
        <div class="col-11 mb-4">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="col mb-4">
            <i class="bi bi-question-circle" onmouseover="showHint()"></i>
            <p id="otazka">Zadaj názov</p>
        </div>
    </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label  for="product_number">Product Number</label>
                <input type="text" class="form-control" pattern="[0-9]+" name="product_number" id="product_number" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint2()"></i>
                <p id="otazka2">akceptuje len čísla</p>
            </div>
        </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label for="price">Price</label>
                <input type="text" class="form-control" pattern="^[0-9]+[,]+[0-9]{2}$" name="price" id="price" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint3()"></i>
                <p id="otazka3">Musí mať dve desatiné miesta, použite(,)</p>
            </div>
        </div>


        <div class="row">
            <div class="col-11 mb-4">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" pattern="^[0-9]+$" name="amount" id="amount" required>
            </div>
            <div class="col mb-4">
                <i class="bi bi-question-circle" onmouseover="showHint5()"></i>
                <p id="otazka5">Len celé čísla</p>
            </div>
        </div>

        <div class="row">
            <div class="col-11 mb-4">
                <label for="formFile" class="Form-label">Image</label>
                <input type="file" multiple class="form-control" name="file" id="image" onchange="return fileValidation()"  required>
            </div>
        </div>




        <div id="submit-info">
            Formulár obsahuje chyby a nie je možné ho odoslať.
        </div>
        <input type="submit" name="submit" value="Upload" id="submit" class="btn btn-primary">

    </form>
  </div>