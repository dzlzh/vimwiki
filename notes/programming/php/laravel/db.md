# Laravel - DB

## 打印日志

```
DB::connection()->enableQueryLog(); // 开启QueryLog
...
var_dump(DB::getQueryLog());
```
