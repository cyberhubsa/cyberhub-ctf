Name: Read
subject: RCE , LFI 
Level:4.5

Description: flag is inside , just find a way to reach there .
 
Flag: CYBERHUB{RC3_!5_H4rd_50m37im35}

solution: 
run tool to bruteforce directories , you will find robots.txt with flag file name .
go through all interesting links in the page , 
once you find policy.html and check its source , you can find a policy.php down there in the footer
just intercept the request to this page , you will find a cookie called read , if you tried LFI it , you will get message telling you it's a wrong way 
, so just send a php code inside user-agent header (<?php system('cat /etc/flag_327a6c4304ad5938eaf0efb6cc3e53dc.txt');?>)
then intercept the request again and LFI the log file of the server , for apache => read= /var/log/apache2/access.log

then you will get the flag.
