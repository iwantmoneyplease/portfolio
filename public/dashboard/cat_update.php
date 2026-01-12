
<?php include("../templates/header.php"); ?>
    <a href="../dashboard/index.php">Back</a>

    <?php

    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "Cat_Update"){
            echo "Updated";

            $sql = "UPDATE categories SET name = ? WHERE cat_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $_POST["update_name"], $_POST["update_id"]);
            $stmt->execute(); /* Lägg även till ett till s vid bind params och en ? vid VALUES när du lägger till thumbnail*/
            $stmt->close();
        } 
    }


    $sql = "SELECT * FROM categories WHERE cat_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="update_id" placeholder="name" value="<?php echo $row["cat_id"];?>" hidden>
            <input type="text" name="update_name" placeholder="name" value="<?php echo $row["name"];?>">
            <input class="btn btn-primary" type="submit" name="posttype" value="Cat_Update">
        </form>
        <?php
        }
    }

    $conn->close();
    ?>

<?php include("../templates/footer.php"); ?>

</main>