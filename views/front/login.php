<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    <form method="POST" class="login_form">
                        <div id="form-head">
                            <h5 id="form-title">Logovanje</h5>
                        </div>
                        <div class="form-group element-form">
                            <!-- <label for="autocomplete" class="lb">Naslov oglasa</label> -->
                            <input type="text" id="email" name="email" class="tbForm tbAutocomplete form-control" placeholder="Korisnicko ime"/>
                        </div>
                        <div class="form-group element-form">
                            <!-- <label class="lb">Naslov</label> -->
                            <input type="password" name="password" class="tbForm form-control" placeholder="Sifra"/>
                        </div>
                        <a href="index.php?page=register" class="register">Registrujte se</a>
                        <input type="submit" value="Prijavi se" name="btnLogin" class="btn btn-primary form_btn">
                        <?php
                          include "php/login.php";
                        ?>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>