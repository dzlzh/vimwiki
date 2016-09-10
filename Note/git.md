# 命令

## 本地操作

`git init` 初始化

`git add [file|dir|.|-p]` 添加指定 [文件|目录|所有文件|] 到暂存区

- `-p`添加每个变化前，都会要求确认。对于同一个文件的多处变化，可以实现颁奖提交

`git rm [--cached][file]` 删除工作区文件，并且将这次删除放入到暂存区

- `--cached` 停止追踪指定文件，但该文件会保留在工作区

`git mv` 改名文件，并且将这个改名放入暂存区

`git commit` 提交到分支

- `-m` 提交暂存区到仓库区
- `-a` 提交工作区自上次commit之后的变化，直接到仓库区
- `--amend -m` 使用一

`git status` 查看状态

`git diff` 查看不同

`git diff HEAD -- file` 查看工作区和版本库里面最新版本的区别

`git log` 查看日志

`git log --graph ` 查看分支合并图

`git reflog` 查看用过的命令

`git reset --hard <HEAD^|commitID>` 版本回退

`git reset HEAD file` 可以把暂存区的修改撤销掉

`git checkout -- file` 可以丢弃工作区的修改

`git stash` 把当前工作现场“储藏”起来

`git stash list` 查看储藏

`git stash apply [stash@{x}]` 恢复储藏,stash@{x}指定恢复

`git stash drop` 删除储藏

`git stash pop` 恢复并删除

## 远程操作

`git clone` 克隆

`git remote` 远程库

`git pull` 拉取远程库到本地

`git push` 推送本地到远程库

## 分支

`git branch` 查看分支

`git branch <name>` 创建分支

`git checkout <name>` 切换分支

`git checkout -b <name> [origin/name]` 创建并切换(-b)分支,[origin/name]指定远程分支

`git merge <name>` 合并指定分支到当前分支

`git merge --no-ff -m "<message>" <branch>` 用普通模式合并，并且提交描述

`git branch -d <name>` 删除分支,-D强制删除

`git branch --set-upstream <name> <origin/name>` 指定本地分支与远程分支的链接

## 标签

`git tag` 查看标签

`git tag <name> [commitid]` 打一个新标签默认HEAD,可以给历史提交打标签

`git tag -a <name> -m <message>` -a指定标签名, -m指定标签说明, -s 私钥签名一个标签(PGP)必须有gpg

`git show <tagname>` 查看标签信息

`git tag -d <name>` 删除标签

`git push origin <tagname|--tags>` 推送<标签|全部标签>到远程

`git push origin :refs/tags/<tagname>` 删除远程标签,先删除本地然后推送



# 分支名称

`master` 稳定分支

`develop ` 不稳定分支(开发分支)

`issue` 或 `fixbug` BUG分支

`feature` 新功能分支

`release` 预发布分支



# 别名

`git config --global alias.lg "log --color --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit"`