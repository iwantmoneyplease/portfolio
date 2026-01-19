<a href="index.php">back</a>
<main id="add">

    <?php
        if($_POST){
            require("../../conn.php");
            if($_POST["posttype"] == "create"){
                echo "Created";

                $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
                $stmt->bind_param("s", $_POST["name"]);
                $stmt->execute(); /* Lägg även till ett till s vid bind params och en ? vid VALUES när du lägger till thumbnail*/
                $conn->close();
            } 
        }
        ?>

    <form method="post">
        <p>Add category</p>
        <input type="text" name="name" placeholder="Category name">
        <input class="btn btn-primary" type="submit" value="create" name="posttype">
    </form>


</main>