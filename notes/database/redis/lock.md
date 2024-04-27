# lock

- `SETNX` + `EXPIRE` (不是原子操作)
- `SETNX` + `value` (系统时间+过期时间)
- 使用Lua脚本 (包含`SETNX` + `EXPIRE`两条指令)
- `SET EX PX NX`
- `SET EX PX NX` + 校验唯一随机值,再删除
