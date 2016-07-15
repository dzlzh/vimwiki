# Docker
```

service docker start    //查看Docker的守护进程

chkconfig docker on     //Docker系统启动时运行

docker login            //登录https://hub.docker.com/

docker search           //查找官方仓库中的镜像

docker pull [ubuntu]    //创建镜像

docker run              //运行容器
    -t -i 
    -d                  //后台

docker start            //启动已终止容器
    -i

docker stop             //终止容器

docker restart          //终止并重启

docker attach           //进入容器

docker ps               //列出容器
    -a

docker log              //查看容器输出信息

docker images           //列出本地镜像

docker commit           //提交更新
    -m "" -a "作者"

docker tag              //修改镜像的标签

docker buila            //创建新镜像Dockerfile

docker push             //上传到仓库

docker save             //导出镜像

docker load             //裁入镜像

docker rmi              //移除本地镜像

docker rm               //移除容器

docker export           //导出某个容器

docker import           //导出某个容器

```
