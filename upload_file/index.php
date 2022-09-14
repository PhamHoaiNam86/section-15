<?php
require "lib/data.php";

if (isset($_FILES['file'])) {
    show_data($_FILES);
    // thư mục chứa file upload
    $upload_dir = 'uploads/';
    // đường dẫn của file sau khi upload
    $upload_file = $upload_dir . $_FILES['file']['name'];
    if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
        echo "<a href='$upload_file'>down : {$_FILES['file']['name']}</a>";
    } else {
        echo "upload file không thành công";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploadd file lên sever</title>
</head>

<body>
    <h1>Upload file</h1>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" value="Upload file">
    </form>
</body>

</html>