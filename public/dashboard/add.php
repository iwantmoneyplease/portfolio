<a href="index.php">back</a>
<main id="add">
    <form method="post">
        <p>add</p>
        <input type="text" name="name" placeholder="name">
        <textarea type="text" name="info" placeholder="info"></textarea>
        <input type="text" name="url" placeholder="external url">
        <input type="file" name="files[]" multiple>
        <input class="btn btn-primary" type="submit" value="create" name="posttype">
    </form>

</main>

<?php
    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "create"){
            echo "Created";

            $stmt = $conn->prepare("INSERT INTO project (name, info, url) VALUES (?,?,?)");
            $stmt->bind_param("sss", $_POST["name"], $_POST["info"], $_POST["url"]);
            $stmt->execute(); /* Lägg även till ett till s vid bind params och en ? vid VALUES när du lägger till thumbnail*/
            $conn->close();
        } 
    }
    ?>