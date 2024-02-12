<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


Feedback System

Welcome to our Feedback System! This application allows multiple users to register, login, and provide feedback. Users can rate their experience using a 1 to 5-star rating system along with their comments. The application uses authentication to ensure secure access to user-specific features. Users can view their dashboard upon logging in, where they can see existing feedback and add new feedback. Users can only delete their own feedback. Additionally, users have the option to logout when they are done using the application.

Features:
<ul>

    User Authentication: Users can register and login to access the feedback system.
    Dashboard: Upon login, users are directed to their dashboard, where they can view existing feedback and add new feedback.
    Add Feedback: Users can add feedback by providing a rating from 1 to 5 stars along with their comments.
    Delete Feedback: Users can delete their own feedback entries.
    Logout: Users can securely logout from the application when they are done.
</ul>







Getting Started:

Clone the Repository: Clone this repository to your local machine using the following command: ( git clone <repository-url>  ).

Install Dependencies: Navigate to the project directory and install PHP dependencies using Composer:

<ul> <p>cd feedback-system</p><p>
composer install</p> </ul>

</ul>
 

 Set Up Environment Variables: Copy the .env.example file to .env and configure environment variables such as database connection details.
 
<ul>
 Generate Application Key: Generate a new application key using the following command: ( php artisan key:generate ).

 Migrate Database: Run database migrations to create necessary tables: ( php artisan migrate
 </ul>
 )

