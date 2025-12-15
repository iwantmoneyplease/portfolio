<?php include("templates/header.php"); ?>
    Welcome

    <?php
    $sql = "SELECT * FROM project";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="project.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["name"];?>
            </a>
        <?php
        }
    }
    ?>
<?php include("templates/footer.php"); ?>