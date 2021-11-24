<?php require_once('require/header.php'); ?>
<?php 
require_once('./require/connect.php');
// var_dump($_SESSION['user']['id']);
$sql = 'SELECT*FROM orders WHERE user_id=:user_id';
$statement = $pdo -> prepare($sql);
$statement ->bindValue(':user_id', $_SESSION['user']['id']);
$statement -> execute();

$orders = $statement -> fetchAll();

// var_dump($orders);
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Название товара</th>
      <th scope="col">Количество</th>
      <th scope="col">Адрес доставки</th>
      <th scope="col">Дополнительная информация</th>
      <th scope="col">Дата заказа</th>
      <th scope="col">Состояние заказа</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $id => $order): ?>
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <td><?php echo $order['product_name'] ?></td>
      <td><?php echo $order['quantity'] ?></td>
      <td><?php echo $order['shipment_location'] ?></td>
      <td><?php echo $order['additional_information'] ?></td>
      <td><?php echo $order['creation_date'] ?></td>
      <td><?php echo ( $order['approved'] == 0 ? 'в ожидании' : ($order['approved'] == 1 ? 'принят' : 'отклонен') ) ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>


<?php require_once('require/footer.php'); ?>