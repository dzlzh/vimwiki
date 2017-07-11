# Git

## 命令

### 本地操作

- `git init` 初始化
- `git add [file|dir|.|-p]` 添加指定 [文件|目录|所有文件|] 到暂存区
  - `-p` 添加每个变化前，都会要求确认。对于同一个文件的多处变化，可以实现颁奖提交
- `git rm [--cached][file]` 删除工作区文件，并且将这次删除放入到暂存区
  - `--cached` 停止追踪指定文件，但该文件会保留在工作区
- `git mv [file-original] [file-renamed]` 改名文件，并且将这个改名放入暂存区
- `git commit` 提交到分支
  - `-m` 提交暂存区到仓库区
  - `-a` 提交工作区自上次 commit 之后的变化，直接到仓库区
  - `--amend -m` 使用一新的 commit，替代上一次提交。如果代码没有任何新变化，则用来改写上一次 commit 的提交信息
- `git status` 查看状态
- `git show [commit]` 查看 commit 的详细内容
- `git diff [commit]^!` 查看 commit 的详细内容
- `git diff` 查看不同
- `git diff HEAD` 查看工作区和版本库里面最新版本的区别
- `git diff --cached [file]` 显示暂存区和上一个 commit 的差异
- `git log` 查看日志
- `git log --graph ` 查看分支合并图
- `git reflog` 查看用过的命令
- `git reset --hard <HEAD^|commitID>` 版本回退
- `git reset HEAD file` 可以把暂存区的修改撤销掉
- `git checkout -- file` 可以丢弃工作区的修改
  - `-b` 创建分支并切换
  - `--orphan` 创建一个干净的分支
- `git stash` 把当前工作现场“储藏”起来
- `git stash list` 查看储藏
- `git stash apply [stash@{x}]` 恢复储藏，`stash@{x}` 指定恢复
- `git stash drop` 删除储藏
- `git stash pop` 恢复并删除

### 远程操作

- `git clone` 克隆
- `git remote` 远程库
- `git fetch` 下载远程仓库的所有变动
- `git pull [remote] [rbranch:branch]` 拉取远程库到本地
- `git push [remote] [branch:rbranch]` 推送本地到远程库
  - `--force` 强行推送当前分支到远程仓库，即使有冲突
  - `--all` 推送所有分支到远程仓库

### 分支操作

- `git branch [-r|-a]` 查看分支 [远程分支|本地与远程所有分支]
- `git branch <name>` 创建分支
- `git checkout <name>` 切换分支
- `git checkout -b <name> [origin/name]` 创建并切换 (-b) 分支，[origin/name] 指定远程分支
- `git merge <name>` 合并指定分支到当前分支
- `git merge --no-ff -m "<message>" <branch>` 用普通模式合并，并且提交描述
- `git branch -d <name>` 删除分支，-D 强制删除
- `git branch --set-upstream <name> <origin/name>` 指定本地分支与远程分支的链接
- `git rebase` 合并
  - `-i` 把 commit 压缩成一个
### 标签操作

- `git tag` 查看标签
- `git tag <name> [commitid]` 打一个新标签默认 HEAD，可以给历史提交打标签
- `git tag -a <name> -m <message>` -a 指定标签名， -m 指定标签说明， -s 私钥签名一个标签 (PGP) 必须有 gpg
- `git show <tagname>` 查看标签信息
- `git tag -d <name>` 删除标签
- `git push origin <tagname|--tags>` 推送<标签|全部标签>到远程
- `git push origin :refs/tags/<tagname>` 删除远程标签，先删除本地然后推送

### 其他操作

- `git archive` 生成一个可供发布的压缩包

### 分支名称

- `master` 稳定分支
- `develop ` 不稳定分支(开发分支)
- `issue` 或 `fixbug` BUG分支
- `feature` 新功能分支
- `release` 预发布分支

## 配置

- `git config --global user.name 'DZLZH'`
- `git config --global user.email 'dzlzh@null.net'`
- `git config --global alias.st = status`
- `git config --global alias.br = branch`
- `git config --global alias.ch = checkout`
- `git config --global alias.lg "log --color --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit"`
- `git config --global core.ignorecase false`
- `git config --global push.default 'current'`
  - `nothing` - push 操作无效，除非显式指定远程分支
  - `current` - push 当前分支到远程同名分支，如果远程同名分支不存在则自动创建同名分支
  - `upstream` - push 当前分支到它的 upstream 分支上（这一项其实用于经常从本地分支 push/pull 到同一远程仓库的情景，这种模式叫做 central workflow）
  - `simple` - simple 和 upstream 是相似的，只有一点不同，simple 必须保证本地分支和它的远程 upstream 分支同名，否则会拒绝 push 操作
  - `matching` - push 所有本地和远程两端都存在的同名分支

## 忽略文件

- `.gitignore`
- `.gitkeep`

## 技巧

### 关闭Issue

*关键字*

- `close`
- `closes`
- `closed`
- `fix`
- `fixes`
- `fixed`
- `resolve`
- `resolves`
- `resolved`

*格式*

- `fixes Issue_number`

### emoji

| emoji                       | code                          | info                        |
| :-------------------------: | :---------------------------: | :-------------------------: |
| :art:                       | `:art:`                       | 改进结构和代码格式          |
| :zap:                       | `:zap:`                       | 优化性能                    |
| :fire:                      | `:fire:`                      | 移除代码或文件              |
| :bug:                       | `:bug:`                       | 修复 BUG                    |
| :ambulance:                 | `:ambulance:`                 | 关键补丁                    |
| :sparkles:                  | `:sparkles:`                  | 引入新功能                  |
| :memo:                      | `:memo:`                      | 写文档                      |
| :rocket:                    | `:rocket:`                    | 部署                        |
| :lipstick:                  | `:lipstick:`                  | 更新 UI 和样式              |
| :tada:                      | `:tada:`                      | 初次提交                    |
| :white_check_mark:          | `:white_check_mark:`          | 添加测试                    |
| :lock:                      | `:lock:`                      | 修复安全问题                |
| :apple:                     | `:apple:`                     | 修复 macOS 下的问题         |
| :penguin:                   | `:penguin:`                   | 修复 Linux 下的问题         |
| :checkered_flag:            | `:checkered_flag:`            | 修复 Windows 下的问题       |
| :robot:                     | `:robot:`                     | 修复 Android 下的问题       |
| :green_apple:               | `:green_apple:`               | 修复 iOS 下的问题           |
| :bookmark:                  | `:bookmark:`                  | 发版/版本标签               |
| :rotating_light:            | `:rotating_light:`            | 解决的警告                  |
| :construction:              | `:construction:`              | 工作正在进行中              |
| :green_heart:               | `:green_heart:`               | 修复 CI 构建                |
| :arrow_down:                | `:arrow_down:`                | 降级依赖库                  |
| :arrow_up:                  | `:arrow_up:`                  | 升级依赖库                  |
| :construction_worker:       | `:construction_worker:`       | 添加 CI 构建系统            |
| :chart_with_upwards_trend:  | `:chart_with_upwards_trend:`  | 添加分析或跟踪代码          |
| :hammer:                    | `:hammer:`                    | 重构代码                    |
| :heavy_minus_sign:          | `:heavy_minus_sign:`          | 删除依赖关系                |
| :whale:                     | `:whale:`                     | 关于 Docker 的工作          |
| :heavy_plus_sign:           | `:heavy_plus_sign:`           | 添加依赖关系                |
| :wrench:                    | `:wrench:`                    | 更改配置文件                |
| :globe_with_meridians:      | `:globe_with_meridians:`      | 国际化和本地化              |
| :pencil2:                   | `:pencil2:`                   | 修复错别字                  |
| :hankey:                    | `:hankey:`                    | 还需改进的代码              |
| :rewind:                    | `:rewind:`                    | 撤销更改                    |
| :twisted_rightwards_arrows: | `:twisted_rightwards_arrows:` | 合并分支                    |
| :package:                   | `:package:`                   | 更新已编译的文件或包        |
| :alien:                     | `:alien:`                     | 由于外部 API 更改而更新代码 |
| :truck:                     | `:truck:`                     | 移动或重命名文件            |
| :page_facing_up:            | `:page_facing_up:`            | 添加或更新 license          |
| :boom:                      | `:boom:`                      | 重大变化                    |
| :bento:                     | `:bento:`                     | 添加或更新静态资源          |
| :ok_hand:                   | `:ok_hand:`                   | 由于代码审查更改而更新代码  |
| :wheelchair:                | `:wheelchair:`                | 辅助功能                    |
| :bulb:                      | `:bulb:`                      | 添加注释                    |
| :beers:                     | `:beers:`                     | 忘情的写代码                |
| :speech_balloon:            | `:speech_balloon:`            | 更新文本和文字              |
| :card_file_box:             | `:card_file_box:`             | 数据库相关改变              |
