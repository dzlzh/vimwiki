# MySQL8.0.11 踩坑记

在 MySQL 8.0.11 中默认的认证方式为 `caching_sha2_password`，导致数据库链接错误。

## 解决方法

1.修改密码认识方式

```sql
ALTER USER 'USER'@'HOST' IDENTIFIED WITH mysql_native_password BY 'PASSWORD';
```
2.修改 MySQL 配置，重新创建用户

```
default-authentication-plugin = mysql_native_password
```
