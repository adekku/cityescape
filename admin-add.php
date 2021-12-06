<?php  require_once('require/header.php'); ?>

<main>
<p></p>
<h1>Добавить новый продукт</h1>
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
    <label class="form-label">Изображение</label>
    <input type="file" name="image_tourism_center" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Имя</label>
    <input type="text" name="name" placeholder="Kitkat" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Страна</label>
    <input type="text" name="country" placeholder="Russia" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Описание</label>
    <input type="text" name="description" placeholder="Серия шоколадных батончиков" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Основной Текст</label>
    <input type="text" name="body" placeholder="Срок годности: около 9 месяцев с даты изготовления. Хранить при температуре от +15 °C до +21 °C при относительной влажности не более 75 %." class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Тэги</label>
    <input type="text" name="tags" placeholder="шоколад, батончик, Nestle" class="form-control">
  </div>

  <button class="btn btn-success" type="submit">Добавить</button>
</form>
</main>

<?php  require_once('require/footer.php'); ?>
