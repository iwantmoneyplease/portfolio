<?php include("../templates/header.php") ?>
<a href="index.php">back</a>
<main id="add">
    <form method="post" enctype="multipart/form-data">
        <p>add</p>
        <input type="text" name="name" placeholder="name">
        <textarea type="text" name="info" placeholder="info"></textarea>
        <input type="text" name="url" placeholder="external url">
        <input type="file" name="files[]" multiple>
        <input class="btn btn-primary" type="submit" value="create" name="posttype">
    </form>

</main>

<?php

require("../../conn.php");
if($_POST){
    if($_POST["posttype"] == "create"){
        echo "created";

        $stmt = $conn->prepare("INSERT INTO project (name, info, url) VALUES (?,?,?)");
        $stmt->bind_param("sss", $_POST["name"], $_POST["info"], $_POST["url"]);

        if($stmt->execute()){
            $last_project_id = $conn->insert_id;
            if($_FILES){
                foreach($_FILES["files"]["name"] as $i => $key){
                    if(!empty($_FILES["files"]["name"][$i])){
                        $uploadedFilePath = uploadImg($i, $conn, $last_project_id);

                        if($i === 0 && $uploadedFilePath) {
                            $thumbPath = createThumbnail($uploadedFilePath);
                            echo "Thumbnail skapad: " . $thumbPath . "<br>";

                            $stmtThumb = $conn->prepare("UPDATE project SET thumbnail = ? WHERE project_id = ?");
                            $stmtThumb->bind_param("si", $thumbPath, $last_project_id);
                            $stmtThumb->execute();
                            $stmtThumb->close();
                        }
                    }
                }
            }
        }
    $stmt->close();
    } 
}
$conn->close();

?>