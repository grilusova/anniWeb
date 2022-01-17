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
        <a class="nav-link" href="?c=home&a=addProduct">Add Product</a>
    </button>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product Code</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Price Without VAT</th>
            <th scope="col">Amount</th>
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
                <a onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger">Delete</a>
                <a href="?c=home&a=addPictures&productid=<?= $add->getId() ?>" class="btn btn-secondary">Add pictures</a>

            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="/action_page.php">
            <div class="containeraccount">
                <h1>Delete Account</h1>
                <p>Are you sure you want to delete your account?</p>

                <div class="clearfix">
                    <a href="?c=home&a=display" class="btn btn-primary">Cancel</a>
                    <a href="?c=home&a=delete&productid=<?= $add->getId() ?>" class="btn btn-danger">Delete</a>

                </div>
            </div>
        </form>
    </div>

</div>
</div>
