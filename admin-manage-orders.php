<?php require_once('require/header.php'); ?>

<?php 
require_once('./require/connect.php');
$sql = 'SELECT*FROM orders';
$statement = $pdo -> prepare($sql);
$statement -> execute();

$orders = $statement -> fetchAll();

// var_dump($orders);
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Имя пользователя</th>
      <th scope="col">Название товара</th>
      <th scope="col">Количество</th>
      <th scope="col">Адрес доставки</th>
      <th scope="col">Дополнительная информация</th>
      <th scope="col">Дата заказа</th>
      <th scope="col">Статус</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $id => $order): ?>
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <td>
       <?php
       $sql = 'SELECT*FROM users WHERE id=:id';
       $statement = $pdo -> prepare($sql);
       $statement -> bindValue(':id', $order['user_id']);
       $statement -> execute();
       $user = $statement -> fetch();
       echo $user['full_name']; 
      ?>
      </td>
      <td><?php echo $order['product_name'] ?></td>
      <td><?php echo $order['quantity'] ?></td>
      <td><?php echo $order['shipment_location'] ?></td>
      <td><?php echo $order['additional_information'] ?></td>
      <td><?php echo $order['creation_date'] ?></td>
      <td><?php echo $order['approved'] ?></td>
      <td>
        <a href="./assets/mvc-logic/approve-order.php?id=<?php echo $order['id'] ?>" class="btn btn-sm btn-outline-success">Подтвердить</a>
        <a href="./assets/mvc-logic/refuse-order.php?id=<?php echo $order['id'] ?>" class="btn btn-sm btn-outline-danger">Отказать</a>

      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>


<?php require_once('require/footer.php'); ?>

<?php require_once('require/footer.php'); ?>