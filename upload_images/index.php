<?php
require "lib/data.php";

if (isset($_FILES['file'])) {
    show_data($_FILES);
    $error = array();
    // thư mục chứa file upload
    $upload_dir = 'uploads/';
    // // đường dẫn của file sau khi upload
    $upload_file = $upload_dir . $_FILES['file']['name'];

    // xử lí upload đúng file ảnh
    $type_allow = array('png', 'jpg', 'gif', 'jpeg');
    $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($type), $type_allow)) {
        $error['type'] = "đuôi file chỉ đc png , jpg , gif , jpeg";
    } else {
        //upload file có dung lượng cho phép(<20MB == 21000000 byte)
        $file_size = $_FILES['file']['size'];
        if ($file_size >= 21000000) {
            $error['file_size'] = "kích thước vượt quá 20 MB";
        }

        // kiểm tra trùng tên file trên hệ thống
        if (file_exists($upload_file)) {
            // xử lí đổi tên file tự đọng
            
            // tạo file mới
            // tên file.đuôi jpg
            $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            echo $file_name;

            echo $_FILES;
  
        }
    }



    if (empty($error)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
            echo "<img src='{$upload_file}'><br>";
            echo "<a href='$upload_file'>down : {$_FILES['file']['name']}</a>";
        } else {
            echo "upload file không thành công";
        }
    } else {
        show_data($error);
    }

}
 // $new_file_name = $file_name.'_copy.';
            // $new_upload_file = $upload_dir.$new_file_name.$type;
            // $k =1;
            // while(file_exists($new_upload_file)){
            //     $new_file_name = $file_name.'_copy({$k}).';
            //     $k++;
            //     $new_upload_file = $upload_dir.$new_file_name.$type;
            // }
            // $upload_file = $new_file_name;

            // $error['file_exists'] = "file đã tồn tại trên hệ thống";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploadd file ảnh lên sever</title>
</head>

<body>
    <h1>Upload file</h1>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" value="Upload file">
    </form>
</body>

</html>