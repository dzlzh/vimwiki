# PHP - BC Math

## [`bcadd`](https://secure.php.net/manual/zh/function.bcadd.php)

2 个任意精度数字的加法计算

```php
string bcadd ( string $left_operand , string $right_operand [, int $scale ] );
```

左操作数和右操作数求和

## [`bcsub`](https://secure.php.net/manual/zh/function.bcsub.php)

2 个任意精度数字的减法

```php
string bcsub ( string $left_operand , string $right_operand [, int $scale = int ] );
```

左操作数减去右操作数

## [`bcmul`](https://secure.php.net/manual/zh/function.bcmul.php)

2 个任意精度数字乘法计算

```php
string bcmul ( string $left_operand , string $right_operand [, int $scale = int ] );
```

左操作数乘以右操作数

## [`bcdiv`](https://secure.php.net/manual/zh/function.bcdiv.php)

2 个任意精度的数字除法计算

```php
string bcdiv ( string $left_operand , string $right_operand [, int $scale = int ] );
```

左操作数除以右操作数

## [`bcmod`](https://secure.php.net/manual/zh/function.bcmod.php)

对一个任意精度数字取模

```php
string bcmod ( string $left_operand , string $modulus );
```

对左操作数使用系数取模

## [`bcpow`](https://secure.php.net/manual/zh/function.bcpow.php)

任意精度数字的乘方

```php
string bcpow ( string $left_operand , string $right_operand [, int $scale ] );
```

左操作数的右操作数次方运算

## [`bcsqrt`](https://secure.php.net/manual/zh/function.bcsqrt.php)

任意精度数字的二次方根

```php
string bcsqrt ( string $operand [, int $scale ] );
```

返回操作数的二次方根

## [`bccomp`](https://secure.php.net/manual/zh/function.bccomp.php)

比较两个任意精度的数字

```php
int bccomp ( string $left_operand , string $right_operand [, int $scale = int ] );
```

把 `right_operand` 和 `left_operand `作比较, 并且返回一个整数的结果
