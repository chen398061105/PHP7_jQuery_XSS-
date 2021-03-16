<?php

/**
 * oop 面向对象[面向功能] 面向函数[函数调用] 面向对象[架构安全]
 * 三大特性 :
 * 封装性  public ,protect,private
 * 继承性  extend 单继承,一个类智能继承一个父类,一个父类可以拥有多个子类
 * 多态性 php的多态 突出的是重写.overwrite
 * 官方 的是重载 overlord(java突出)
 * ____________
 * final 只能修饰类 和方法 作用:被修饰的类不能被子类继承,被修饰的方法不能被子方法覆盖
 * static 只能修饰 成员属性和方法,不能修饰类. 作用:可以被同类中所有共享
 */
class Car
{
    const LUNZI = 4; //常量const申明完必须赋值. define不能放在里面,外面可以
    //修饰符 public ,private,protect,static
    public $color="red";//变量,可以赋值也可以不赋值.
    protected $name; //类外不可调用
    static $age = 10;

    //构造方法1:名字和类名一样, 一旦被new了立即执行,public类型 不推荐
//    public function car(){
//        echo "我是构造方法<br>";
//    }
    //构造方法2 推荐,可以传参
    function __construct()
    {
        echo "我是推荐的构造方法2<br>";
    }
    //类里面的函数,叫方法method.外面的叫函数function
    //静态self::调 非静态$this->
    public function run()
    {
        echo "我是run的方法.color:".$this->color."<br>";
//        echo "车龄:".Car::$age."<br>"; 推荐下面的self,因为如果这类名改了下面不需要改
        echo "车龄:".self::$age."<br>";
    }
    //静态方法
    public static function say(){
        echo "我是say的静态方法<br>";
    }
    //受保护的方法,可以被继承, private 是不可以 只能内部
    protected function test(){
        echo "我是受保护的方法<br>";
    }
    final public  function hi(){
        echo  "我只能继承不能被重写哦.";
    }

    //析构方法:对象被释放的时候执行,就是new几个 用完了就执行几个
    function __destruct()
    {
        echo "我是收尾的方法<br>";
    }
}
//继承
class Honda extends Car {
    //覆盖 ->多态重写
    public function run()
    {
        parent::run();//部分重写.使用原来的方法并追加新方法
        echo "我重写了Car的fun方法哦";
        $this->test();//受保护的方法.可以在类名 用this->方法 继承
    }
//如果父类中的指定方法不能被重写,但是可以被继承 关键字final
//    public function hi(){} 报错的
}

$honda = new Honda();
$honda->run();
$honda->hi();//可以继承使用

echo '<hr>';
$car = new Car();
$car->color = "红色";
//非静态方法 new实例化后调用
$car->run();

//常量的引用 类名::常量名 ::的专业术语"域"
echo Car::LUNZI;
//静态方法的引用
Car::say();
