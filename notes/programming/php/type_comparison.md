# PHP - 类型比较表

| 表达式             | `gettype()` | `empty()` | `is_null()` | `isset()` | `boolean:if($x)` |
| :----------------: | :---------: | :-------: | :---------: | :-------: | :--------------: |
| `$x = "";`         | `string`    | `TRUE`    | `FALSE`     | `TRUE`    | `FALSE`          |
| `$x = null;`       | `NULL`      | `TRUE`    | `TRUE`      | `FALSE`   | `FALSE`          |
| `var $x;`          | `NULL`      | `TRUE`    | `TRUE`      | `FALSE`   | `FALSE`          |
| `$x is undefined ` | `NULL`      | `TRUE`    | `TRUE`      | `FALSE`   | `FALSE`          |
| `$x = array();`    | `array`     | `TRUE`    | `FALSE`     | `TRUE`    | `FALSE`          |
| `$x = false;`      | `boolean`   | `TRUE`    | `FALSE`     | `TRUE`    | `FALSE`          |
| `$x = true;`       | `boolean`   | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = 1;`          | `integer`   | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = 42;`         | `integer`   | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = 0;`          | `integer`   | `TRUE`    | `FALSE`     | `TRUE`    | `FALSE`          |
| `$x = -1;`         | `integer`   | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = "1";`        | `string`    | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = "0";`        | `string`    | `TRUE`    | `FALSE`     | `TRUE`    | `FALSE`          |
| `$x = "-1";`       | `string`    | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = "php";`      | `string`    | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = "true";`     | `string`    | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
| `$x = "false";`    | `string`    | `FALSE`   | `FALSE`     | `TRUE`    | `TRUE`           |
