@ECHO OFF
for /f "delims=" %%a in ('git rev-parse --abbrev-ref HEAD') do @set currentbranch=%%a
git push origin %currentbranch%