<?php
echo '函数<br>';

function sum($num = 100){
    $result = 0;
    for ($i = 0;$i <=$num; $i++){
        $result += $i;
    }
    return $result;
}

echo sum();

echo '<br>递归累加函数<br>';

function sum2($num = 100){
    if ($num != 0){
        return $num + sum2($num - 1);
    }
}

echo sum2(3);

//函数内部变量叫局部变量,外部叫全局变量
// static 静态变量,一般存在函数内部,函数执行后,仍然存在效果