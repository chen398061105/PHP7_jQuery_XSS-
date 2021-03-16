<?php
echo "运算符和流程控制<br>";
$level = 180;
$say = '';
//注意,switch时候case值 优先从大到小
//能用exr?a:b 尽量不要用if else
switch ($level){
    case $level > 90:
        $say = '优秀';
        break;
    case $level > 70:
        $say = '中等';
        break;
    case $level > 60:
        $say = '及格';
        break;
    default:
        $say = '不及格';
}
echo  $say;



//如果怕出错可以@屏蔽
//$str = 111;
//echo @$str;
die;
//括号优先 -> ++ , -- ,@ 优先 -> ! 优先 ->乘除余 ->加减字符串  -> 比较大小 -> && || 三目运算
//取模的正负取决于前者
echo -5 % 3;// -2
echo 5 % -3;// 2

die;
$a = 1;
$b = '2';//自动转化数值,注意和js区别
echo  $a + $b; //3
$html = <<<A
    <script>
    var a = 1;
    var b = '2';
    alert(a+ b)
    </script>
A;
echo  $html;

