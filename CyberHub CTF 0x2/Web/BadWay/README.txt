Name: BadWay
Suject: Directory Traversal
Level: 2 
Description: I just created a new website to test my dev skills , can you make sure that there is nothing wrong.
Flag:CYBERHUB{BAD_Nginx_Config!!}


#Challenge Host: #Important#
	you have to make sure that nginx server is installed in your host , and you must change the default file in /etc/nginx/sites-enabled with the one here 
	also after changing the default file just restart nginx => sudo service nginx restart
	
	#make sure your (/var/www/html/) must contain the follwing => {BadWay/  disallow.html  script.js  style.css }



solution:
brute-force directories , you will get robots.txt with disallow flag.php.swp
if you checked this file you will be redirected to another page => access denied 
you can find a directory traversal when writing the following url : host/BadWay../BadWay/flag.php.swp
then it will give you the source of flag.php file , and you will know that it needs param (Flll4gggg=badconfigurednginxleadstoterriblethings)
after sending it you will get the flag but in comment you can view it using (view page source)

