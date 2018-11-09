@echo off
set dd=%DATE:~0,10%
set tt=%time:~0,8%
set hour=%tt:~0,2%
set workspace=D:\workspace\loanManageSystem
echo =======================================================
echo          Starting automatic git commit push
echo =======================================================
cd %workspace%
echo %~dp0
git pull
git status
git add %workspace%
git commit -m "Automatic Commit %dd:/=-% %tt%"
git push
pause
