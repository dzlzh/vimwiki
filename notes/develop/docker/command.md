# Command

## 镜像(image)

### 获取镜像

```
docker pull [option] [Docker Registry]<仓库名>:<标签>
```

### 列出镜像

```
docker images
docker image ls
```

### 构建镜像

```
docker build [option] <path/URL/->
```

- `-t <image name>`

### 删除镜像

```
docker rmi [option] <image1> [<image2> ...]
```

### 发布

```
docker login

docker image tag [imageName] [username]/[repository]:[tag]

docker image build -t [username]/[repository]:[tag] [Dockerfile Path]

docker image push [username]/[repository]:[tag]
```

## 容器(container)

### 启动容器

#### 新建并启动

命令会从 image 文件，生成一个正在运行的容器实例。如果发现本地没有指定的 image 文件，就会从仓库自动抓取。

- `docker run` 
- `docker container run` 
  - `-d` 后台运行
  - `-p [ip:]<host port:container port>` 本机端口映射到容器
  - `-it <shell>` 映射到当前 Shell
  - `--rm` 容器终止运行后自动删除容器文件
  - `--name <name>` 容器名字
  - `--volume <path>:<container path>` 将目录映射
  - `--env <env>` 向容器进程中传入一个环境变量
  - `--link <container name>:<alias>` 要连接容器
 
#### 启动已终止容器

- `docker start` 
- `docker container start`

### 终止容器

- `docker stop`
- `docker container stop [containID]`
- `docker container kill [containID]` 强制退出

### 重启容器

- `docker restart`

### 列出容器

#### 正在运行的容器

- `docker ps`
- `docker container ls`

#### 全部容器

- `docker ps -all`
- `docker container ls -all`

### 进入容器

- `docker attach`
- `docker container exec [containID]`

### 查看容器输出

- `docker logs`
- `docker container logs [containID]`

### 导出容器

- `docker export`

### 导入容器快照

- `docker import`

### 删除容器

- `docker rm`
- `docker container rm [containerID]`

### 拷贝容器里文件与本机

- `docker cp`
- `docker container cp [containID]:[path] [path]`
- `docker container cp [path] [containID]:[path]`
