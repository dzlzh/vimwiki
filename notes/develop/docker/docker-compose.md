# Docker-Compose

```
# 构建镜像
docker-compose build
# --force-rm 删除构建过程中的临时容器

# 创建所有服务并启动（不要执行此命令）
docker-compose up

# 创建单个服务
docker-compose up redis
docker-compose up -d redis    # 后台启动

# 查看服务
docker-compose ps

# 列出 Compose 文件中包含的镜像
docker-compose images

# 如果容器已经创建
# 启动
docker-compose start redis

# 停止
docker-compose stop redis

# 重启
docker-compose restart redis

# 删除
docker-compose rm redis
```
