<?php require_once('require/header.php'); ?>
<?php require_once('require/connect.php'); ?>
<!-- add a prepared module -->
<?php require_once('./assets/mvc-logic/shuffle-cards.php') ?>

  <main>
    <div class="container_wrapper">
      <section id="blog-list">
        <div class="grid_post_container">

        <!-- display each product seperately -->
          <?php foreach($centers as $center): ?>
            <div class="post-card"><a class="post-card__category" href="post.php?id= <?=$center['id'] ?>"><?=$center['tags'] ?></a>
            <!-- calculate image path in an html document using php -->
              <div class="post-card__featured-image" style="background-image: url(<?php echo '\''. './assets/mvc-logic/' . $center['image_path'].'\'' ?>);"></div>
              <div class="post-card__details">
                <h2>
                  <a href="post.php?id= <?=$center['id'] ?>"><?=$center['name'] ?></a>
                </h2>
                <p><?=$center['description'] ?> </p>
                <a class="post-card__avatar" href="post.php?id= <?=$center['id'] ?>">
                  <div class="avatar__name"><?=$center['country'] ?></div>
                  <div class="avatar__muted-line"></div></a>
              </div>
            </div>
            <!-- stop php from running -->
          <?php endforeach ?> 
        </div>
      </section>
    </div>
  </main>
<?php  require_once('require/footer.php'); ?>