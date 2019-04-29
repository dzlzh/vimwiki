# Software Inventory - Scoop

[Scoop](https://github.com/lukesampson/scoop)

```
set-executionpolicy remotesigned -scope currentuser
[environment]::setEnvironmentVariable('SCOOP','D:\Scoop','User')
$env:SCOOP='D:\Scoop'
iex (new-object net.webclient).downloadstring('https://get.scoop.sh')
```

## 基本操作

| 命令      | 动作         |
| :-:       | :-:          |
| search    | 搜索软件名   |
| install   | 安装软件     |
| update    | 更新软件     |
| status    | 查看软件状态 |
| uninstall | 卸载软件     |
| info      | 查看软件详情 |
| home      | 打开软件主页 |
| bucket    | 管理 Bucket  |

## 添加基础 Bucket

```
scoop bucket add extras
scoop bucket add versions
scoop bucket add jetbrains
```

## 必装软件

```
scoop install -a 64bit 7zip aria2 git
scoop install -a 64bit shadowsocks
scoop install -a 64bit keepass
scoop install -a 64bit telegram
scoop install -a 64bit snipaste
scoop install -a 64bit quicklook
scoop install -a 64bit flux
scoop install -a 64bit putty
scoop install -a 64bit heidisql
scoop install -a 64bit robo3t
scoop install -a 64bit postman
scoop install -a 64bit neovim-nightly
scoop install -a 64bit phpstorm
scoop install -a 64bit ag
scoop install -a 64bit ctags
scoop install -a 64bit php-nts composer
scoop install -a 64bit python27 python
scoop install -a 64bit nodejs-lts yarn
scoop install -a 64bit proxifier-portable
scoop install -a 64bit geekuninstaller
scoop install -a 64bit teamviewer
scoop install -a 64bit motrix
scoop install -a 64bit rufus
scoop install -a 64bit terminus
scoop install -a 64bit concfg
scoop install -a 64bit pshazz 
```
