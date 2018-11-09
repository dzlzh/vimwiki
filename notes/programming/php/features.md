# PHP - 特性

## [命令空间](http://php.net/manual/zh/language.namespaces.php)

### [导入](http://php.net/manual/zh/language.namespaces.importing.php)

## [Trait](https://secure.php.net/manual/zh/language.oop5.traits.php)

自 PHP 5.4.0 起，PHP 实现了一种代码复用的方法，称为 `trait`。

Trait 是类的补分实现(即常量、属性、方法)，可以混入一个或者多个现有的 PHP 类中。

Trait 有两个作用：表明类可以做什么 (像是接口)；提供模块化实现 (像是类)。

```
// 创建
trait testTrait
{
}

// 使用
class testClass
{
    use testTrait;
}
```

## [生成器](http://php.net/manual/zh/language.generators.syntax.php)


