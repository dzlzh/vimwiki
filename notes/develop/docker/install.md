# Install Docker

## Windows7 下安装 Docker

- [Docker Toolbox](https://www.docker.com/products/docker-toolbox)

## Windows10 下安装 Docker

- [Docker For Windows](https://www.docker.com/docker-windows)

## CentOS7 下安装

### 自动安装

- Docker `curl -sSL https://get.docker.com/ | sh`
- DaoCloud `curl -sSL https://get.daocloud.io/docker | sh`
- 阿里云 `curl -sSL http://acs-public-mirror.oss-cn-hangzhou.aliyuncs.com/docker-engine/internet | sh`

### 手动安装

- 添加内核参数
```sh
$ sudo tee -a /etc/sysctl.conf <<-EOF
net.bridge.bridge-nf-call-ip6tables = 1
net.bridge.bridge-nf-call-iptables = 1
EOF
```
- 重新加载 `sysctl.conf`
```sh
$ sudo sysctl -p
```
- 添加 `yun` 源
```sh
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
```sh
$ sudo yum update
$ sudo yum install docker-engine
```
- 启动 Docker 引擎
```sh
$ sudo systemctl enable docker
$ sudo systemctl start docker
```
- 建立 Docker 用户组
```sh
# 建立 docker 组
$ sudo groupadd docker
# 将当前用户加入 docker 组
$ sudo usermod -aG docker $USER
```
