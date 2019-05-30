<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <h1 class="title">Lista Igrica</h1>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    <?php 
                        $koliko_po_strani = 5;
                        if($_GET['skriveno']) {$skriveno = $_GET['skriveno'];}
                        else {$skriveno = 0;}
                        $upit = $konekcija->query( "SELECT count(id) from games" );
                        $niz = $upit ->fetchAll(PDO::FETCH_COLUMN, 0);

                        $upit = $konekcija->query( "SELECT * FROM games" );
                        $niz1 = $upit ->fetchAll(PDO::FETCH_COLUMN, 0);

                        $ukupno_zapisa = $niz[0];
                        $levo = $skriveno - $koliko_po_strani;
                        $desno = $skriveno + $koliko_po_strani;
                      
                      // Zaglavlje tabele sa navigacijom
                      echo ("<table width=\"150px\"><tr><td width=\"50px\">");
                        if($levo<0)
                      {echo (" Početak </td><td width=\"50px\"><a href=\"index.php?page=games&skriveno=$desno\">
                      Naredni </a>");}
                      elseif($desno > $ukupno_zapisa)
                        {echo (" <a href=\"index.php?page=games&skriveno=$levo\"> Prethodni </a></td><td
                      width=\"50px\"> Kraj ");} 
                      
                      else {
                      echo ("<a href=\"index.php?page=games&skriveno=$levo\"> Prethodni </a></td>
                      <td width=\"50px\"><a href=\"index.php?page=games&skriveno=$desno\"> Naredni </a>");}
                      echo ("</td></tr>");
                      
                      $upit = "SELECT * FROM games LIMIT $koliko_po_strani OFFSET $skriveno ";
                      $rezultat = $konekcija->query($upit);
                      
                        foreach($rezultat as $game):
                      ?>
                          <div class="article">
                          <a class="fancybox" rel="group" href="<?= $game->picture ?>"><img src="<?= $game->picture ?>" alt="<?= $game->title ?>" class="game-img"/></a>
                            <div class="article-dsc">
                              <h4 class="article-title"><?= $game->title ?></h4>
                              <p class="price"><b><?= $game->price ?> Dinara</b></p>
                              <a href="index.php?page=game&value=<?= $game->id ?>" class="btn btn-primary">Download</a>
                            </div>
                          </div>
                      <?php
                        endforeach;
                      
                      echo "</table>";

                      // $limit = 5; //broj ispisa po stranici
                      // $no_list = 5; //menjanje broja linkova za ispis stranice, min je 3
                      // //(npr. $no_list =5 -> < 1 2 3 4 5> ; $no_list = 2 -> < 1 2 >;
                      // $max = get_max();
                      
                      // $tmp = $max / $limit;
                      // $br_strana = intval($tmp) + 1;
                      // if($no_list>$br_strana) {$no_list = $br_strana;}
                      // elseif ($no_list < 3) {$no_list = 3;}
                      // if($_GET['strana']){
                      // $str = $_GET['strana'];
                      // $of = ($str-1)*$limit;}
                      // else{
                      // $str = 1;
                      // $of = 0;} 
                      // $l1 = $str-1;
                      // $l2 = $str+1;
                      // if($l1<1){
                      // echo "<table><tr><td> <= </td><td>";
                      // shift($limit, $br_strana, $str,$no_list);
                      // echo "</td><td><a href=\"index.php?strana=$l2\"> => </a></td></tr>";}
                      // elseif($l2 > $br_strana){
                      // echo "<table><tr><td><a href=\"index.php?strana=$l1\"> <= </a></td<td>";
                      // shift($limit, $br_strana, $str, $no_list);
                      // echo"</td><td> => </td></tr>";}
                      // else{
                      // echo "<table><tr><td><a href=\"index.php?strana=$l1\"> <= </a></td><td>";
                      // shift($limit, $br_strana, $str,$no_list);
                      // echo"</td><td><a href=\"index.php?strana=$l2\"> => </a></td></tr>";}
                      // ispisi($limit, $of);

                      // function shift($lmt, $strane, $str, $list)
                      // {
                      // $n1 = (int)round($list/2);
                      // $n2 = (int)($list/2);
                      // $od = $str-$n1;
                      // $do = $str+$n2;
                      // if($od<0) {
                      // $od = 0;
                      // $do = $od +$list;
                      // }
                      // if($do>$strane) {
                      // $do=$strane;
                      // $od = $strane-$list;
                      // }
                      // for ($i = $od; $i<$do; $i++){
                      // $b = $i+1;
                      // if($b > $strane ) {continue;}
                      // echo "<a href=\"index.php?strana=$b\"> $b </a>&nbsp;";
                      // }
                      // }

                      // function get_max()
                      // {
                      //   include "php/connection.php";
                      // // $cnt = $konekcija->query( "SELECT count(id) from games" );
                      // $upit = $konekcija->query( "SELECT count(id) from games" );
                      // return $upit;
                      // // foreach($cnt as $c):
                      // // $count = $c;
                      // // return $count;
                      // // endforeach;
                      // }
                      // function ispisi($limit, $ofs)
                      // {
                      // $upit = "SELECT * FROM games LIMIT $limit OFFSET $ofs";
                      // $rezultat = $konekcija->query($upit);
                      // foreach($rezultat as $r):
                      // echo "<tr><td colspan=\"2\">".$r['text']."</td></tr>";
                      // endforeach;
                      // echo "</table>";
                      // }



                      foreach($result as $game):
                    ?>
                    
                    <?php
                      endforeach;
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>