<?php include("../templates/header.php"); ?>

    <h4>Stuff</h4>
    <a href="../index.php">Main website</a>
    <a href="add.php">Add new project</a>
    <a href="categories.php">Add new category</a>

    <h4>Projects</h4>
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

    <h4>Categories</h4>

    <?php

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="cat_update.php?id=<?php echo $row["cat_id"]; ?>">
                <?php echo $row["name"];?>
            </a>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>

