# Git 命令

## 本地操作

- `git init` 初始化
- `git add [file|dir|.|-p]` 添加指定 『文件|目录|所有文件|] 到暂存区
  - `-p` 添加每个变化前，都会要求确认。对于同一个文件的多处变化，可以实现颁奖提交
- `git rm [--cached][file]` 删除工作区文件，并且将这次删除放入到暂存区
  - `--cached` 停止追踪指定文件，但该文件会保留在工作区
- `git mv [file-original] [file-renamed]` 改名文件，并且将这个改名放入暂存区
- `git commit` 提交到分支
  - `-m` 提交暂存区到仓库区
  - `-a` 提交工作区自上次 commit 之后的变化，直接到仓库区
  - `--amend -m` 使用一新的 commit，替代上一次提交。如果代码没有任何新变化，则用来改写上一次 commit 的提交信息
  - `--amend --no-edit` 不修改提交信息，提交新的文件与更改
  - `--verbose` 列出 diff 信息
- `git status` 查看状态
- `git show [commit]` 查看 commit 的详细内容
- `git diff [commit]^!` 查看 commit 的详细内容
- `git diff` 查看不同
- `git diff HEAD` 查看工作区和版本库里面最新版本的区别
- `git diff --cached [file]` 显示暂存区和上一个 commit 的差异
- `git diff <branch> <branch> [file]` 比较两个分支的差异『可指定文件』
    - `--stat` 只给出文件列表
- `git log` 查看日志
- `git log --graph ` 查看分支合并图
- `git reflog` 查看用过的命令
- `git reset <HEAD^|commitID>` 版本回退
  - `--hard` 丢弃工作区的修改
  - `--soft` 保留工作区的修改
- `git reset HEAD file` 可以把暂存区的修改撤销掉
- `git checkout -- file` 可以丢弃工作区的修改
  - `-b` 创建分支并切换
  - `--orphan` 创建一个干净的分支
- `git clean` 撤销新增
  - `-f` 文件
  - `-d` 文件夹
- `git stash` 把当前工作现场“储藏”起来
- `git stash save <commit>` 把当前工作现场“储藏”起来
- `git stash list` 查看储藏
- `git stash apply [stash@{x}]` 恢复储藏，`stash@{x}` 指定恢复
- `git stash drop` 删除储藏
- `git stash pop` 恢复并删除
- `git revert <commit>` 撤销
  - `-m <parentId>` 撤销合并的时候选择撤销到那个 parent
- `git cherry-pick [<options>] <commit>` 挑一个 commit 重新提交

## 远程操作

- `git clone` 克隆
  - `--recursive` 递归拉取
- `git remote` 远程库
- `git fetch` 下载远程仓库的所有变动
- `git pull [remote] [rbranch:branch]` 拉取远程库到本地
  - `--rebase` 使用 `rebase` 策略代替 `merge` 策略
- `git push [remote] [branch:rbranch]` 推送本地到远程库
  - `--force` 强行推送当前分支到远程仓库，即使有冲突
  - `--all` 推送所有分支到远程仓库

## 分支操作

- `git branch [-r|-a]` 查看分支 『远程分支|本地与远程所有分支』
- `git branch <name>` 创建分支
- `git checkout <name>` 切换分支
- `git checkout -b <name> [origin/name]` 创建并切换 (-b) 分支，[origin/name] 指定远程分支
- `git checkout --orphan <name> ` 创建空分支
- `git merge <name>` 合并指定分支到当前分支
- `git merge --no-ff -m "<message>" <branch>` 用普通模式合并，并且提交描述
- `git merge --squash`
- `git branch -d <name>` 删除分支，-D 强制删除
- `git branch --set-upstream <name> <origin/name>` 指定本地分支与远程分支的链接
- `git rebase` 合并
  - `-i` 把 commit 压缩成一个
    - `pick` 正常选中
    - `reword` 选中，并且修改提交信息；
    - `edit` 选中，rebase 时会暂停，允许你修改这个 commit
    - `squash` 选中，会将当前 commit 与上一个 commit 合并
    - `fixup` 与 squash 相同，但不会保存当前 commit 的提交信息
    - `exec` 执行其他 shell 命令
  - `--continue` 继续
  - `--abort` 取消

## 标签操作

- `git tag` 查看标签
- `git tag <name> [commitid]` 打一个新标签默认 HEAD，可以给历史提交打标签
- `git tag -a <name> -m <message>` -a 指定标签名， -m 指定标签说明， -s 私钥签名一个标签 (PGP) 必须有 gpg
- `git show <tagname>` 查看标签信息
- `git tag -d <name>` 删除标签
- `git push origin <tagname|--tags>` 推送《标签|全部标签》到远程
- `git push origin :refs/tags/<tagname>` 删除远程标签，先删除本地然后推送

## 其他操作

- `git archive` 生成一个可供发布的压缩包

## 撤销操作

| 命令            | 作用域   | 常用场景                           |
| :-------------: | :------: | :--------------------------------: |
| `git reset`     | 提交层面 | 在私有分支上舍弃一些没有提交的更改 |
| `git reset`     | 文件层面 | 将文件从缓存区中移除               |
| `git checkout`  | 提交层面 | 切换分支或查看旧版本               |
| `git checkout`  | 文件层面 | 舍弃工作目录中的更改               |
| `git revert`    | 提交层面 | 在公共分支上回滚更改               |
| `git revert`    | 文件层面 | (N/A)                              |

## 子模块

- `git submodule add <path>` 添加子模块
- `git submodule foreach <command>` 对子模块使用的命令

```git
# 克隆带有子模块的仓库
git submodule init # 初始化子模块
git submodule update # 更新到主仓库
```
