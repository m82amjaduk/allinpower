MESSAGE=$1;

git status
git add .
git commit -m "$MESSAGE"

git push

git status
