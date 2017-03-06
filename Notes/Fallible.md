# PHP

```php
class TestClass
{
    private $properties = [];
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }
    public function __get($name)
    {
        return $this->properties[$name];
    }
}

$obj = new TestClass();

//调用 __set 魔术方法
$obj->test = 'testValue';

//调用 __get 魔术方法
var_dump($obj->test);
//string(9) "testValue"

//调用 __isset 魔术方法
var_dump(isset($obj->test));
var_dump(empty($obj->test));
//bool(false)
//bool(true)
```

> 当对不可访问属性调用 [`isset()`](https://php.net/manual/zh/function.isset.php) 或 [`empty()`](https://php.net/manual/zh/function.empty.php) 时，[`__isset()`](https://php.net/manual/zh/language.oop5.overloading.php#object.isset) 会被调用。



```php
$arr = [1, 2, 3];
foreach($arr as &$v) {
    var_dump($arr);
}
//unset($v);
foreach($arr as $v) {
    var_dump($arr);
}
print_r($arr);
/*
array(3) {
  [0]=>
  &int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
array(3) {
  [0]=>
  int(1)
  [1]=>
  &int(2)
  [2]=>
  int(3)
}
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  &int(3)
}
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  &int(1)
}
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  &int(2)
}
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  &int(2)
}
Array
(
    [0] => 1
    [1] => 2
    [2] => 2
)
*/
```

> `&$v` 是一个指向 `$arr[2]` 的引用，第二次 `foreach` 分别给 `$v` 赋值 `1 2 2`