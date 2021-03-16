<?php
echo '8大数据类型上<br>';
/**
 * 布尔,整值,浮点型,字符,===>标量类型
 * 数组,对象,===>符合类型
 * 特殊类型 资源,null
 */
//字符串例子
//计算长度
$str = 'abcde';
echo strlen($str);//5
$str1= 'a b c d';
echo strlen($str1);//7
echo strtoupper($str);
echo ucfirst($str);

echo '<br>';
//查找字符串再另一个字符串中第一次出现的位置,参数1 目的地,参数2要查的内容,参数3 指定位置
$myString = 'abcde';
$findStr = 'b';
echo strpos($myString,$findStr,1);//1
echo '<br>';

//substr对英文字符串进行截取,  截取内容, start,截取长度
echo substr('abcde',1,3);

//如果要截取的汉字字符个数 mb_substr
echo mb_substr('你好啊',1,2,'utf-8'); //好啊
echo '<br>';
//如果要截取的是汉字的字节个数mb_strcut
echo mb_strcut('你好啊',1,3,'utf-8'); //你
echo '<br>';

//以某种要求截取到结束
echo strstr('abcdefg','d');//defg
echo '<br>';

//字符串分割成数组
var_dump( explode(',','a,b,c,d,e'));echo '<br>';
//数组转字符串
var_dump(implode('-',array(1,2,3)));echo '<br>';

//替换 第四个参数是计算替换次数
echo str_replace('say','hello','say world',$c);
echo $c.'<hr>';

//特殊字符转义
$str3 = "abc'";
echo addslashes($str4=$str3); //abc\'
echo '<br>';
echo stripcslashes($str4);//abc'
echo '<br>';
//html实体转化
$str5 = "<script>alert(1)</script>";
echo htmlspecialchars($str5);


























