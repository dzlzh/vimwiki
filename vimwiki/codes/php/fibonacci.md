# PHP - 斐波那契数列

[斐波那契数列](https://zh.wikipedia.org/wiki/%E6%96%90%E6%B3%A2%E9%82%A3%E5%A5%91%E6%95%B0%E5%88%97)

- F<sub>0<sub> = 0
- F<sub>1<sub> = 1
- F<sub>n<sub> = F<sub>n-1<sub> + F<sub>n-2<sub> (n >= 2)

`0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233……`

```php
function fibonacci($n)
{
    if ($n == 0 || $n == 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n -2);
}
```
