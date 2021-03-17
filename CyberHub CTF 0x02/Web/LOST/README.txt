Name: LOST
Subject: weak authentication, RCE
Level: 3 
Description: you are LOST and might need to check everywhere.
Flag: CYBERHUB{Wh3r3_th3_h3ck_!_4m}

Quick solution:
check source of the page , go to the js file , after code reading you would know that credentials (uname=>IAM,pass=>LOST)
you will get alert with lo0ost.php , visit this page , it's about RCE , just put %0als-la in the string paramter to get
all files in the directory , you would find .heck , ls-la it , then u will get the .flag.php , 
cat it and flag would appear in the source of the page 
