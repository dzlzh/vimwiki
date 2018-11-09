# Docker

## 安装 Docker

### Windows7 下安装 Docker

- [Docker Toolbox](https://www.docker.com/products/docker-toolbox)

### Windows10 下安装 Docker

- [Docker For Windows](https://www.docker.com/docker-windows)

### CentOS7 下安装

#### 自动安装

- Docker `curl -sSL https://get.docker.com/ | sh`
- DaoCloud `curl -sSL https://get.daocloud.io/docker | sh`
- 阿里云 `curl -sSL http://acs-public-mirror.oss-cn-hangzhou.aliyuncs.com/docker-engine/internet | sh`

#### 手动安装

- 添加内核参数
```shell
$ sudo tee -a /etc/sysctl.conf <<-EOF
net.bridge.bridge-nf-call-ip6tables = 1
net.bridge.bridge-nf-call-iptables = 1
EOF
```
- 重新加载 `sysctl.conf`
```shell
$ sudo sysctl -p
```
- 添加 `yun` 源
```shell
$ sudo tee /etc/yum.repos.d/docker.repo <<-'EOF'
[dockerrepo]
name=Docker Repository
baseurl=https://yum.dockerproject.org/repo/main/centos/7/
enabled=1
gpgcheck=1
gpgkey=https://yum.dockerproject.org/gpg
EOF
```
- 安装 Docker
```shell
$ sudo yum update
$ sudo yum install docker-engine
```
- 启动 Docker 引擎
```shell
$ sudo systemctl enable docker
$ sudo systemctl start docker
```
- 建立 Docker 用户组
```shell
# 建立 docker 组
$ sudo groupadd docker
# 将当前用户加入 docker 组
$ sudo usermod -aG docker $USER
```

## 镜像(image)

### 获取镜像

```shell
docker pull [选项] [Docker Registry地址]<仓库名>:<标签>
```

### 列出镜像

```shell
docker images
docker image ls
```

### 构建镜像

```shell
docker build [选项] <上下文路径/URL/->
```

- `-t <image name>`

### 删除镜像

```shell
docker rmi [选项] <镜像1> [<镜像2> ...]
```

### 发布

```shell
docker login

docker image tag [imageName] [username]/[repository]:[tag]
// 或
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
  - `-p [ip:]<本机端口:容器端口>` 本机端口映射到容器
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

## [Dockerfile](dockerfile.md)
