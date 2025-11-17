<?php include("../templates/header.php"); ?>
    hejhej
    <a href="add.php">add</a>

    <?php
    $sql = "SELECT * FROM project";
    $result = $conn->query($sql);
    var_dump($result);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="project.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["namn"];?>
            </a>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>

