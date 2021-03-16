<?php
//父类基类
abstract class YunSun{
    public $numA;
    public $numB;
    abstract function jiJsuan();
}

class  Add extends YunSun{

    function jiJsuan()
    {
        return $this->numA + $this->numB;
    }
}

class Sub extends YunSun{
    function jiJsuan()
    {
        return $this->numA - $this->numB;
    }

}
class Multiplication extends YunSun{
    function jiJsuan()
    {
        return $this->numA * $this->numB;
    }

}
class Div extends YunSun{
    function jiJsuan()
    {
        return $this->numA / $this->numB;
    }

}

//做一个工厂类
class  JiSuanJi{
    static function Choose($operator){
        switch ($operator){
            case "+":
                return new Add;
            case "-":
                return new Sub;
            case "*":
                return new Multiplication;
            case "/":
                return new Div;
            default:
                echo "符号不支持";
        }
    }
}

$result = JiSuanJi::Choose("/");
$result->numA = 10;
$result->numB = 10;
echo $result->jiJsuan();
