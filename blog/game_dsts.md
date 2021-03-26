# 饥荒联机专属服务器搭建

```
sudo useradd -m dst
su dst
wget -P ~/steamcmd https://steamcdn-a.akamaihd.net/client/installer/steamcmd_linux.tar.gz && tar -C ~/steamcmd -xvzf ~/steamcmd/steamcmd_linux.tar.gz
~/steamcmd/steamcmd.sh +login anonymous +force_install_dir ~/dst +app_update 343050 validate +quit

# 查看是否缺少依赖
ldd ~/dst/bin/dontstarve_dedicated_server_nullrenderer
# libcurl-gnutls.so.4
# Manjaro:lib32-libcurl-gnutls
# Ubuntu:libcurl3-gnutls:i386

# 启动
~/dst/bin/dontstarve_dedicated_server_nullrenderer -console -cluster word -shard Master
~/dst/bin/dontstarve_dedicated_server_nullrenderer -console -cluster word -shard Caves
```
