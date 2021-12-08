<?php require_once('require/header.php'); ?>

<?php
require_once('./require/connect.php');
//take information about the orders, users, and products from the database 

$sql = 'SELECT*FROM orders 
        INNER JOIN users ON orders.user_id = users.id
        INNER JOIN products ON orders.product_id = products.id'; //multiple tables selection 

$statement = $pdo -> prepare($sql);
$statement -> execute();
$orders = $statement -> fetchAll(); //if the query returns something, store it in a variable or throw an error

foreach($orders as $key => $order) {
  $orders[$key] = array_except($order, ['password', 'image_path']);
  if($orders[$key]['approved'] == 0) {
    $orders[$key]['approved'] = 'в ожидании';
  } else if($orders[$key]['approved'] == 1) {
    $orders[$key]['approved'] = 'принят';
  } else {
    $orders[$key]['approved'] = 'отклонен';
  } //convert -1, 0, 1 to refused, pending, and accepted respectively
}

//unset key-value pairs in a given array
function array_except($array, $keys) {
  return array_diff_key($array, array_flip((array) $keys));   
} 
?>

<!-- nested loops -->
<table class="table">
  <thead>
    <?php foreach($orders as $id => $order): ?>
    <tr>
    <th scope="col"><?php echo $id?></th>
      <?php foreach($order as $name => $value): ?>
          <th scope="col"><?php echo $name ?></th>
      <?php endforeach ?>
      <th scope="col">action</th>
      <?php break ?>
      <?php endforeach ?>
  </thead>
  <tbody>
    <?php foreach($orders as $id => $order): ?>
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <?php foreach($order as $name => $value): ?>
          <td><?php echo $value ?></td>
      <?php endforeach ?>

      <td>
        <a href="./assets/mvc-logic/approve-order.php?id=<?php echo $order['id'] ?>" class="btn btn-sm btn-outline-success">Подтвердить</a>
        <a href="./assets/mvc-logic/refuse-order.php?id=<?php echo $order['id'] ?>" class="btn btn-sm btn-outline-danger">Отказать</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php require_once('require/footer.php'); ?>
