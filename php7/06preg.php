<?php
//preg_match() 验证数据

function pregStr($pattern,$str){
   return  preg_match($pattern,$str);
}
//匹配手机 13912345678
//    $pattern = "/^1\d{10}$/";
//    $phone = 11234678905;
//    $result = pregStr($pattern,$phone);
//    var_dump($result);

//匹配邮箱 12qq@qq.com \w 数字字母下划线
$pattern = "/^\w+@\w+\.(com)|(cn)$/";
$phone = "12af@qqcom";
$result = pregStr($pattern,$phone);
echo $result?"邮箱匹配到":"邮箱匹配不到";

// preg_replace() 替换数据
echo preg_replace("/[123]/",'*',"1234567890");

//preg_split() 分割数据
$str = "张三,李四.勿忘五";
print_r(preg_split("/[,.]/",$str));
//preg_match_all()匹配数据