<?php
//take information about the orders, users, and products from the database 
require_once('./require/connect.php');
$sql = 'SELECT*FROM orders
        INNER JOIN users ON orders.user_id = users.id
        INNER JOIN products ON orders.product_id = products.id';

$statement = $pdo -> prepare($sql);
$statement -> execute();
$orders = $statement -> fetchAll(); //save query result in an array
// var_dump($orders);
?>

<?php require_once('require/header.php'); ?>
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
      <td><?php echo $order['full_name'] ?></td>
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
