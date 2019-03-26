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
scoop install -a <32bit|64bit> 7zip aria2 git shadowsocks
scoop install -a <32bit|64bit> putty terminus ag
scoop install -a <32bit|64bit> heidisql robo3t postman
scoop install -a <32bit|64bit> phpstorm
scoop install -a <32bit|64bit> keepass telegram
scoop install -a <32bit|64bit> snipaste quicklook flux
scoop install -a <32bit|64bit> neovim-nightly
scoop install -a <32bit|64bit> ag
scoop install -a <32bit|64bit> php-nts composer
scoop install -a <32bit|64bit> python27 python
scoop install -a <32bit|64bit> nodejs-lts yarn
scoop install -a <32bit|64bit> proxifier-portable
scoop install -a <32bit|64bit> geekuninstaller
scoop install -a <32bit|64bit> motrix rufus
scoop install -a <32bit|64bit> teamviewer
```
