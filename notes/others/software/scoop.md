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
```

## 必装软件

```
scoop install aria2
scoop install aria2 7z git
scoop install php-nts composer
scoop install python27 python
scoop install nodejs-lts yarn
```
