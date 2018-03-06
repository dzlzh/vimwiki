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
