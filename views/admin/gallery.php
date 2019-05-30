<h1 class="title">Galerija</h1>
    <form action="php/insert_picture.php" method="post" enctype="multipart/form-data" class="form-admin-gallery">
        <input name="tbTitle" type="text" class="form-control textbox-form" placeholder="Title">
        <label for="picture" class="picture" class="form-control textbox-form">Slika:</label>
        <input name="picture" class="form-control textbox-form" type="file" id="picture">
        <input type="submit" value="Add" class="gallery-add btn btn-primary" name="btnInsert">
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Picture</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM gallery";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $picture):
            ?>
            <tr>
                <td><?= $picture->alt ?></td>
                <td>
                    <div class="photo">
                        <a class="fancybox" rel="group" href="<?= $picture->href ?>"><img class="gal-photo" alt="<?= $picture->alt ?>" src="<?= $picture->href ?>"/></a>
                    </div>
                </td>
                <td><a href="">Edit</a></td>
                <td><a href="admin.php?page=deletepicture&value=<?= $picture->id?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>