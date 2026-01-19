
<?php include("../templates/header.php"); ?>
    <a href="../dashboard/index.php">Back</a>

    <?php

    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "Update"){
            echo "Updated";

            $sql = "UPDATE project SET name = ?, info = ?, url = ? WHERE project_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $_POST["update_name"], $_POST["update_info"], $_POST["update_url"], $_POST["update_id"]);
            $stmt->execute();
            $stmt->close();
        } 
    }


    $sql = "SELECT * FROM project WHERE project_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="update_id" placeholder="name" value="<?php echo $row["project_id"];?>" hidden>
            <input type="text" name="update_name" placeholder="name" value="<?php echo $row["name"];?>">
            <textarea type="text" name="update_info" placeholder="info"><?php echo $row["info"];?></textarea>
            <input type="file" name="update_fileToUpload" id="fileToUpload">
            <input type="text" name="update_url" placeholder="external url" value="<?php echo $row["url"];?>">
            <input class="btn btn-primary" type="submit" name="posttype" value="Update">
        </form>
        <?php
        }
    }

    $conn->close();
    ?>

<?php include("../templates/footer.php"); ?>

</main>