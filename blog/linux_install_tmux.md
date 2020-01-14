# tmux 编译安装

[tmux](https://github.com/tmux/tmux)

## 下载源文件

```sh
# 这里是安装的 3.0a
wget https://github.com/tmux/tmux/releases/download/3.0a/tmux-3.0a.tar.gz
```

## 解压

```sh
tra xzfv tmux-3.0a.tar.gz
```

## 安装依赖

### centos

```sh
yum install -y libevent-devel ncurses-devel
```

## 编译安装

```sh
cd tmux-3.0a
./configure && make
sudo make install
```
