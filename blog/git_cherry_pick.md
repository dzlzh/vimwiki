# Git cherry-pick 使用指南

`git cherry-pick` 的作用，是把一个已经存在的提交拿到当前分支上重新提交一次。

它不是移动提交，也不是把原来的 commit 原封不动搬过来，而是把那个 commit 对应的代码变更重新应用到当前分支，然后生成一个新的 commit。所以 cherry-pick 之后，新提交的内容可能一样，但 commit hash 一定会变。

这个命令最适合处理一种情况：你不想合并整个分支，只想拿其中一个或几个提交。

## 常见场景

### 热修复同步到发布分支

线上分支 `release` 发现一个 bug，在 `master` 或 `hotfix` 分支上已经修好了。这时不一定要把整个分支合并到 `release`，因为里面可能还有未发布的功能。

可以只挑修复 bug 的那个提交：

```sh
git checkout release
git cherry-pick <commit>
```

这样 `release` 只拿到这个修复，不会带上其他开发中的代码。

### 从功能分支里拿一个独立提交

比如 `feature-pay` 分支里有很多提交，其中一个提交只是修了公共工具函数。其他分支也需要这个修复，但不想合并整个支付功能。

这时可以找到那个提交，然后在目标分支执行：

```sh
git cherry-pick <commit>
```

前提是这个提交足够独立。如果它依赖前面的提交，单独 cherry-pick 很容易冲突，或者编译通过不了。

### 补一个漏掉的提交

发布前经常会遇到这种情况：某个小修复已经提交在另一个分支上，但忘记带进当前发布分支。

这时 cherry-pick 比手动复制代码可靠，因为它会保留提交信息，也能让 Git 帮你处理补丁应用过程。

## 基本用法

先切到要接收代码的目标分支：

```sh
git checkout release
```

再从来源分支找到要挑选的提交：

```sh
git log --oneline <source-branch>
```

然后执行：

```sh
git cherry-pick <commit>
```

例如：

```sh
git cherry-pick a1b2c3d
```

执行成功后，当前分支会多出一个新的提交。这个新提交的内容来自 `a1b2c3d`，提交信息默认也会沿用原提交，但 hash 会重新生成。

## 一次挑多个提交

如果要挑多个不连续的提交，可以把 commit 依次写出来：

```sh
git cherry-pick a1b2c3d e4f5g6h
```

Git 会按顺序逐个应用。中途如果遇到冲突，会停在当前提交，等你解决后再继续。

如果要挑一段连续提交，可以使用范围：

```sh
git cherry-pick A..B
```

这里要注意：`A..B` 不包含 `A`，只包含从 `A` 之后到 `B` 的提交。

如果想包含 `A`，可以写成：

```sh
git cherry-pick A^..B
```

范围写法很方便，但也更容易误带提交。执行前最好先看一下范围里到底有哪些 commit：

```sh
git log --oneline A..B
```

## 冲突处理

cherry-pick 本质上是在当前分支应用另一个提交的变更，所以冲突并不特殊，处理方式和 merge、rebase 类似。

发生冲突时，Git 会停下来并提示冲突文件。处理流程通常是：

```sh
git status
# 手动解决冲突文件
git add <file>
git cherry-pick --continue
```

如果发现这个提交不该挑，可以放弃整个 cherry-pick：

```sh
git cherry-pick --abort
```

如果是一次 cherry-pick 多个提交，当前这个提交可以跳过：

```sh
git cherry-pick --skip
```

还有一个不太常用的命令：

```sh
git cherry-pick --quit
```

`--quit` 只是退出当前 cherry-pick 状态，不会像 `--abort` 那样尽量恢复到开始之前。一般日常使用里，想取消就用 `--abort`，想跳过当前提交就用 `--skip`。

## 常用参数

### `-x`

```sh
git cherry-pick -x <commit>
```

`-x` 会在新提交信息里追加一行来源说明，类似：

```text
(cherry picked from commit <commit>)
```

如果是在公共分支、发布分支之间同步修复，建议加上 `-x`。以后排查历史时，可以知道这个提交原来来自哪里。

### `-n` 或 `--no-commit`

```sh
git cherry-pick -n <commit>
```

`-n` 会把提交里的变更应用到当前工作区和暂存区，但不自动生成 commit。

这个参数适合把多个提交的变更先合在一起，再自己整理成一个新的提交：

```sh
git cherry-pick -n a1b2c3d
git cherry-pick -n e4f5g6h
git commit -m "fix: sync release fixes"
```

### `--edit`

```sh
git cherry-pick --edit <commit>
```

默认情况下，cherry-pick 会沿用原提交信息。加上 `--edit` 后，可以在提交前修改 commit message。

## cherry-pick merge commit

普通提交只有一个 parent，Git 知道应该把哪个变化应用过来。merge commit 有多个 parent，Git 不知道应该以哪条父提交作为主线，所以直接 cherry-pick merge commit 通常会报错。

如果确实要挑一个 merge commit，需要指定 mainline：

```sh
git cherry-pick -m 1 <merge-commit>
```

`-m 1` 表示以第一个 parent 作为主线。这个操作容易误解，尤其是在复杂分支历史里。实际工作中，更推荐找到 merge commit 里真正需要的普通提交，逐个 cherry-pick。

## 和 merge、rebase、revert 的区别

`merge` 是把一个分支的历史合并进当前分支，适合接收整个分支的工作。

`rebase` 是把一串提交换到新的基底上，常用于整理当前分支的提交历史。

`revert` 是生成一个反向提交，用来撤销某个已经提交的变更，适合公共分支上的安全回滚。

`cherry-pick` 是挑一个或几个提交应用到当前分支，适合跨分支同步少量明确的变更。

简单记：

- 要整个分支，用 `merge`
- 要整理当前分支历史，用 `rebase`
- 要撤销已经公开的提交，用 `revert`
- 要从别的分支拿少量提交，用 `cherry-pick`

## 实践建议

第一，提交要尽量小而独立。一个 commit 只做一件事，cherry-pick 时才容易挑。

第二，挑之前先看提交内容：

```sh
git show <commit>
```

确认它没有依赖其他未挑选的提交。

第三，公共分支之间同步修复时，优先使用：

```sh
git cherry-pick -x <commit>
```

来源清楚，后面追历史会轻松很多。

第四，冲突解决完要跑测试。cherry-pick 成功只代表补丁应用成功，不代表当前分支的业务逻辑一定正确。

第五，不要把 cherry-pick 当成长期同步分支的方式。如果你总是在两个分支之间大量 cherry-pick，通常说明分支策略需要调整。

## 总结

`git cherry-pick` 解决的是“只拿某几个提交”的问题。

它在热修复、发布分支补丁、跨分支同步小改动时非常实用。但它也会制造新的提交历史，所以使用前要确认提交是否独立，使用后要确认当前分支是否仍然正确。

记住三个常用命令就够应付大多数场景：

```sh
git cherry-pick <commit>
git cherry-pick -x <commit>
git cherry-pick --abort
```

能清楚知道自己为什么只挑这个提交，而不是合并整个分支，就说明这个场景适合使用 cherry-pick。
