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

## 镜像

### 获取镜像

```shell
docker pull [选项] [Docker Registry地址]<仓库名>:<标签>
```

### 列出镜像

```shell
docker images
```

### 构建镜像

```shell
docker build [选项] <上下文路径/URL/->
```

### 删除镜像

```shell
docker rmi [选项] <镜像1> [<镜像2> ...]
```

## 容器

### 启动容器

- `docker run` 新建并启动
  - `-d` 后台运行
- `docker start` 启动已终止容器

### 终止容器

- `docker stop`

### 重启容器

- `docker restart`

### 进入容器

- `docker attach`

### 导出容器

- `docker export`

### 导入容器快照

- `docker import`

### 删除容器

- `docker rm`

## [Dockerfile](dockerfile.md)
