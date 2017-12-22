# Docker 命令速查表

## 查看 Docker 的守护进程

`service docker start`

## Docker 系统启动时运行

`chkconfig docker on`

## 登录 [https://hub.docker.com/](https://hub.docker.com/)

`docker login`

## 查找官方仓库中的镜像

`docker search`

## 创建镜像

`docker pull [ubuntu]`

## 运行容器

```
docker run
    -t -i
    -d      //后台运行
```

## 启动已终止容器

```
docker start
    -i
```

## 终止容器

`docker stop`

## 终止并重启

`docker restart`

## 进入容器

`docker attach`

## 列出容器

```
docker ps
    -a
```

## 查看容器输出信息

`docker log`

## 列出本地镜像

`docker images`

## 提交更新

```
docker commit

    -m "" -a "作者"
```

## 修改镜像的标签

`docker tag`

## 创建新镜像 Dockerfile

`docker buila`

## 上传到仓库

`docker push`

## 导出镜像

`docker save`

## 裁入镜像

`docker load`

## 移除本地镜像

`docker rmi`

## 移除容器

`docker rm`

## 导出某个容器

`docker export`

## 导出某个容器

`docker import`

