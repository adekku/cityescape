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
    </div>
<?php require_once('require/footer.php'); ?>