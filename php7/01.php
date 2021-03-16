<?php
echo '01基本语法<br>';
/**
 * 常用数据类型
 * 1 字符串 双引号里面能识别变量,单引号不能
 */
$b = 11;
//$a = 'a$b';
//echo gettype($a);
$a = "a${b}";
echo $a;
$str = <<<EOT
    定界符
EOT;
echo $str;

die;
$a = 1;
$b = 'a';
echo $$b;//$a = ${$b}
die;
define("NAME", 'JO');
echo NAME;

echo '<br>';
/*
 *  九大超全局变量
 *  $GLOBALS
    $_SERVER
    $_GET
    $_POST
    $_REQUEST
    $_COOKIE
    $_SESSION
    $_FILES
    $_ENV
 */
//函数内部默认是局部变量,外部默认是全局变量
$num = 1;
function cs()
{
    //global申明时候不能复制,global和$GLOBALS['num'] = 1是一样的
    global $num;
    $num = 2;
    echo '常量名:' . NAME;
}

cs();
echo $num . '<br>';
/**
 * echo 可以一次输出多个值,用逗号间隔,echo不是真的函数,无返回值
 * print()函数,打印一个值 成功返回true,错误则false.只能简单打印变量的值
 * print_r 和var_dump 可以打印字符串和数字,数组的时候,键值对表示,但print_r输出布尔值和null结果没有意义,都是打印"\n"
 * 因此var_dump函数适合调试,
 */