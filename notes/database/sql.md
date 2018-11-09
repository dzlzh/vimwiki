# Mysql

## 判断中文

`where hex(title) not regexp '^([0-7][0-9A-F])*$'`

## 判断纯英文

`where hex(title) regexp '^([0-7][0-9A-F])*$'`

## `UNION` 和 `UNION ALL`操作符

`UNION`操作符用于合并两个或多个SELECT语句的结果集。

**SQL `UNION` 语法**

```sql
SELECT column_name(s) FROM table_name1
UNION
SELECT column_name(s) FROM table_name2
```

**SQL `UNION ALL` 语法**

```sql
SELECT column_name(s) FROM table_name1
UNION
SELECT column_name(s) FROM table_name2
```

> 默认的，`UNION`操作符选取不同的值。如果允许重复的值，请使用`UNION ALL`

## AFTER

删除，添加或修改表字段时设定位于某个字段之后

## FROM_UNIXTIME

时间戳以格式化显示

```sql
FROM_UNIXTIME(unix_timestamp ，format)
```

## UNIX_TIMESTAMP

日期数据转换成时间戳

```sql
UNIX_TIMESTAMP(date)
```

## DATE_FORMAT

以不同的格式显示日期 / 时间数据

```sql
DATE_FORMAT(date,format)
```

## DISTINCT

仅仅列出不同的值

```
SELECT DISTINCT 列名称 FROM 表名称
```
