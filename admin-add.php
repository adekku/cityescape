<?php  require_once('require/header.php'); ?>
<?php  require_once('require/session.php'); ?>

<main>
<p></p>
<h1>Add tourism center</h1>
<p>
  <a href="admin.php" class="btn btn-outline-primary">Back</a>
</p>

<?php
  //ensure that no null values are passed to the system
  if(isset($_SESSION['message'])){
    echo '<p class="alert alert-warning">'.$_SESSION['message'].'</p>';
    unset($_SESSION['message']);
  }
?>

<form action="./assets/mvc-logic/add-center.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image_tourism_center" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" placeholder="ex. Rixos" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Country</label>
    <input type="text" name="country" placeholder="ex. Turkey" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <input type="text" name="description" placeholder="Rixos offers exceptional escapes that go beyond the imagination to open a new world of horizons for our guests." class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Body</label>
    <input type="text" name="body" placeholder="At Rixos, all-inclusive is synonymous with luxury. Our unique All Inclusive – All Exclusive offering combines all-inclusive advantages with exclusive privileges." class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Tags</label>
    <input type="text" name="tags" placeholder="hotel, Asia, expensive" class="form-control">
  </div>

  <button class="btn btn-success" type="submit">Add</button>
</form>
</main>

<?php  require_once('require/footer.php'); ?>
