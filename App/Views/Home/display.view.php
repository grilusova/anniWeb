<?php /** @var Array $data */ ?>

<div class="productList">
<div class="container py-5">

   <?php if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
              unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <button class="btn4 btn-primary my-5">
        <a class="nav-link" href="?c=home&a=addProduct">Pridaj produkt</a>
    </button>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Kód produktu</th>
            <th scope="col">Názov</th>
            <th scope="col">Cena</th>
            <th scope="col">Cena bez DPH</th>
            <th scope="col">Počet ks</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($data['adds'] as $add) { ?>
        <tr>
            <td><?php echo $add->getProductNumber() ?></td>
            <td><?php echo $add->getName() ?></td>
            <td><?php echo $add->getPrice() ?></td>
            <td><?php echo $add->getPriceWithoutVAT() ?></td>
            <td><?php echo $add->getAmount() ?></td>
            <td>
                <a href="?c=home&a=update&productid=<?= $add->getId() ?>" class="btn btn-primary">Update</a>
                <a href="?c=home&a=delete&productid=<?= $add->getId() ?>" class="btn btn-danger">Delete</a>
                <a href="?c=home&a=addPictures&productid=<?= $add->getId() ?>" class="btn btn-secondary">Add pictures</a>

            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>



</div>
</div>
