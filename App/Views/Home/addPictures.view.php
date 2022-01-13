<?php /** @var Array $data */ ?>

<?php foreach($data['adds'] as $post) {
    if ($post->getId() == $_SESSION['id']) {
        $add = $post;
    }}?>

<div class="addPicture container py-5">
    <form class="pictureFrom" method="post" enctype="multipart/form-data" action="?c=home&a=uploadPictures">

        <input type="hidden" name="id" value="<?= $add->getId() ?>">

        <div class="row">
            <div class="col-11 mb-4">
                <label for="formFile" class="Form-label">Insert Images</label>
                <input type="file" multiple accept=".jpg, .png, .gif" name="image[]" id="image">
            </div>
        </div>


        <input type="submit" name="submit" value="Upload" id="submit" class="btn btn-primary">

    </form>
</div>
