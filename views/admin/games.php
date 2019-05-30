<h1 class="title">Igrice</h1>
    <form action="php/insert_game.php" method="post" enctype="multipart/form-data" class="form-admin-gallery">
        <input name="title" class="form-control textbox-form" type="text" placeholder="Naziv"/>
        <input name="description" class="form-control textbox-form" type="text" placeholder="Opis"/>
        <input name="price" class="form-control textbox-form" type="text" placeholder="Cena"/>
        <label for="picture" class="picture">Slika profilna:</label>
        <input name="picture" class="form-control textbox-form" type="file" id="picture">
        <label for="cover" class="picture">Slika naslovna:</label>
        <input name="cover" class="form-control textbox-form" type="file" id="cover">
        <input type="submit" name="btnInsert btn btn-primary" value="Dodaj"/>
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Slika profilna</th>
                <th>Slika naslovna</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM games";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $game):
            ?>
            <tr>
                <td><?= $game->title ?></td>
                <td><?= $game->description ?></td>
                <td><?= $game->price ?> Dinara</td>
                <td><img src="<?= $game->picture ?>" class="admin_game_pic"></td>
                <td><img src="<?= $game->cover ?>" class="admin_game_pic"></td>
                <td><a href="">Edit</a></td>
                <td><a href="admin.php?page=deletegame&value=<?= $game->id?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>