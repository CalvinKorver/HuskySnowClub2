sudo rsync -rpltzv --exclude=db  --delete -e "ssh -i /Users/calvinkorver/.aws/hsc.pem"  /Applications/XAMPP/htdocs/HuskySnowClub2/*  ec2-user@ec2-52-41-69-135.us-west-2.compute.amazonaws.com:/var/www/html