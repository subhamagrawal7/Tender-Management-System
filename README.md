### To run the project
1. Clone the project
2. Import the database using tms.sql file
3. Login into the admin by using username - admin and password - admin@123
4. Create or login into existing user
5. Admin can create tender on the 'Generate Tender' Page on admin dashboard
6. User can view tenders in 'Tenders' Page
7. User can bid any tender and view the biddings on 'Biddings' Page
8. Admin can view the biddings on 'Biddings' Page
9. Admin can confirm the biddings on 'Confirm Biddings' Page
10. **Change the following settings to enable sending email**
    - Locate the php.ini file in XAMPP/php/ folder
    - Search for mail function
    - Make sure SMTP=localhost and smtp_port=25 lines are uncommented
    - Add auth_username and auth_password from which you want to send mail
    - Restart Apache server
    - Enable Less Secure App Access in Google account by going to Google Account Settings page
11. Check for the mail received once bidding confirmed
12. Admin and user can check the 'Confirm Biddings' Page to know the details of confirmed biddings


---
<p align="center" style="font-size:13px">
  Made with ❤ by <a style="font-size:13px" href="https://github.com/subhamagrawal7" style="text-decoration:none">Subham Agrawal</a>
</p>
