# Mysql

## 判断中文

`where hex(title) not regexp '^([0-7][0-9A-F])*$'`

## 判断纯英文

`where hex(title) regexp '^([0-7][0-9A-F])*$'`