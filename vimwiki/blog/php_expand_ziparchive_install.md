# PHP 扩展 ZipArchive 安装

## 0x00 下载源码 & 解压

```sh
# 下载为最新版本（可上网站选择其它版本）
wget http://pecl.php.net/get/zip
tar -zxvf zip
cd zip-x.x.x
```

## 0x01 配置

```sh
phpize
./configure --with-php-config=/usr/local/php/bin/php-config
```


## 0x02 编译 & 安装

```sh
make & make install
```

## 0x03 配置 php.ini

```
# 找到 php.ini
php -i | grep php.ini
# 编辑 php.ini
vi /xxx/php.ini
```

在 `php.ini` 中添加 __`extension=zip.so`__

重启服务

查看是否已经成功安装 `php -m | grep zip`

## 安装中遇到的问题

- 在运行 `./configure` 时，提示： __`Please reinstall the libzip distribution`__ 是因为 `libzip` 版本过低，编译升级
  ```sh
  # 先卸载了原先的 libzip
  yum remove libzip
  # 下载 libzip 源码（去网站选择合适的版本）
  wget https://nih.at/libzip/libzip-xxx.tar.gz
  # 解压
  tar -zxvf libzip-xxx.tar.gz
  cd libzip-xxx
  # 配置
  ./configure
  # 编译 & 安装
  make & make install
  ```
- 在安装完新版的 `libzip` 时可能会出现打不到 `zipconf.h`，手动复制一下 `cp /usr/local/lib/libzip/include/zipconf.h /usr/local/include/zipconf.h`

