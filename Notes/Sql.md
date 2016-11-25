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