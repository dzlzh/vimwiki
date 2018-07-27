# Git 技巧

## 关闭Issue

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

## upstream master

```
git remote add --track master upstream git://github.com/upstreamname/projectname.git
 
git fetch upstream
 
git merge upstream/master
```

## 安全回滚远程分支

```
# 查看历史版本
git log
# 签出历史版本
git checkout -b old hash
# 假合并 master
git merge -s ours master
# push 到远程
git push origin old:master
```
