<?php include("../templates/header.php"); ?>
    hejhej
    <a href="add.php">add</a>

    <?php
    $sql = "SELECT * FROM project WHERE project_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
                <?php echo $row["namn"];?>
                <?php echo $row["info"];?>
                <?php echo $row["thumbnail"];?>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>

