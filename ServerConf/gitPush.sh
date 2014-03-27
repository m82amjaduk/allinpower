# ../ServerConf/gitPush.sh WorkInProgress

MESSAGE=$1;

echo $MESSAGE;

git status
echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Sending Code To Remote ";
git add .
git commit -a -m "$MESSAGE"
git push origin

echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> $MESSAGE  ";
echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> New Status ";
git status


# Need to add each file separately when added...
