<?php require_once('require/header.php'); ?>
<?php require_once('./assets/mvc-logic/view-post.php'); ?>

  <body id="post__single-page">
    <div class="container_wrapper">
      <section id="post-featured-image">
        <div class="post__featured-image" style="background-image: url(<?php echo '\''. './assets/mvc-logic/' . $center['image_path'].'\'' ?>);">
          <div class="post__title-container">
            <h2>
              <?php echo $center['name'] ?>
            </h2>
            <div class="post__avatar-container">
              <div class="post__avatar-name">
                <h5>Страна:</h5>
                <p><?php echo $center['country'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="post-content">
        <div class="post__content">
          <h2>Описание</h2>
          <p>
            <?php echo $center['description'] ?>
          </p>
          <h2>Основная информация</h2>
          <p>
            <?php echo $center['body'] ?>
          </p>
        </div>
        <div class="post__tags">
          <h6>Тэги: <?php echo $center['tags'] ?> </h6>
        </div>
      </section>

      <h1>Оформить Заказ</h1>
      <!-- <?php var_dump($center) ?> -->
      <!-- <?php var_dump($_SESSION['user']['id']); ?> -->
      <form action="./assets/mvc-logic/make-order.php/?user_id=<?php echo $_SESSION['user']['id'] ?>&product_id=<?php echo $center['id'] ?>&product_name=<?php echo $center['name']?>" method="POST">
        <div>
          <label for="">Количество(шт)</label>
          <input type="number" name="quantity" class="form-control" required>
        </div>

        <div>
          <label for="">Адрес доставки</label>
          <input type="text" name="shipment_location" class="form-control" placeholder="" required>            
        </div>

        <div>
          <label for="">Дополнительная информация</label>
          <textarea name="additional_information" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit">Отправить заказ на рассмотрение</button>
      </form>
    </div>

    <?php
      // display errors if any
      if(isset($_SESSION['order_status'])){
          echo '<p class="msg">'.$_SESSION['order_status'].'</p>';
          unset($_SESSION['order_status']);
      }

    ?>

<?php require_once('require/footer.php'); ?>