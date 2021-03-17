Name: Is it basic
Subject: Data exposure , File upload , RCE
Level: 3
Description : sometimes you might need to create a new way to flag.

Flag: CYBERHUB{}

#Host Tips :
  - create TMP folder in /var/www/html , give it Write & excute permission
  - flag in /etc/flag






#solution : 

	click login , you will get login form , run dirb to get all files , you will find Readme file , it has md5 hashed credentials , decode it (user:admin,pass:admin)
	login and you will get upload form without submit button , you can remove the hidden attribute from HTML source , you will notice that upload form got a name zipfile 
	which will guide you to upload only zip files , try to upload one you will get a message tells you there is no such file in that dir
	and if you checked the source again you will notice a comment tells you flag in /etc/flag
	just make a symlink file and zip it to give u the flag
	
	=>ln -s /etc/flag flag
	#zip it 
	=>zip --symlinks flag.zip flag
