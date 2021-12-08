<?php require_once('require/header.php'); ?>
<!-- add a prepared module  -->
<?php require_once('assets/mvc-logic/display-center.php'); ?>

<main>
<p></p>
<h1>Товары в обороте</h1>
<p>
  <a href="admin-add.php" class="btn btn-outline-success">Добавить новый товар</a>
</p>
<p>
  <a href="admin-manage-orders.php" class="btn btn-outline-primary">Управлять заказами</a>
</p>

<table class="table table-admin">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Изображение</th>
      <th scope="col">Имя</th>
      <th scope="col">Страна</th>
      <th scope="col">Описание</th>
      <th scope="col">Основной Текст</th>
      <th scope="col">Тэги</th>
      <th scope="col">Удалить</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($centers as $id => $center): //display each product seperately ?>
      <tr>
        <th scope="row"><?= $id ?></th>
        <td>
          <img src="<?= 'assets/mvc-logic/'. $center['image_path'] ?>" alt="fail to upload" class="img-thumbnail">
        </td>
        <td><?= $center['name'] ?></td> 
        <td><?= $center['country'] ?></td>
        <td><?= $center['description'] ?></td>
        <td><?= $center['body'] ?></td>
        <td><?= $center['tags'] ?></td>
        <td>
          <form action="./assets/mvc-logic/delete-center.php" method="POST">
            <button class="btn btn-outline-danger d-block" name="id" value="<?=$center['id'] ?>">Удалить</button>
          </form>
        </td>
      </tr>

    <?php endforeach ?>
  </tbody>
</table>
</main>

<?php  require_once('require/footer.php'); ?>