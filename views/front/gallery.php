<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <h1 class="title">Galerija</h1>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                  <?php

                    include "php/gallery.php";

                    foreach ($result as $picture):
                      
                  ?>
                    <div class="pack">
                      <a class="fancybox" rel="group" href="<?= $picture->href ?>"><img src="<?= $picture->href ?>" alt="<?= $picture->alt ?>" class="img-pack"></a>
                    </div>
                  <?php

                    endforeach;

                  ?>

                    <!-- <div class="pack">
                      <img src="images/gallery/pic2.jpg" alt="" class="img-pack">
                    </div>
                    <div class="pack">
                      <img src="images/gallery/pic3.jpg" alt="" class="img-pack">
                    </div>
                    <div class="pack">
                      <img src="images/gallery/pic4.jpg" alt="" class="img-pack">
                    </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>