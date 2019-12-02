# PHP Trait

从基类继承的成员会被 `trait` 插入的成员所覆盖。
优先顺序是来自当前类的成员覆盖了 `trait` 的方法，
而 `trait` 则覆盖了被继承的方法。

类成员优先级为：当前类 > Trait > 父类

为了解决多个 `trait`  在同一个类中的命名冲突，
需要使用 `insteadof` 操作符来明确指定使用冲突方法中的哪一个。
也可以使用 `as` 给方法取一个别名。

`as` 还可以修改方法的访问控制

最后使用 `able` 结尾

## 参考

- [PHP Trait](https://www.php.net/manual/zh/language.oop5.traits.php)
- [我所理解的 PHP Trait](https://overtrue.me/articles/2016/04/about-php-trait.html)
