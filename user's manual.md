**FROM ZERO TO HERO
INSTALLATION GUIDE** 

**VMachine Installation**  

To install **Hyper-V**, the virtualization platform provided by Microsoft, you can follow these steps:    

Note: Hyper-V is available only in Windows 10 Pro, Enterprise, and Education editions.  

1.Check System Requirements:  

  Ensure that your system meets the minimum requirements for Hyper-V:  

  a.64-bit processor with Second Level Address Translation (SLAT) support.  
  b.4 GB of RAM or more.  
  c.BIOS-level hardware virtualization support enabled in the BIOS settings.  
  d.Sufficient free disk space.  


2.Enable Virtualization in BIOS:  
  Before proceeding, make sure that hardware virtualization is enabled in your computer's BIOS. The exact steps to enable virtualization vary depending on your computer's manufacturer and BIOS version. Refer to your computer's documentation for instructions.  

3.Open Control Panel:  
  Click on the "Start" button, type "Control Panel" in the search bar, and open the Control Panel application.  

4.Turn Windows Features On or Off:  
  In the Control Panel, select "Programs" or "Programs and Features," then click on "Turn Windows features on or off" from the left-hand side panel.  

5.Enable Hyper-V:  
  In the Windows Features dialog box, locate "Hyper-V" and check the box next to it. Ensure that all sub-options under Hyper-V are selected as well, if desired.  

6.Optional Features (Recommended):  
  Expand the "Hyper-V" option to reveal additional features that you can enable, such as "Hyper-V Management Tools," "Hyper-V Platform," and "Hyper-V Hypervisor." It is recommended to enable these additional features for a complete Hyper-V installation.  

7.Install Hyper-V:  
  After selecting all the desired Hyper-V features, click on the "OK" or "Apply" button to start the installation process. Windows might need to download additional files, so make sure you have an active internet connection.  

8.Restart Your Computer:  
  Once the installation is complete, you will be prompted to restart your computer. Save any ongoing work and click "Restart" to finish the installation.  

9.Verify Hyper-V Installation:  
  After your computer restarts, Hyper-V should be installed and ready to use. You can access Hyper-V Manager by searching for "Hyper-V Manager" in the Start menu or by launching it from the Administrative Tools in the Control Panel.  

  That's it! You have successfully installed Hyper-V on your Windows system. You can now create and manage virtual machines using Hyper-V Manager.  




**Ubuntu Installation**

To install **Ubuntu** in Hyper-V, follow these steps:  

1.Download Ubuntu ISO:  
  Visit the official Ubuntu website (https://ubuntu.com/) and download the ISO file for the version of Ubuntu you want to install. Choose the appropriate architecture (32-bit or 64-bit) based on your system's capabilities.  

2.Open Hyper-V Manager:  
  Press the Windows key, type "Hyper-V Manager," and open the Hyper-V Manager application.  

3.Create a New Virtual Machine:  
  In Hyper-V Manager, click on "New" in the right-hand panel to create a new virtual machine.  

4.Configure Virtual Machine Settings:  
  Provide a name for the virtual machine and choose a location to store the virtual machine files. Select the generation of the virtual machine (Generation 1 or Generation 2). For Ubuntu, Generation 2 is recommended if your system supports it. Click "Next" to continue.  

5.Allocate Memory:  
1Specify the amount of memory (RAM) to allocate to the virtual machine. The recommended minimum is 2 GB, but you can allocate more if your system has sufficient resources. Click "Next."  

6.Configure Networking:  
  Choose a network connection type for the virtual machine. You can select either "Default Switch" or a specific network adapter configured on your host machine. Click "Next."  

7.Create a Virtual Hard Disk:  
  Select "Create a virtual hard disk" and choose a size for the virtual hard disk. The default size is 127 GB, but you can adjust it based on your needs. Ensure the "Install an operating system from a bootable image file" option is checked, and click "Finish."  

8.Connect the Ubuntu ISO:  
  In the Hyper-V Manager, right-click on the newly created virtual machine and select "Settings." Under the "Media" section, select "DVD Drive," then click on the "Image file (.iso)" option and browse to the location where you saved the downloaded Ubuntu ISO file. Click "Apply" and then "OK."  

9.Install Ubuntu:  
  Start the virtual machine by right-clicking on it and selecting "Start." The virtual machine will boot from the Ubuntu ISO. Follow the on-screen instructions to install Ubuntu, such as selecting the language, keyboard layout, and installation type. You can choose to install Ubuntu alongside Windows or customize the partitioning as per your requirements.  

10.Complete the Installation:  
   Once the installation process is complete, the virtual machine will restart. Remove the installation media (ISO) from the virtual machine by going back to the virtual machine's settings and removing the ISO file from the DVD Drive. Start the virtual machine again, and Ubuntu should boot into the installed environment.  

   That's it! You have successfully installed Ubuntu in Hyper-V. You can now use Ubuntu within the virtual machine environment.  





**MySql Installation**  
  
To install **MySQL** on Ubuntu running in Hyper-V, you can follow these steps:  

1.Start Ubuntu:  
  Launch Hyper-V Manager, start your Ubuntu virtual machine, and log in to the Ubuntu system.  

2.Update System Packages:  
  Open a terminal window (Ctrl+Alt+T) and run the following command to update the system's package list and upgrade existing packages:  

  sudo apt update  
  sudo apt upgrade  

3.Install MySQL:  
  Run the following command to install the MySQL server package:  

  sudo apt install mysql-server  

4.Secure MySQL Installation:  
  After the installation is complete, run the following command to launch the MySQL security script that will help secure your MySQL installation:  

  sudo mysql_secure_installation  

  The script will prompt you to configure the security options, including setting the root password, removing anonymous users, disabling remote root login, and removing the test database. Follow the prompts and provide the requested information.  

5.Verify MySQL Installation:  
  Once the installation and configuration are complete, you can verify that MySQL is running by checking its status using the following command:  

  sudo systemctl status mysql  

  If MySQL is running, you should see an active (running) status message.  

6.Test MySQL:  
  You can test MySQL by logging into the MySQL server using the following command:  

  sudo mysql -u root -p  

  Enter the root password you set during the secure installation step. If you can successfully log in, you will be presented with the MySQL prompt.  

  You can now start using MySQL on your Ubuntu virtual machine in Hyper-V.  

  Remember to take appropriate security measures, such as setting strong passwords and configuring firewall rules, to protect your MySQL installation.  





**PHP Installation**  
To install **PHP**on Ubuntu running in Hyper-V, you can follow these steps:  

1.Start Ubuntu:  
  Launch Hyper-V Manager, start your Ubuntu virtual machine, and log in to the Ubuntu system.  

2.Update System Packages:  
  Open a terminal window (Ctrl+Alt+T) and update the system's package list and upgrade existing packages by running the following command:  

  sudo apt update  
  sudo apt upgrade  

3.Install PHP:  
  Run the following command to install PHP and some commonly used extensions:  

  sudo apt install php libapache2-mod-php php-mysql  

4.Verify PHP Installation:  
  After the installation is complete, you can verify that PHP is installed by checking its version using the following command:  

  php -v  
  This command will display the installed PHP version and other related information.  

5.Configure PHP (Optional):  
  By default, PHP is configured to work with Apache web server. However, you can adjust PHP settings according to your requirements. The configuration file for PHP is located at   

  /etc/php/{PHP_VERSION}/apache2/php.ini.   

  Edit this file using a text editor of your choice, for example:  

  bash  

  sudo nano /etc/php/{PHP_VERSION}/apache2/php.ini  
  Make the necessary changes, such as adjusting memory limits or enabling extensions, if needed.  

6.Restart Apache2:  
  After making changes to the PHP configuration, restart the Apache web server for the changes to take effect by running the following command:  
  sudo systemctl restart apache2  

7.Test PHP:  
  You can test your PHP installation by creating a PHP file and accessing it through a web browser.  

  Create a new PHP file using a text editor, for example:  
  sudo nano /var/www/html/info.php  

  Add the following line to the file:  

  <?php phpinfo(); ?>  

  Save the file and exit the text editor.  

  Open a web browser on your local machine and enter the following URL, replacing VM_IP_ADDRESS with the IP address of your Ubuntu virtual machine:  

  arduino  
  http://VM_IP_ADDRESS/info.php  

  If PHP is configured correctly, you should see a page with detailed information about your PHP installation.  

  That's it! You have successfully installed PHP on Ubuntu in Hyper-V. You can now start developing and running PHP applications on your Ubuntu virtual machine.  





**Apache2 Installation**  
To install **Apache2** on Ubuntu running in Hyper-V, you can follow these steps:  

1. Start Ubuntu:  
   Launch Hyper-V Manager, start your Ubuntu virtual machine, and log in to the Ubuntu system.  

2.Update System Packages:  
  Open a terminal window (Ctrl+Alt+T) and update the system's package list and upgrade existing packages by running the following command:  

  sudo apt update  
  sudo apt upgrade  

3.Install Apache2:  
  Run the following command to install Apache2:  

  sudo apt install apache2  

4.Verify Apache Installation:  
  After the installation is complete, you can verify that Apache2 is installed by checking its status using the following command:  

  sudo systemctl status apache2  

  If Apache2 is running, you should see an active (running) status message.  

5.Configure Firewall:  
  If you have a firewall enabled, you need to allow incoming HTTP (port 80) and HTTPS (port 443) traffic to access the Apache web server. Run the following commands to enable the necessary firewall rules:  

  sudo ufw allow 'Apache2'  
  sudo ufw reload  

6.Test Apache2:  
  Open a web browser on your local machine and enter the following URL, replacing VM_IP_ADDRESS with the IP address of your Ubuntu virtual machine:  

  http://VM_IP_ADDRESS/ or localhost  
  If Apache2 is running correctly, you should see the default Apache2 Ubuntu default page.  


7.Customize Apache Configuration (Optional):  
  If you need to customize the Apache2 configuration, the main configuration file is located at /etc/apache2/apache2.conf. You can edit this file using a text editor of your choice, for example:  

  sudo nano /etc/apache2/apache2.conf  
  Make the necessary changes, such as adjusting server settings or adding virtual hosts.  

8.Restart Apache:  
  After making changes to the Apache2 configuration, restart the Apache web server for the changes to take effect by running the following command:  

  sudo systemctl restart apache2  

  That's it! You have successfully installed and configured Apache2 on Ubuntu in Hyper-V. You can now host websites and web applications using the Apache web server on your Ubuntu virtual machine.  





To install and configure our **open source project** on Ubuntu running in Hyper-V with MySQL, PHP, and Apache2, you can follow these general steps:  

1.Install MySQL, PHP, and Apache2:  
  Follow the instructions provided earlier to install MySQL, PHP, and Apache2 on your Ubuntu virtual machine in Hyper-V.  

2.Create a Database:  
  Launch MySQL and create a new database for your project. You can use a MySQL management tool like phpMyAdmin or the command-line interface (CLI) to create the database.  

  For example, using the MySQL CLI, you can run the following commands to create a new database:  

  mysql -u root -p  

  CREATE DATABASE project_database;  

3.Download the Project Files:  
  Download the project files, including impl.css, impl.js, main.php, and project_des, to your Ubuntu virtual machine. You can use various methods such as cloning a Git repository or downloading a zip file.  

4.Move the Project Files:  
  Move the project files to the appropriate directory where Apache2 serves web content. By default, the web root directory is /var/www/html/. Use the following command to move the files:  

  sudo mv impl.css impl.js main.php project_des /var/www/html/  

5.Set Permissions:  
  Set the appropriate permissions on the project files so that Apache2 can access them. Run the following command to change ownership and permissions:  

  sudo chown -R www-data:www-data /var/www/html/  
  sudo chmod -R 755 /var/www/html/  

6.Configure Apache2:  
 If necessary, configure Apache2 to enable any required modules or customize settings for your project. The main Apache2 configuration file is located at /etc/apache2/apache2.conf. You can use a text editor to make changes, such as enabling modules or setting virtual hosts.  

7.Restart Apache2:  
  After making any configuration changes, restart Apache2 for the changes to take effect:  

  sudo systemctl restart apache2  

8.Access the Project:  
Open a web browser on your local machine and enter the following URL, replacing VM_IP_ADDRESS with the IP address of your Ubuntu virtual machine:  

http://VM_IP_ADDRESS/ or localhost  

If everything is set up correctly, you should see the project being displayed in the browser.  
Remember to review the documentation or instructions provided with the open source project for any specific installation or configuration steps it may require.  





**Setup for Webpage Installation**  
1.Go to https://github.com/jyz523/Open-Source-Project/tree/main click in TTRPG website folder.  

2.Click **main.php**  
  a.Copy and Paste the code  
  b.There is 3 part you need to change by yourself   
    (line  19-21 and line 64-66 and line 100-102)  
    $host = "IP address or localhost";  
    $username = "mysql username";  
    $password = "mysql password";  

3.Set up **character_type database** ( being used in line 19-21 of main.php)  
  a.Follow  the code that is in signup  

4.Set up **Armor database** being (used  in line 64-66 and line 100-102 of main.php)  
  a.Follow  the code that is in signup  

5.Click  **get_health_points.php**   
  a.Copy and Paste the code  
  b.There is 1 part you need to change by yourself   
    (line  2-4)  
    $host = "IP address or localhost";  
    $username = "mysql username";  
    $password = "mysql password";  

6.Click **get_health_points_by_level.php**  
  a.Copy and Paste the code  
  b.There is 1 part you need to change by yourself   
    (line  2-4)  
    $host = "IP address or localhost";  
    $username = "mysql username";  
    $password = "mysql password";  

7.Click **impl.css**  
  a.Copy and Paste the code  

8.Click **impl.js**  
  a.Copy and Paste the code  

9.Set up **signup database** (being used in line 6-8 of signup.php)  
  a.Follow  the code that is in signup  

10.Click **signup.php**  
   a.Copy and Paste the code  
   b.There is 1  part you need to change by yourself   
   (line  6-8)  
   $host = "IP address or localhost";  
   $username = "mysql username";  
   $password = "mysql password";  
   c.At line 32 echo '<script>window.location.href = "http:// IP  address or localhost/";</script>'; redirect back to index.html  

11.Click **login.php**  
   a.Copy and Paste the code  
   b.There is 1  part you need to change by yourself   
   (line  3-5)  
   $host = "IP address or localhost";  
   $username = "mysql username";  
   $password = "mysql password";  
   c.At line 33  echo "<script>alert('Login successful!'); window.location.href = 'http:// IP address or localhost/main.php';</script>";  
   //you need to change the IP address or localhost into the one you are using redirect back to main.php//  
   At line 37 echo "<script>alert('Invalid username or password.'); window.location.href = 'http:// IP address or localhost /';</script>";  
   //you need to change the IP address or localhost into the one you are using redirect back to index.html//  
   At line 42 echo "<script>alert('Invalid username or password.'); window.location.href = 'http:// IP address or localhost/';</script>";  
   //you need to change the IP address or localhost into the one you are using redirect back to index.html//  

12.Click **index.html**  
   a.At line 91 //form action="http:// IP address or localhost/Forget%20Password_feature.php"//  
   //you need to change the IP address or localhost into the one you are using redirect back to Forget_Password_feature.php//  

13.Download **back.jpg**  
   a.This is used as the background of the index.html  
   b.Make sure the pic is named as back.jpg, which is used  in index.html line 7  

14.Click **connection.php**  
   a.Copy and Paste the code  
   b.There is 1  part you need to change by yourself   
   (line  4-6)  
   $host = "IP address or localhost";  
   $username = "mysql username";  
   $password = "mysql password";  

15.Click **Forget Password_feature.php**  
   a.Copy and Paste the code  
   b.At line 72 //a href="http:// IP Address or localhost/">Go back</a//    
   //you need to change the IP address or localhost into the one you are using redirect back to index.html//  

16.Click **function.php**  
   a.Copy and Paste the code  
   b.There is 1  part you need to change by yourself   
   (line  38-40)  
   $host = "IP address or localhost";  
   $username = "mysql username";  
   $password = "mysql password";  
