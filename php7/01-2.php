<?php
echo '8大数据类型下<br>';
/**
 * 布尔,整值,浮点型,字符,===>标量类型
 * 数组,对象,===>复合类型
 * 特殊类型 资源,null, 资源:数据库连接,文件操作
 */
//数组随机取一个或则多个,
$arr = array('a', 'b', 'c', 'd');
$arrIndex = array_rand($arr);//返回的是下标
echo $arr[$arrIndex];
echo '<br>多个时候<br>';
$many = array_rand($arr, 2);
echo $arr[$many[0]];
echo $arr[$many[1]];
echo '<br>打乱<br>';
shuffle($arr);
print_r($arr);
die;

//一维数组去重,生成新的数组
$arr = array(1, 2, 3, 1, 2, 4);
print_r(array_unique($arr));//Array ( [0] => 1 [1] => 2 [2] => 3 [5] => 4 )
die;
//array_merge() 数组合并,如果后面的数组的key是字符串且和前面的数组重复了会覆盖,数字不会覆盖
$arr1 = array('a' => 11, 'b' => 22, 'c' => 33, 22 => 100);
$arr2 = array('e' => 55, 'c' => 'over', 22 => 100);
print_r(array_merge($arr1, $arr2));
//Array ( [a] => 11 [b] => 22 [c] => over [0] => 100 [e] => 55 [1] => 100 )

die;
$arr = array(1, 21, 43, 2);
//sort($arr);//正向排序
//rsort($arr);//反向排序
//arsort($arr);//反向排序且不改变key 的原来顺序
//print_r($arr);
//echo max($arr);
echo array_sum($arr); //计算数值,字符串时候默认为0
die;
//变量转数组,变量名作为键名,值是变量的值
$a = 1;
$b = 2;
$arr = compact("a", "b");
echo $arr['b'];
die;

//数组转变量,键名作为变量名,值作为变量值
$arr = array("a" => 1, "b" => 3);
extract($arr);
echo $a;//1

die;
//数组后面添
//加
$arr = array(1, 2, 3, 4);
var_dump(array_push($arr, 51));
//数组截取 位置1开始截取2位
$arr2 = array_slice($arr, 1, 2);
print_r($arr2);