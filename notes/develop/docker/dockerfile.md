# Dockerfile

`.dockerignore` 排除路径，不打包进入 image 文件

## `FROM`

指定基础镜像。必备指令，并且必须是第一条

`scratch` 特殊镜像，表示一个空白的镜像

```
FROM <image> [AS <name>]
FROM <image>[:<tag>] [AS <name>]
FROM <image>[@<digest>] [AS <name>]
```

## `LABEL`

给镜像添加元数据

```
LABEL <key>=<value>
```

## `ENV`

设置环境变量

```
ENV <key> <value>
ENV <key>=<value>
```

## `WORKDIR`

设置工作目录，
在该指令后的 `RUN`、`CMD`、`ENTRYPOINT`、 `COPY`、`ADD` 指令都会在该目录执行。
如果该目录不存在，
则会创建

```
WORKDIR <path>
```

## `RUN`

执行命令，
在 image 构建阶段执行，执行结果会打包进入 image 文件

```
# shell 就像直接在命令行中输入的命令一样
RUN <command>
# exec 像函数调用中的格式
RUN ["exec", "param1", "param2"]
```

## `COPY`

从宿主机拷贝文件或者文件夹到镜像，
不能复制网络文件也不会自动解压缩

```
COPY [--chown=<user>:<group>] <src>... <dest>
COPY [--chown=<user>:<group>] ["<src>",... "<dest>"]
```


## `ADD`

从宿主机拷贝文件或者文件夹到镜像，
可以复制一个网络文件会自动解压缩

```
ADD [--chown=<user>:<group>] <src>... <dest>
ADD [--chown=<user>:<group>] ["<src>",... "<dest>"]
```

## `VOLUME`

创建挂载点

```
VOLUME <path>
VOLUME ["<path1>", "<path2>"...]
```

## `EXPOSE`

指定容器运行时对外暴露的端口

```
EXPOSE <port> [<port>...]
```

## `ENTRYPOINT`

容器启动时运行的命令

`CMD` 指定的命令不会执行

`docker run ` 命令不会覆盖，任何参数只会当做参数传递

一个 Dockerfile 只可以有一个

```
ENTRYPOINT  <command> [<param>]
ENTRYPOINT ["exec", "param1", "param2"]
```

# `CMD`

容器启动时运行的命令

`docker run ` 命令会覆盖

一个 Dockerfile 只可以有一个

```
CMD <command> [<param>]
CMD ["exec", "param1", "param2"...]
# 在指定了 ENTRYPOINT 指令后，用 CMD 指定具体的参数
CMD ["param1", "param2"...] 
```

## `USER`

指定运行镜像所使用的用户

```
USER <user>[:<group>]
USER <UID>[:<GID>]
```

# `ARG`

在镜像构建时可传递的变量

```
ARG <name>[=<default value>]
```

## `ONBUILD`

当所构建的镜像被当做其他镜像的基础镜像时，指定的命令会被触发

```
ONBUILD <INSTRUCTION>
```

## `STOPSIGNAL`

设置当容器停止时所要发送的系统调用信号

```
STOPSIGNAL signal
```

## `HEALTHCHECK`

设置怎么检测一个容器的运行状况

```
# 如果基础镜像有健康检查指令，使用这行可以屏蔽掉其健康检查指令
HEALTHCHECK NONE
# 在容器内运行运行命令检测容器的运行情况
HEALTHCHECK [OPTIONS] CMD <command>
```

## `SHELL`

设置执行命令所使用的默认的 shell 类型

```
SHELL ["exec", "param"]
```
