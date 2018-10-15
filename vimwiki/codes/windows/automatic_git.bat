@echo off
set dd=%DATE:~0,10%
set tt=%time:~0,8%
set hour=%tt:~0,2%
echo =======================================================
echo          Starting automatic git commit push
echo =======================================================
cd D:\workspace\loanManageSystem
echo %~dp0
git pull
git status
git commit -a -m "Automatic Commit %dd:/=-% %tt%"
git push
pause
