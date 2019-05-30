<h1 class="title">Galerija</h1>
    <form action="php/insert_menu.php" method="post" enctype="multipart/form-data" class="form-admin-gallery">
        <input name="title" class="form-control textbox-form" type="text" placeholder="Title">
        <input name="page" class="form-control textbox-form" type="text" placeholder="Strana">
        <input type="submit" value="Add" class="gallery-add btn btn-primary" name="btnInsert">
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Naziv</th>
                <th>Strana</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM menu";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $menu):
            ?>
            <tr>
                <td><?= $menu->title ?></td>
                <td><?= $menu->href ?></td>
                <td><a href="">Edit</a></td>
                <td><a href="admin.php?page=deletemenu&value=<?= $menu->id?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>