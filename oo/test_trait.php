<?php
/** trait
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/14 23:05
 */

/*
从PHP的5.4.0版本开始,PHP提供了一种全新的代码复用的概念,那就是Trait。
Trait其字面意思是"特性"、"特点",我们可以理解为,使用Trait关键字,可以为PHP中的类添加新的特性。
可以将多个类中，共用的一些属性和方法提取出来做来公共trait类。
就像是装配汽车的配件,如果你的类中要用到这些配件,就直接用use导入就可以了，相当于把trait中的代码复制到当前类中。

因为trait不是类,所以不能有静态成员,类常量，当然也不可能被实例化。
如果说:继承可以纵向扩展一个类,那么trait就是横向扩展一个类功能
*/

/*
trait Test1{
    public $name = 'PHP中文网'; //trait类中可以用属性
    public function hello1(){ //trait类中主要成员是方法
        return 'Test1::hello1()';
    }
}
//2.创建triat类Test2
trait Test2{
    function hello2(){
        return 'Test2::hello2()';
    }
}
//3.创建Demo1类
class Demo1{
    use Test1, Test2;
}
//进行测试
$obj = new Demo1;
echo $obj->hello1(); //访问trait类Test1中的hello1()
echo '<hr>';
echo $obj->name; //访问trait类Test1中的$name属性
echo '<hr>';
echo $obj->hello2(); //访问trait类Test2中的hello2()
*/


//trait可以互相嵌套,一个trait类中可以用use导入另一个trait类
/*
trait Test1{
    public $name = 'PHP中文网'; //trait类中可以用属性
    public function hello1(){ //trait类中主要成员是方法
        return 'Test1::hello1()';
    }
}
//2.创建triat类Test2
trait Test2{
    use Test1;
    function hello2(){
        // 调用父类方法
        echo parent::hello2();

        //在Test2中访问Test1中的方法、属性,注意语法与普通类是一样的
        echo 'Test2调用Test1 - ' . $this->hello1() . '<br>';
        return 'Test2::hello2() '.$this->name;
    }
}

//3.创建父类Demo
class Demo
{
    public function hello2()
    {
        return '父类Demo::hello2() <br>';
    }
}

//4.创建Demo1类
class Demo1 extends Demo {
    use Test2;
}
//进行测试
$obj = new Demo1;
echo $obj->hello1(); //访问trait类Test1中的hello1()
echo '<hr>';
echo $obj->name; //访问ttrait类Test1中的$name属性
echo '<hr>';
echo $obj->hello2(); //访问ttrait类Test2中的hello2()
*/
//在同一个类中，同名方法的优先级:子类>Trait类>父类，与就是说，谁离调用者越近，谁的优先级就越高。


//如果trait类中方法重名了，怎么办？
//1.创建一个trait类Test1
trait Test1{
    public function hello(){
        return 'Test1::hello()';
    }
}
//2.创建triat类Test2
trait Test2{
    function hello(){
        return 'Test2::hello()';
    }
}
//3.创建类Demo
class Demo{
    use Test1, Test2{
        //用Test1中的hello()方法替代Test2中的同名方法
        Test1::hello insteadof Test2;
        //Test2中的hello()方法用别名访问
        Test2::hello as test2Hello;
    } //这里千万不要加分号 ;
}

//进行测试
$obj = new Demo;
echo $obj->hello(); //访问Test1中的hello()
echo '<hr>';
echo $obj->test2Hello();//别名访问Test2中的hello()