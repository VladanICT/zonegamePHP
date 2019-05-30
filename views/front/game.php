<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <h1 class="title">Igrica</h1>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    <img src="<?= $game->cover ?>" alt="<?= $game->title ?>" class="game-cover">
                    <div class="article-dsc">
                        <h3 class="game-title"><?= $game->title ?></h3>
                        <p class="game-description"><?= $game->description ?></p>
                        <p class="game-price"><?= $game->price ?> Dinara</p>
                        <?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])):?>
                          <a href="index.php?page=login" class="btn btn-warning">Uloguj se da bi narucio.</a>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])):?>
                          <a href="" class="btn btn-primary">Kupi</a>
                        <?php endif; ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>