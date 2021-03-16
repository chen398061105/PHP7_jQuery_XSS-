<?php
//max_input_vars = 1000 php.ini限制表单提交个数
//$post = $_POST;
//echo $post['uid'];
//echo '<br>';
//echo $post['pwd'];

//ajax提交后获取并返回
function chuliStr($str){
    return trim($str);
}
$arr = $_POST;
$name = chuliStr($arr["name"]);
$pwd = chuliStr($arr["pwd"]);

if ($name=="123" && $pwd=="123"){
    echo 1;
}else{
    echo 0;
}


