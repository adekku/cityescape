<?php require_once('require/header.php'); ?>
<?php require_once('require/connect.php'); ?>

<?php 
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: profile.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

$full_name = $user['full_name'];
$login = $user['login'];
$phone_number = $user['phone_number'];
$email = $user['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
    // $title = $_POST['title'];
    // $description = $_POST['description'];
    // $price = $_POST['price'];

    $statement = $pdo->prepare("UPDATE users SET full_name = :full_name, login = :login, phone_number = :phone_number, email = :email WHERE id = :id");

    $statement->bindValue(':full_name', $full_name);
    $statement->bindValue(':login', $login);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':id', $id);

    $statement->execute();
    header('Location: profile.php');

}

function randomString($n) {
  $characters = '0123456789abcdedghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  for($i = 0; $i<$n; $i++) {
    $index = rand(0, strlen($characters)-1);
    $str .= $characters[$index];
  }
  
  return $str;
}

?>


<h1>
    <a href="profile.php" class="btn btn-default">Back to profile</a>
</h1>
<h1>Update User: <b><?php echo $user['login'] ?></b></h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">Fullname</label>
      <input type="text" name="full_name" placeholder="examplelogin" value="<?php echo $full_name ?>" required>
    </div>

    <div class="form-group">
      <label for="">Login</label>
      <input type="text" name="login" placeholder="examplelogin" value="<?php echo $login ?>" required>
    </div>

    <div class="form-group">
      <label for="">Phone Number</label>
      <input type="text" name="phone_number" placeholder="+77712391337" value="<?php echo $phone_number ?>" required>
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="email" placeholder="examplelogin" value="<?php echo $email ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php require_once('require/footer.php'); ?>
