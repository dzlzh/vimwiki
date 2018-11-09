# 数值变量交换常用方法

## 临时变量法

```php
echo "\n---临时变量法---\n";
$num1 = 3;
$num2 = 6;
echo "交换前：\n", '$num1 = ', $num1, "\n", '$num2 = ', $num2, "\n";
$tmp  = $num1;
$num1 = $num2;
$num2 = $tmp;
echo "交换后：\n", '$num1 = ', $num1, "\n", '$num2 = ', $num2, "\n";
/*
---临时变量法---
交换前：
$num1 = 3
$num2 = 6
交换后：
$num1 = 6
$num2 = 3
*/
```

## 加减法

```php
echo "\n---加减法---\n";
$num1 = 3;
$num2 = 6;
echo "交换前：\n", '$num1 = ', $num1, "\n", '$num2 = ', $num2, "\n";
$num1 = $num1 + $num2;
$num2 = $num1 - $num2;
$num1 = $num1 - $num2;
echo "交换后：\n", '$num1 = ', $num1, "\n", '$num2 = ', $num2, "\n";
/*
---加减法---
交换前：
$num1 = 3
$num2 = 6
交换后：
$num1 = 6
$num2 = 3
*/
```

## 异或法

```php
echo "\n---异或法---\n";
$num1 = 3;
$num2 = 6;
echo "交换前：\n", '$num1 = ', $num1, "\n", '$num2 = ', $num2, "\n";
$num1 = $num1 ^ $num2;
$num2 = $num1 ^ $num2;
$num1 = $num1 ^ $num2;
echo "交换后：\n", '$num1 = ', $num1, "\n", '$num2 = ', $num2, "\n";
/*
---异或法---
交换前：
$num1 = 3
$num2 = 6
交换后：
$num1 = 6
$num2 = 3
*/
```
