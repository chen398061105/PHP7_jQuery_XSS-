<form action="" method="post" enctype="multipart/form-data" name="form">
    <div class="form-group">
        <label for="file"></label>
        <input type="file" class="form-control-file" name="file" id="file"  >
    </div>
    <input type="submit" name="sub" value="上传">
</form>
<?php

if (@$_POST["sub"]){
//    Array ( [name] => redis01.txt [type] => text/plain
// [tmp_name] => C:\xampp\tmp\phpD47A.tmp
// [error] => 0 [size] => 406 )

    $arrFile = $_FILES['file'];

    //方法1 验证文件类型
//    $allowType = array("text/plain","image/png");
//    if (!in_array($arrFile['type'],$allowType)){
//        echo "<script>alert('文件格式不符合!')</script>";
//       die;
//    }

    //方法2 验证文件名
    $fileExe = explode('.',$arrFile['name']);
    $allowExe = ["jpg","png","txt"];
    $newFileExe = $fileExe[count($fileExe)-1];
    if (!in_array($newFileExe,$allowExe)){
        echo "<script>alert('非法文件!')</script>";
        die;
    }

    //方法3 文件大小验证
    if($arrFile['size'] > 10000000){
        echo "<script>alert('超出文件大小!')</script>";
        die;
    }
  //移动文件
    $file_tmp = $arrFile["tmp_name"];
    $filename = date("Y-m-d")."-".$arrFile["name"];
    $dir = "uploads/";
    if (move_uploaded_file($file_tmp,$dir.$filename)){
        echo "上传成功!";
    }
}