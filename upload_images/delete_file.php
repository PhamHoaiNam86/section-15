<?php
$file_url = 'uploads/nhor.jpg';
if(@unlink($file_url)){
    echo "xóa file {$file_url} thành công";
}else{
    echo "xóa file {$file_url} không thành công";
}