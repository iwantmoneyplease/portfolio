<?php include("../templates/header.php"); ?>
    <a href="add.php">Add new project</a>
    <a href="categories.php">Add new category</a>

    <?php

    if(isset($_POST["addCategory"])){

    }

    $sql = "SELECT * FROM project";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="update.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["name"];?>
            </a>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>

