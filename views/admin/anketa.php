<h1 class="title">Pitanja</h1>
    <form action="php/insert_user.php" method="post" enctype="multipart/form-data" class="form-admin-gallery">
        <input name="question" type="text" class="form-control textbox-form" placeholder="Pitanje"/>
        <input name="active" type="text" class="form-control textbox-form" placeholder="Aktivan"/>
        <input type="submit" value="Dodaj" class="btn btn-primary" name="btnInsert"/>
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Pitanje</th>
                <th>Aktivno</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM pitanja";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $korisnik):
            ?>
            <tr>
                <td><?= $korisnik->pitanje ?></td>
                <td><?= $korisnik->aktivna ?></td>
                <td><a href="">Edit</a></td>
                <td><a href="admin.php?page=deleteusers&value=<?= $korisnik->id_user?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
    <h1 class="title">Odgovori</h1>
    <form action="php/insert_user.php" method="post" enctype="multipart/form-data" class="form-admin-gallery">
        <input name="question" type="text" class="form-control textbox-form" placeholder="Odgovor"/>
        <input name="active" type="text" class="form-control textbox-form" placeholder="Pitanje"/>
        <input type="submit" value="Dodaj" class="btn btn-primary" name="btnInsert"/>
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Odgovor</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM odgovori";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $korisnik):
            ?>
            <tr>
                <td><?= $korisnik->odgovori ?></td>
                <td><a href="">Edit</a></td>
                <td><a href="admin.php?page=deleteusers&value=<?= $korisnik->id_user?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
    <h1 class="title">Glasanja</h1>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Pitanje</th>
                <th>Odgovor</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM result r
                          JOIN users u ON r.id_user = u.id_user
                          JOIN pitanja p ON r.id_question = p.id_ankete
                          JOIN odgovori o ON r.id_answer = o.id_odgovori";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $korisnik):
            ?>
            <tr>
                <td><?= $korisnik->ime ?></td>
                <td><?= $korisnik->prezime ?></td>
                <td><?= $korisnik->pitanje ?></td>
                <td><?= $korisnik->odgovori ?></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>