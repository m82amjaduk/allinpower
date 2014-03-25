# ../ServerConf/gitPush.sh WorkInProgress

MESSAGE=$1;

echo $MESSAGE;

git status
git add .
git commit -m "$MESSAGE"
git push

echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> $MESSAGE  ";
git status


# Need to add each file separately when added...
