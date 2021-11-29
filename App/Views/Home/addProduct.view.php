<?php /** @var Array $data */ ?>




<!--ADD PRODUCT-->
  <div class="container py-5">
    <form method="post" action="?c=home&a=upload">

      <div class="mb-4">
        <label>Názov produktu</label>
        <input type="text" class="form-control" name="name">
      </div>

      <div class="mb-4">
        <label>Číslo produktu</label>
        <input type="text" class="form-control" name="product_number">
      </div>

      <div class="mb-4">
        <label>Cena</label>
        <input type="text" class="form-control" name="price">
      </div>

      <div class="mb-4">
        <label>Cena bez DPH</label>
        <input type="text" class="form-control" name="price_withoutVAT">
      </div>

      <div class="mb-4">
        <label>Počet kusov</label>
        <input type="number" class="form-control" name="amount">
      </div>


      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>