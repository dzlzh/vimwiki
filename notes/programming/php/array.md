# PHP - 数组函数

## [`count`](https://secure.php.net/manual/zh/function.count.php)

计算数组中的单元数目，或对象中的属性个数

```php
int count ( mixed $array_or_countable [, int $mode = COUNT_NORMAL ] );
```

## `compact()`

建立一个数组，包括变量名和它们的值

```php
array compact ( mixed $varname [, mixed $... ] );
```

## `extract()`

从数组中将变量导入到当前的符号表

```php
int extract ( array &$var_array [, int $extract_type = EXTR_OVERWRITE [, string $prefix = NULL ]] );
```

`var_array`

> 一个关联数组。此函数会将键名当作变量名，值作为变量的值。 对每个键／值对都会在当前的符号表中建立变量，并受到 `extract_type` 和 `prefix` 参数的影响。
>
> 必须使用关联数组，数字索引的数组将不会产生结果，除非用了 `EXTR_PREFIX_ALL` 或者 `EXTR_PREFIX_INVALID`。

`extract_type`

> 对待非法／数字和冲突的键名的方法将根据 `extract_type` 参数决定。可以是以下值之一：
>
> `EXTR_OVERWRITE` 
> 如果有冲突，覆盖已有的变量。
>
> `EXTR_SKIP` 
> 如果有冲突，不覆盖已有的变量。
>
> `EXTR_PREFIX_SAME` 
> 如果有冲突，在变量名前加上前缀 `prefix`。
>
> `EXTR_PREFIX_ALL` 
> 给所有变量名加上前缀 prefix。
>
> `EXTR_PREFIX_INVALID`
> 仅在非法／数字的变量名前加上前缀 `prefix`。
>
> `EXTR_IF_EXISTS` 
> 仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。 举个例子，以下情况非常有用：定义一些有效变量，然后从 $_REQUEST 中仅导入这些已定义的变量。
>
> `EXTR_PREFIX_IF_EXISTS` 
> 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
>
> `EXTR_REFS` 
> 将变量作为引用提取。这有力地表明了导入的变量仍然引用了 `var_array` 参数的值。可以单独使用这个标志或者在 `extract_type` 中用 `OR` 与其它任何标志结合使用。
>
> 如果没有指定 `extract_type`，则被假定为 `EXTR_OVERWRITE`。

`prefix`

> 注意 prefix 仅在 extract_type 的值是 EXTR_PREFIX_SAME，EXTR_PREFIX_ALL，EXTR_PREFIX_INVALID 或 EXTR_PREFIX_IF_EXISTS 时需要。 如果附加了前缀后的结果不是合法的变量名，将不会导入到符号表中。前缀和数组键名之间会自动加上一个下划线。

## `array_reverse()`

返回一个单元顺序相反的数组

```php
array array_reverse ( array $array [, bool $preserve_keys = false ] );
```

`preserve_keys`

> 如果设置为 **TRUE** 会保留数字的键。 非数字的键则不受这个设置的影响，总是会被保留。

## `array_splice()`

把数组中的一部分去掉并用其它值取代

```php
array array_splice ( array &$input , int $offset [, int $length = 0 [, mixed $replacement ]] );
```

把 `input` 数组中由 `offset` 和 `length` 指定的单元去掉，如果提供了 `replacement` 参数，则用其中的单元取代。

`offset`

> 如果 `offset` 为正，则从 `input` 数组中该值指定的偏移量开始移除。如果 `offset` 为负，则从 `input` 末尾倒数该值指定的偏移量开始移除。

`length`

> 如果省略 `length`，则移除数组中从 `offset` 到结尾的所有部分。如果指定了 `length` 并且为正值，则移除这么多单元。如果指定了`length` 并且为负值，则移除从 `offset` 到数组末尾倒数 `length` 为止中间所有的单元。小窍门：当给出了 `replacement` 时要移除从`offset` 到数组末尾所有单元时，用 *count($input)* 作为 `length`。

## [`array_unique()`](http://php.net/manual/zh/function.array-unique.php)

移除数组中重复的值

```php
array array_unique ( array $array [, int $sort_flags = SORT_STRING ] );
```

> SORT_STRING - 默认。把项目作为字符串来比较。
>
> SORT_REGULAR - 把每一项按常规顺序排列（Standard ASCII，不改变类型）。
>
> SORT_NUMERIC - 把每一项作为数字来处理。
>
> SORT_LOCALE_STRING - 把每一项作为字符串来处理，基于当前区域设置（可通过 setlocale() 进行更改）。

## `in_array()`

检查数组中是否存在某个值

```php
bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] );
```

在 `haystack` 中搜索 `needle`，如果没有设置 `strict` 则使用宽松的比较。

## `array_key_exists()`

检查给定的键名或索引是否存在于数组中

```php
bool array_key_exists ( mixed $key , array $search );
```

## `array_search()`

在数组中搜索给定的值，如果成功则返回相应的键名

```php
mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] );
```

## [`array_keys()`](http://php.net/manual/zh/function.array-keys.php)

返回数组中部分的或所有的键名

```php
array array_keys ( array $array [, mixed $search_value [, bool $strict = false ]] );
```

## [`array_values()`](http://php.net/manual/zh/function.array-values.php)

返回数组中所有的值

```php
array array_values ( array $input );
```

##  [`array_map()`](https://secure.php.net/manual/zh/function.array-map.php)

将回调函数作用到给定数组的单元上

```php
array array_map ( callable $callback , array $arr1 [, array $... ] );
```

##  [`array_walk()`](https://secure.php.net/manual/zh/function.array-walk.php)

使用用户自定义函数对数组中的每个元素做回调处理

```php
bool array_walk ( array &$array , callable $callback [, mixed $userdata = NULL ] );
```

## [`array_walk_recursive`](https://secure.php.net/manual/zh/function.array-walk-recursive.php)

对数组中的每个成员递归地应用用户函数

```php
bool array_walk_recursive ( array &$array , callable $callback [, mixed $userdata = NULL ] );
```

## [`key()`](http://php.net/manual/zh/function.key.php)

从关联数组中取得键名

```php
mixed key ( array &$array );
```

## `current()`

返回数组中的当前单元

```php
mixed current ( array &$array );
```

## `each()`

返回数组中当前的键／值对并将数组指针向前移动一步

```php
array each ( array &$array );
```

> 返回 `array` 数组中当前指针位置的键／值对并向前移动数组指针。键值对被返回为四个单元的数组，键名为*0*，*1*，*key*和 *value*。单元 *0* 和 *key* 包含有数组单元的键名，*1* 和 *value* 包含有数据。
>
> 如果内部指针越过了数组的末端，则 **each()** 返回 **FALSE**。

## `reset()`

将数组的内部指针指向第一个单元并返回其值

```php
mixed reset ( array &$array );
```

## `end()`

将数组的内部指针指向最后一个单元并返回其值

```php
mixed end ( array &$array );
```

## `next()`

将数组中的内部指针向前移动一位并返回其值

```php
mixed next ( array &$array );
```

## `prev()`

将数组的内部指针倒回一位并返回其值

```php
mixed prev ( array &$array );
```

## `array_multisort()`

对多个数组或多维数组进行排序

```php
bool array_multisort ( array &$arr [, mixed $arg = SORT_ASC [, mixed $arg = SORT_REGULAR [, mixed $... ]]] );
```

可以用来一次对多个数组进行排序，或者根据某一维或多维对多维数组进行排序。

关联（[string](http://php.net/manual/zh/language.types.string.php)）键名保持不变，但数字键名会被重新索引。

排序顺序标志：

* **SORT_ASC** - 按照上升顺序排序
* **SORT_DESC** - 按照下降顺序排序

排序类型标志：

* **SORT_REGULAR** - 将项目按照通常方法比较
* **SORT_NUMERIC** - 将项目按照数值比较
* **SORT_STRING** - 将项目按照字符串比较

## `asort()`

对数组进行排序并保持索引关联，由低到高

```php
bool asort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

**参数**

`sort_flags`

* **SORT_REGULAR** - 正常比较单元（不改变类型）
* **SORT_NUMERIC** - 单元被作为数字来比较
* **SORT_STRING** - 单元被作为字符串来比较
* **SORT_LOCALE_STRING** - 根据当前的区域（locale）设置来把单元当作字符串比较，可以用 [setlocale()](http://php.net/manual/zh/function.setlocale.php) 来改变。
* **SORT_NATURAL** - 和 [natsort()](http://php.net/manual/zh/function.natsort.php) 类似对每个单元以“自然的顺序”对字符串进行排序。 PHP 5.4.0 中新增的。
* **SORT_FLAG_CASE** - 能够与 **SORT_STRING** 或 **SORT_NATURAL** 合并（OR 位运算），不区分大小写排序字符串。

**返回值**

成功时返回 **TRUE**， 或者在失败时返回 **FALSE**。

## `arsort()`

对数组进行逆向排序并保持索引关联，由高到低

```php
bool arsort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

## `ksort()`

对数组按照键名排序，由低到高

```php
bool ksort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

## `krsort()`

对数组按照键名逆向排序，由高到低

```php
bool krsort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

## `sort()`

对数组排序，不保持索引关联，由低到高

```php
bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

## `rsort()`

对数组逆向排序，不保持索引关联，由高到低

```php
bool rsort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

## `usort()`

使用用户自定义的比较函数对数组中的值进行排序，不保持索引关联

```php
bool usort ( array &$array , callable $cmp_function );
```

**参数**

`cmp_function`

在第一个参数小于，等于或大于第二个参数时，该比较函数必须相应地返回一个小于，等于或大于 0 的整数。

`int callback ( mixed $a, mixed $b );`

## `uasort()`

使用用户自定义的比较函数对数组中的值进行排序并保持索引关联

```php
bool uasort ( array &$array , callable $cmp_function );
```

## `uksort()`

使用用户自定义的比较函数对数组中的键名进行排序并保持索引关联

```php
bool uksort ( array &$array , callable $cmp_function );
```

## `shuffle()`

将数组打乱

```php
bool shuffle ( array &$array );
```

## `natsort()`

用“自然排序”算法对数组排序

```php
bool natsort ( array &$array );
```

> 实现了一个和人们通常对字母数字字符串进行排序的方法一样的排序算法并保持原有键／值的关联，这被称为“自然排序”。
>

## `natcasesort()`

用“自然排序”算法对数组进行不区分大小写字母的排序

```php
bool natcasesort ( array &$array );
```

## `array_unshift()`

在数组开头插入一个或多个单元

```php
int array_unshift ( array &$array , mixed $var [, mixed $... ] );
```

## `array_shift()`

将数组开头的单元移出数组

```php
mixed array_shift ( array &$array );
```

## `array_push()`

将一个或多个单元压入数组的末尾（入栈）

```php
int array_push ( array &$array , mixed $var [, mixed $... ] );
```

## `array_pop()`

将数组最后一个单元弹出（出栈）

```php
mixed array_pop ( array &$array );
```

## `array_rand()`

从数组中随机取出一个或多个单元

```php
mixed array_rand( array $input [, int $num_req = 1]);
```

## `implode()`

将一个一维数组的值转化为字符串

```php
string implode ( [string $glue,] array $pieces);
```

## `explode()`

使用一个字符串分割另一个字符串

```php
array explode ( string $delimiter, string $string[, int $limit]);
```

## `range()`

建立一个包含指定范围单元的数组

```php
array range ( mixed $start, mixed $limit[, number $step = 1]);
```

## [`array_merge()`](http://php.net/manual/zh/function.array-merge.php)

合并一个或多个数组

```php
array array_merge( array $array1 [, array $...] );
```

> 如果有相同的字符串键名，则该键名后面的值将覆盖前一个值。然而，如果数组包含数字键名，后面的值将*不会*覆盖原来的值，而是附加到后面。
>
> `+` 运算符
>
> 如果数组中有相同的__键名__，刚会把最先出现的值作为最终结果返回，而把后面拥有相同键名的值抛弃掉。

## [`array_merge_recursive()`](http://php.net/manual/zh/function.array-merge-recursive.php)

递归地合并一个或多个数组

```php
array array_merge_recursive ( array $array1 [, array $...] );
```

## [`array_combine()`](http://php.net/manual/zh/function.array-combine.php)

创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值

```php
array array_combine ( array $keys , array $values );
```

## [`array_slice()`](http://php.net/manual/zh/function.array-slice.php)

从数组中取出一段

```php
array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] );
```

## [`array_chunk()`](http://php.net/manual/zh/function.array-chunk.php)

将一个数组分割成多个

```php
array array_chunk ( array $input , int $size [, bool $preserve_keys = false ] );
```

## [`array_intersect()`](http://php.net/manual/zh/function.array-intersect.php)

计算数组的交集

```php
array array_intersect ( array $array1 , array $array2 [, array $ ... ] );
```

## [`array_intersect_assoc()`](http://php.net/manual/zh/function.array-intersect-assoc.php)

带索引检查计算数组的交集

```php
array array_intersect_assoc ( array $array1 , array $array2 [, array $ ... ] );
```

## [`array_diff()`](http://php.net/manual/zh/function.array-diff.php)

计算数组的差集

```php
array array_diff ( array $array1 , array $array2 [, array $... ] );
```

## [`array_diff_assoc()`](http://php.net/manual/zh/function.array-diff-assoc.php)

带索引检查计算数组的差集

```php
array array_diff_assoc ( array $array1 , array $array2 [, array $... ] );
```

## [`array_column()`](http://php.net/manual/zh/function.array-diff-assoc.php)

返回数组中指定的一列

```php
array array_column ( array $input , mixed $column_key [, mixed $index_key = null ] );
```

> 返回input数组中键值为column_key的列， 如果指定了可选参数index_key，那么input数组中的这一列的值将作为返回数组中对应值的键。

## [`array_fill`](https://secure.php.net/manual/zh/function.array-fill.php)

用给定的值填充数组

```php
array array_fill ( int $start_index , int $num , mixed $value );
```

## [`array_fill_keys`](https://secure.php.net/manual/zh/function.array-fill-keys.php)

使用指定的键和值填充数组

```php
array array_fill_keys ( array $keys , mixed $value );
```

## [`array_sum`](https://secure.php.net/manual/zh/function.array-sum.php)

对数组中所有值求和

```php
number array_sum ( array $array );
```

## [`array_flip`](https://secure.php.net/manual/zh/function.array-flip.php)

交换数组中的键和值

```php
array array_flip ( array $array );
```

## [`array_filter`](http://php.net/manual/zh/function.array-filter.php)

用回调函数过滤数组中的单元

```php
array array_filter ( array $array [, callable $callback [, int $flag = 0 ]] );
```
