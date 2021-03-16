<?php
/**
 * @param $string
 * @param bool $low安全级别
 */
function clean_xss(&$string, $low = false)
{
    if (!is_array($string)) {
        $string = trim($string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
        if ($low) {
            return True;
        }
        //安全系数高的时候
        $string = str_replace(array('"', "\\", "'", "/", "..", "../", "./", "//"), '', $string);
        $no = '/%0[0-8bcef]/';
        $string = preg_replace($no, '', $string);
        $no = '/%1[0-9a-f]/';
        $string = preg_replace($no, '', $string);
        $no = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
        $string = preg_replace($no, '', $string);
        return True;
    }
    $keys = array_keys($string);
    foreach ($keys as $key) {
        clean_xss($string [$key]);
    }
}

//test  <script>alert("xss")</script>
$info = $_POST['info'];

clean_xss($info);
//    echo "</br>after: " . $info;
echo '<br>';
var_dump($info);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<form action="" method="post">
  输入内容:<textarea name="info" rows="5" cols="50"></textarea></br>
  <button type="submit" name="sub">提交</button>
</form>

</body>
</html>
