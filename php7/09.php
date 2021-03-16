<?php
//密码双重加密原则
//数据库设置密码 + 后缀
//用户表建议加一个datetime 字段,更新时候可以看出变化
//建议 用户名加一个索引

function returnPasswordMd5($password,$salt){
    return md5(md5($password).$salt);
}

function returnSalt(){
    return "pwd".rand(100,999);
}
$data = "select salt,password form table where ....";
$salt = $data['salt'];
$password = returnPasswordMd5($_POST['password'],$salt);
if($password == $data['password']){
//    TODO
}