<?php
define("HOST","localhost");
define("USER","root");
define("PASSWORD","lp881208");
define("DATABASE","godb");
define("PORT",3306);

class Db
{
    protected $db;
    protected static $obj = null;
    //单例模式,创建对象
    static function instance(){
        if (self::$obj == null){
            self::$obj = new self();
        }
        return self::$obj;
    }
    //防止克隆
    final private function __clone(){}

    //数据库连接
    final private function __construct()
    {
        $conn = new MySQLi(HOST, USER, PASSWORD, DATABASE, PORT);
        if ($conn->connect_error) {
            die("数据库连接失败,err:" . $conn->error);
        }
        $conn->set_charset("utf8");
        $this->db = $conn;
    }
    //数组转字符串  [`colum`=>'value',`colum`=>'value']  ==> `colum`=>'value'
    function arrToStr($arr){
        $arr2 = array();
        foreach ($arr as $k=>$v){
            $arr2[] = "`".$k."`='".$v."'";//`字段`='值'";
        }
        $str = implode(',',$arr2);
        return $str;
    }
    //数据转义
    function escape($data){
        if (is_string($data)){
            return mysqli_real_escape_string($this->db,$data);
        }
        if (is_array($data)){
            foreach ($data as $key =>$value){
                $data[$key] = $this->escape($value);
            }
        }
        return $data;
    }

    /**
     * 检索方法
     */
    function select($sql)
    {
        $res = $this->db->query($sql);
        $data = array();
        while ($datas = mysqli_fetch_assoc($res)) {
            $data[] = $datas;
        }
        return $data;
    }

    //添加
    function add($table,$arr){
//       "insert into `table` set `字段`='值'";
        $arr = $this->escape($arr);
        $str = $this->arrToStr($arr);
        $sql =   "insert into `".$table."` set ".$str;
//        echo sql;die; 调试

        return $this->db->query($sql);
    }

    //更新
    function update($table,$arr,$where){
//        "update  `table` set `cloum`=`value` where 条件";
        $str = $this->arrToStr($arr);
        $sql = "update `".$table."` set ".$str." ".$where;
        return $this->db->query($sql);
    }
    //删除
    function del($table,$where){
//        $sql = "delete from `table` where 条件"
        $sql = "delete from `".$table."`".$where." ";
        return $this->db->query($sql);
    }

    /**
     * db关闭
     */
    function __destruct()
    {
        $this->db->close();
    }
}
//单例调用
$db = Db::instance();
$sql = "select * from msg";
$db->del();
$data = $db->select($sql);
echo "<pre>";
print_r($data);

$db2 = Db::instance();
echo $db===$db2?"yes one obj":"no";


//插入语句
//$res = $db->add("msg",array("nichen"=>"test"));
//var_dump($res);
//更改
//$res = $db->update('msg',array("nichen"=>"test2")," where id = 1");
//var_dump($res);
//删除
//$res = $db->del("msg","where id = 2");
//var_dump($res);