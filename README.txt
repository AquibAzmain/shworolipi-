WHAT IS SHWOROLIPI
Shworolipi is a music streaming web application. People can avail this application to search and play Bengali songs. They can also manage their own account and make several playlists with their favorite songs.


HOW TO INSTALL 
1. Download all 6 folders, paste it in the server root directory (e.g. htdocs/ for xampp , Do not change the path of any file)
2. Import 'shworolipi.sql' database (e.g. localhost/phpmyadmin/)
3. Put your email address and password in 5 files for email configuration -
	(1)shworolipi/index.php (line-14)
	(2)shworolipi/registration.php (line-75)
	(3)shworolipi/forgotPassword.php (line-32)
	(4)shworolipiAdmin/deleteMember.php (line-40)
	(5)memberDashboard/index.php (line-33)
4. Put your domain ip/name in 2 files-
	(1)shworolipi/index.php (line-61)
	(2)showorolipi/fogotPassword.php (line-22)


HOW TO USE (admin)
1. Open a browser
2. Type the url 'yourdomain/shworolipiAdmin/'


HOW TO USE (user)
1. Open a browser
2. Type the url 'yourdomain/shworolipi/'

Notes : Sample 47 songs have been uploaded. Admin can delete and upload songs.
