# Git 配置

- `git config --global user.name 'dzlzh'`
- `git config --global user.email 'dzlzh@null.net'`
- `git config --global alias.lg "log --color --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit"`
- `git config --global core.ignorecase false`
- `git config --global push.default 'current'`
  - `nothing` - push 操作无效，除非显式指定远程分支
  - `current` - push 当前分支到远程同名分支，如果远程同名分支不存在则自动创建同名分支
  - `upstream` - push 当前分支到它的 upstream 分支上（这一项其实用于经常从本地分支 push/pull 到同一远程仓库的情景，这种模式叫做 central workflow）
  - `simple` - simple 和 upstream 是相似的，只有一点不同，simple 必须保证本地分支和它的远程 upstream 分支同名，否则会拒绝 push 操作
  - `matching` - push 所有本地和远程两端都存在的同名分支
- `git config --global core.autocrlf input`
  - `true` - 提交时转换为LF，检出时转换为CRLF
  - `input` - 提交时转换为LF，检出时不转换
  - `false` - 提交检出均不转换
- `git config --global core.safecrlf true`
  - `true` - 拒绝提交包含混合换行符的文件
  - `false` - 允许提交包含混合换行符的文件
  - `warn` - 提交包含混合换行符的文件时给出警告