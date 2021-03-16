<?php
/*
//过程化连接
$conn = mysqli_connect("localhost","root","lp881208");
if (!$conn){
    die("数据库连接失败!");
}
//设置操作的db
mysqli_select_db($conn,"godb");
//设置语言b编码
mysqli_query($conn,"set names utf8");

//$sql = " insert into msg(nichen,touxiang,content,shijian) values ('xiaoming11','haha','test',now())";
//$result = mysqli_query($conn,$sql);
//if ($result){
//    echo "插入成功!";
//}else{
//    echo  "插入失败";
//}

$sql = "select * from msg";
$res = mysqli_query($conn,$sql);
//推荐mysqli_fetch_assoc 关联数组   键名就是 字段名
//mysqli_fetch_row() 下标的方式
//mysqli_fetch_object() 对象方式, 使用时候$data->nichen
while ($data = mysqli_fetch_assoc($res)){
    echo "<br>";
    echo $data['nichen'];
}
mysqli_close($conn);
*/
//对象方式
$host = "localhost";
$user = "root";
$pwd = "lp881208";
$db = "godb";
$port = "3306";
//连接db
$conn = new MySQLi($host,$user,$pwd,$db,$port);

if ($conn->connect_error){
    die("连接失败");
}
//设置编码
$conn->set_charset('utf8');

//执行语句
//$sql = "select * from msg";//计算记录1
$sql = "select count(id) as c from msg";//计算记录2 推荐

$res = $conn->query($sql);
//计算记录1
//echo mysqli_num_rows($res)."条记录发生影响<br>";

//计算记录2 推荐
$row = $res->fetch_array();
echo $row['c'];
die;
//遍历结果
while($row = $res->fetch_array()){
    echo $row['nichen']."<br>";
}
//关闭资源和连接
$res->free();
$conn->close();
