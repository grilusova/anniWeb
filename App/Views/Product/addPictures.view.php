<?php /** @var Array $data */ ?>

<?php foreach($data['adds'] as $post) {
    if ($post->getId() == $_SESSION['id']) {
        $add = $post;
    }}?>

<div class="addPicture container py-5">

    <?php if (isset($_SESSION['message'])): ?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <form class="pictureFrom" method="post" enctype="multipart/form-data" action="?c=product&a=uploadPictures">


        <input type="hidden" id="id" name="id" value="<?= $add->getId() ?>">

        <div class="row">
            <div class="col-11 mb-4">
                <label class="Form-label">Insert Images</label>
                <input type="file" multiple accept="image/*" name="image[]" id="image" onchange="return fileValidation()" required>
            </div>
        </div>


        <input type="submit" name="submit" value="Upload" id="submit" class="btn btn-primary">

    </form>
</div>
