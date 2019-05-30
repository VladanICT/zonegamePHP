<section id="content">
          <div class="main">
            <div class="container_12">
              <div class="wrapper p5">
                <h1 class="title">Anketa</h1>
              </div>
              <div class="container-bot">
                <div class="container-top">
                  <div class="container">
                    <div class="wrapper">
                      <div class="questions">
                        <div id="anketa">
                        </div>
                        <div id="odgovori" class="odgovori">
                        </div>
                        <!-- <?php
                          // if(isset($_POST["glasaj"]))
                          // {
                          //   $id_answer = $_POST["odgovor"];
                          //   $id_question = $_POST["question"];
                          //   if(isset($_SESSION['admin'])){
                          //     $id_user = $_SESSION['admin']->id_user;
                          //   }
                          //   elseif(isset($_SESSION['user'])){
                          //     $id_user = $_SESSION['user']->id_user;
                          //   }

                          //   // echo $id_answer;
                          //   // echo "</br>";
                          //   // echo $id_question;
                          //   // echo "</br>";
                          //   // echo $id_user;

                          //   $upit = "INSERT INTO result VALUES('', ".$id_user.", ".$id_question.", ".$id_answer.")";
                            
                          //   $dataPrepare = $konekcija->prepare($upit);
                          //   // $dataPrepare->bindParam(":user", $id_user);
                          //   // $dataPrepare->bindParam(":question", $id_question);
                          //   // $dataPrepare->bindParam(":answer", $id_answer);
                          //   $dataPrepare->execute();
                          // }
                        ?> -->
                        <form style="padding-left:12px;" name="forma" action="79_a.php" method="post">
                        <?php
                        include('konekcija.php');
                        $pitanje="SELECT id_ankete, pitanje FROM ankete WHERE aktivna=1";
                        $rez1 = $konekcija->query($pitanje);
                        $niz1 = $rezultat ->fetchAll(PDO::FETCH_COLUMN, 0);
                        echo "<table><tr><td>". $niz1['pitanje'] ."</td></tr>";

                        $upit="SELECT odgovori, id_odgovori FROM odgovori o, ankete a WHERE a.aktivna=1
                        AND a.id_ankete=o.id_ankete";
                        $rez = $konekcija->query($upit);
                        foreach($rez as $red):
                        echo "<tr><td><input type='radio' name='odgovori' value=".$niz['id_odgovori']. ">"
                        .$niz['odgovori']." </td></tr>";
                        endforeach;

                        echo "<tr><td><input type='submit' name='glasaj' value='Glasaj' /></td></tr>";
                        echo "<tr><td><input type='submit' name='rez' value='Rezultati' /></td></tr>";
                        echo "</table></form>"; 
                        
                        $glasanje=$_POST['glasaj'];
                        $rezultati=$_POST['rez'];

                        if( isset( $glasanje ) ){
                        $odgovor=$_POST['odgovori'];
                        $upisi_odgovor='UPDATE rezultat SET rezultat=rezultat+1 WHERE
                        id_odgovori='.$odgovor;
                        $izvrsi_upisi_odgovor = $konekcija->query($upisi_odgovor);
                        if ($izvrsi_upisi_odgovor):
                        echo 
                        $odgovori = "SELECT o.odgovori, r.rezultat FROM odgovori o, rezultat r WHERE
                        o.id_odgovori = r.id_odgovori AND r.id_ankete =".$id;
                        $uzmi_odgovore = $konekcija->query($odgovori);
                        endif;
                        foreach($uzmi_odgovore as $red):
                        echo "<tr><td>".$red['odgovori']."</td><td>".$red['rezultat']."</td></tr>";
                        endforeach;
                        echo "</table>";
                        }

                        ?>
                        <a href="b.php">Unos nove ankete i aktivacija postojećih</a>
                        
                        
                        <?php ?>
                        
                        <form name="ankete" method="post" action="b.php">
                        <h2>Unesite novu anketu</h2><br>
                        Unesite pitanje:<input type="text" size="29" name="pitanje"><br><br>
                        Odgovori:&nbsp;&nbsp;&nbsp;
                        <textarea name="odgovori"></textarea><br><br>
                        <input type="submit" value="Unesi" name="unesi"><br><br>
                        </form>
                        <form name="aktivnost" method="post" action="b.php">
                        <h2>Postavi aktivnu anketu</h2><br>
                        Izaberite anketu:
                        <select name="aktivnost_ankete">
                        <option>Izaberite</option>
                        <?php
                        $upit="SELECT * FROM ankete";
                        $rezultat = $konekcija->query($upit);
                        foreach($rezultat as $niz):
                        echo '<option value="'.$niz['id_ankete'].'">'.$niz['pitanje'].'</option>';
                        endforeach;
                        ?> </select> 
                        
                        <input type="submit" value="Aktiviraj" name="aktiviraj"><br/>
                        <a href="79.php">Ankete</a>
                        </form>
                        <?php
                        $dugme_upis=$_POST['unesi'];
                        $dugme_aktiviraj=$_POST['aktiviraj'];
                        if( isset($dugme_upis) ){
                        $pitanje=$_POST['pitanje'];
                        $odgovori=$_POST['odgovori'];
                        $niz_odgovori=explode(';', $odgovori);
                        $broj=count($niz_odgovori);
                        $upis_pitanje="INSERT INTO ankete VALUES('', '$pitanje', 0)";
                        $izvrsi_upis_pitanje = $konekcija->query($upis_pitanje);
                        $izvuciID="SELECT id_ankete FROM ankete WHERE pitanje='$pitanje";
                        $izvrsi_izvuciID = $konekcija->query($izvuciID);
                        $red = $izvrsi_izvuciID ->fetchAll(PDO::FETCH_COLUMN, 0);
                        $id_ankete=$red['id_ankete'];
                        for($i = 0; $i < $broj; $i++){
                        $upis_odgovora = "INSERT INTO odgovori VALUES('', '$id_ankete’,
                        '$niz_odgovori[$i]’)”;
                        $konekcija->query($upis_odgovora);
                        $id_odgovor = "SELECT id_odgovori FROM odgovori WHERE id_ankete = '$id_ankete'
                        AND odgovori= "niz_odgovori[$i]"";
                        $uzmi_id_odgovor = $konekcija->query($id_odgovor);
                        $niz_id_odgovor = $uzmi_id_odgovor ->fetchAll(PDO::FETCH_COLUMN, 0);
                        $id_odgovor= $niz_id_odgovor[0];
                        $upis_rezultati = "INSERT INTO rezultat VALUES('', '$id_ankete', '$id_odgovor', '0')";
                        $upis = $konekcija->query( $upis_rezultati );
                        }
                        if($upis ) {
                        echo 'Anketa je upisana!';}
                        }
                        if(isset($dugme_aktiviraj)){
                        $aktivnost=$_POST['aktivnost_ankete'];
                        $aktiviraj="UPDATE ankete SET aktivna=1 WHERE id_ankete=".$aktivnost;
                        $deaktiviraj="UPDATE ankete SET aktivna=0 WHERE id_ankete <>"
                        .$aktivnost;
                        $izvrsi_deaktiviraj= $konekcija->query($aktiviraj);
                        $izvrsi_aktiviraj= $konekcija->query($deaktiviraj);
                        if($izvrsi_aktiviraj)
                        {echo 'Anketa je uspešno aktivirana!‘;}
                        } ?> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>