<h1 class="title">Korisnici</h1>
    <form action="php/insert_user.php" method="post" enctype="multipart/form-data" class="form-admin-gallery">
        <input name="firstname" class="form-control textbox-form" type="text" placeholder="Ime"/>
        <input name="lastname" class="form-control textbox-form" type="text" placeholder="Prezime"/>
        <input name="username" class="form-control textbox-form" type="text" placeholder="Korisnicko ime"/>
        <input name="email" class="form-control textbox-form" type="text" placeholder="E-mail"/>
        <input name="password" class="form-control textbox-form" type="password" placeholder="Lozinka"/>
        <input name="role" class="form-control textbox-form" type="text" placeholder="Uloga"/>
        <input type="submit" value="Dodaj" class="btn btn-primary" name="btnInsert"/>
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Korisnicko ime</th>
                <th>Lozinka</th>
                <th>Uloga</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM users u INNER JOIN roles r ON u.id_role = r.id";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $korisnik):
            ?>
            <tr>
                <td><?= $korisnik->ime ?></td>
                <td><?= $korisnik->prezime ?></td>
                <td><?= $korisnik->username ?></td>
                <td><?= $korisnik->pass ?></td>
                <td><?= $korisnik->role ?></td>
                <td><a href="">Edit</a></td>
                <td><a href="admin.php?page=deleteusers&value=<?= $korisnik->id_user?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>