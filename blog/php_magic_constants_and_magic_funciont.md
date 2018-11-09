# PHP - 魔术常量、魔术方法

## PHP - 魔术常量

### `__LINE__`

文件中的当前行号

### `__FILE__`

文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。

### `__DIR__`

文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。

### `__FUNCTION__`

函数名称常量返回该函数被定义时的名字（区分大小写）。

### `__CLASS__`

类的名称常量返回该类被定义时的名字（区分大小写）。

### `__TRAIT__`

Trait 的名字常量返回 trait 被定义时的名字（区分大小写）。

### `__METHOD__`

类的方法名返回该方法被定义时的名字（区分大小写）。

### `__NAMESPACE__`

当前命名空间的名称（区分大小写）。此常量是在编译时定义的（PHP 5.3.0 新增）。

## PHP - 魔术方法

### 构造函数

```
void __construct ([ mixed $args [, $... ]] )
```

PHP 5 允行开发者在一个类中定义一个方法作为构造函数。具有构造函数的类会在每次创建新对象时先调用此方法，所以非常适合在使用对象之前做一些初始化工作。

> Note: 如果子类中定义了构造函数则不会隐式调用其父类的构造函数。要执行父类的构造函数，需要在子类的构造函数中调用 `parent::__construct()`。如果子类没有定义构造函数则会如同一个普通的类方法一样从父类继承（假如没有被定义为 private 的话）。

### 析构函数

```
oid __destruct ( void )
```

PHP 5 引入了析构函数的概念，这类似于其它面向对象的语言，如 C++。析构函数会在到某个对象的所有引用都被删除或者当对象被显式销毁时执行。

### 方法重载

```
public mixed __call ( string $name , array $arguments )
public static mixed __callStatic ( string $name , array $arguments )
```

在对象中调用一个不可访问方法时，`__call()` 会被调用。

用静态方式中调用一个不可访问方法时，`__callStatic()`会被调用。

$name 参数是要调用的方法名称。$arguments 参数是一个枚举数组，包含着要传递给方法 $name 的参数。

### 属性重载

```
public void __set ( string $name , mixed $value )
public mixed __get ( string $name )
public bool __isset ( string $name )
public void __unset ( string $name )
```

在给不可访问属性赋值时，`__set()` 会被调用。

读取不可访问属性的值时，`__get()` 会被调用。

当对不可访问属性调用 `isset()` 或 `empty()` 时，`__isset()` 会被调用。

当对不可访问属性调用 `unset()` 时，`__unset()` 会被调用。

参数 `$name` 是指要操作的变量名称。`__set()` 方法的 `$value` 参数指定了 `$name` 变量的值。

属性重载只能在对象中进行。在静态方法中，这些魔术方法将不会被调用。所以这些方法都不能被 声明为 static。从 PHP 5.3.0 起, 将这些魔术方法定义为 static 会产生一个警告。

> Note: 因为 PHP 处理赋值运算的方式，`__set()` 的返回值将被忽略。类似的, 在下面这样的链式赋值中，`__get()` 不会被调用：`$a = $obj->b = 8`
> 
> Note: 在除 `isset()` 外的其它语言结构中无法使用重载的属性，这意味着当对一个重载的属性使用 `empty()` 时，重载魔术方法将不会被调用。为避开此限制，必须将重载属性赋值到本地变量再使用 `empty()`。

### `__sleep()`和`__wakeup()`

```
public array __sleep ( void )
void __wakeup ( void )
```

`serialize()` 函数会检查类中是否存在一个魔术方法 `__sleep()`。如果存在，该方法会先被调用，然后才执行序列化操作。此功能可以用于清理对象，并返回一个包含对象中所有应被序列化的变量名称的数组。如果该方法未返回任何内容，则 `NULL` 被序列化，并产生一个 E_NOTICE 级别的错误。

> Note:`__sleep()` 不能返回父类的私有成员的名字。这样做会产生一个 E_NOTICE 级别的错误。可以用 Serializable 接口来替代。

`__sleep()` 方法常用于提交未提交的数据，或类似的清理操作。同时，如果有一些很大的对象，但不需要全部保存，这个功能就很好用。

与之相反，`unserialize()` 会检查是否存在一个 `__wakeup()` 方法。如果存在，则会先调用 `__wakeup` 方法，预先准备对象需要的资源。

`__wakeup()` 经常用在反序列化操作中，例如重新建立数据库连接，或执行其它初始化操作。

### `__toString()`

```
public string __toString ( void )
```

`__toString()` 方法用于一个类被当成字符串时应怎样回应。例如 echo $obj; 应该显示些什么。此方法必须返回一个字符串，否则将发出一条 E_RECOVERABLE_ERROR 级别的致命错误。

### `__invoke()`

```
mixed __invoke ([ $... ] )
```

当尝试以调用函数的方式调用一个对象时，`__invoke()` 方法会被自动调用。

### `__set_state()`

```
static object __set_state ( array $properties )
```

自 PHP 5.1.0 起当调用 `var_export()` 导出类时，此静态 方法会被调用。

本方法的唯一参数是一个数组，其中包含按 `array('property' => value, ...)` 格式排列的类属性。

[PHP: 魔术常量](http://php.net/manual/zh/language.constants.predefined.php)

[PHP: 魔法方法](http://php.net/manual/zh/language.oop5.magic.php)
