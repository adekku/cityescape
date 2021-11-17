<?php require_once('require/header.php'); ?>
<?php require_once('assets/mvc-logic/display-center.php'); ?>

<main>
<p></p>
<h1>Current tourism centers</h1>
<p>
  <a href="admin-add.php" class="btn btn-outline-success">Add tourism center</a>
</p>

<table class="table table-admin">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">country</th>
      <th scope="col">description</th>
      <th scope="col">body</th>
      <th scope="col">tags</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($centers as $id => $center): ?>
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
            <button class="btn btn-outline-danger d-block" name="id" value="<?=$center['id'] ?>">delete</button>
          </form>
        </td>
      </tr>

    <?php endforeach ?>
  </tbody>
</table>
</main>

<?php  require_once('require/footer.php'); ?>