# PHP7 install

## 0x00 下载源码 & 解压

```sh
wget http://php.net/get/php-7.1.7.tar.bz2/from/this/mirror -O php-7.1.7.tar.bz2
tar xjf php-7.1.7.tar.bz2
cd php-7.1.7
```

## 0x01 配置

```sh
./configure --prefix=/usr/local/php \
--with-config-file-path=/usr/local/php/etc \
--with-mysqli \
--with-openssl \
--enable-fpm \
--enable-mbstring \
--with-freetype-dir \
--with-jpeg-dir \
--with-png-dir \
--with-zlib-dir \
--with-libxml-dir=/usr \
--enable-xml \
--with-mhash \
--with-mcrypt \
--enable-pcntl \
--enable-sockets \
--with-bz2 \
--with-curl \
--enable-mbregex \
--with-gd \
--enable-gd-native-ttf \
--enable-zip \
--enable-soap \
--with-iconv \
--enable-sysvshm \
--enable-sysvmsg \
--with-pdo-mysql
```

可能会报错缺少库，按照错误安装好库。

我使用的是 ubuntu 中间安装了
- gcc
- make
- libxml2-dev
- libcurl4-openssl-dev
- pkg-config
- libbz2-dev
- libjpeg-dev
- libpng12-dev
- libfreetype6
- libfreetype6-dev
- libmcrypt-dev


## 0x02 编译 & 安装

```sh
make & make install
```
