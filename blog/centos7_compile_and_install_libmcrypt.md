# Centos7 编译安装 Libmcrypt 库

## 0x00 先下载 libmcrypt 库源码

[libmcrypt-2.5.8.tar.gz](https://sourceforge.net/projects/mcrypt/files/Libmcrypt/2.5.8/libmcrypt-2.5.8.tar.gz/download) 或者去这里 [libmcrypt](http://mcrypt.hellug.gr/lib/) 下载你需要的版本。

## 0x01 将下载的源码解压到文件夹

```sh
tar -zxvf libmcrypt-2.5.8.tar.gz
```

## 0x02 进入文件夹

```sh
cd libmcrypt-2.5.8
```

## 0x03 配置

```sh
./configure
```

## 0x04 编译 && 安装

```sh
make && make install
```

到此，libmcrypt 库安装成功。
