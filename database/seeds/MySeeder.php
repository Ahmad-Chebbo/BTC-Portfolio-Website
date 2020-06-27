<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MySeeder extends Seeder
{
    public function run()
    {
    // Education
        App\Education::create([
            'title' => 'Lebanese Baccalaureate Degree (BACCII)',
            'place_name' => 'High Modern School',
            'desc' => 'test',
            'to' => '2015-09-01',
        ]);
        App\Education::create([
            'title' => 'BS in Computer Science',
            'place_name' => 'Lebanese International University',
            'desc' => 'test',
            'from' => '2017-09-01',
            'to' => '2020-09-01',
        ]);

    // Experience
        App\Experience::create([
            'title' => 'Sales Man',
            'place' => 'CompuWorld Company',
            'description' => '<p>
                            <!--StartFragment-->Duis non volutpat arcu, eu mollis tellus. Sed finibus aliquam neque sit
                            amet sodales.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla maximus pellentes que velit,
                            quis consequat nulla effi citur at. Maecenas sed massa tristique.Duis non volutpat arcu,
                            eu mollis tellus. Sed finibus aliquam neque sit amet sodales. <!--EndFragment-->
                            <br></p>',
            'from' => '2017-09-01',
            'to' => '2018-11-15',
        ]);
    

    // Skill
        App\Skill::create([
            'skill' => 'HTML5 & CSS3',
            'percent' => '85',
        ]);
        App\Skill::create([
            'skill' => 'Laravel',
            'percent' => '85',
        ]);
        App\Skill::create([
            'skill' => 'Angular',
            'percent' => '55',
        ]);
        App\Skill::create([
            'skill' => 'SQL&MySQL',
            'percent' => '86',
        ]);
        App\Skill::create([
            'skill' => 'ASP.Net',
            'percent' => '76',
        ]);
        App\Skill::create([
            'skill' => 'Python',
            'percent' => '42',
        ]);
        App\Skill::create([
            'skill' => 'Java ',
            'percent' => '76',
        ]);
        App\Skill::create([
            'skill' => 'C#',
            'percent' => '67',
        ]);

    // Categories
        $categories = ['Web','Mobile','Robotic'];
        foreach ($categories as $category) {
            App\WSCategory::Create([
                'name' => $category,
            ]);
        }

    // Titles
        $titles = ['Web Developer','Mobile Developer','Penetration Tester'];
        foreach ($titles as $title) {
            App\Title::Create([
                'title' => $title,
            ]);
        }

    // Projects
        App\WSProject::create([
            'title' => 'LIU Clubs Community',
            'description' => 'LIU Community Clubs is a system to unite the various club throughout the university, in order to regulate and manage the clubs’ activities such as fundraising, musical, welcoming students and more.<br><br>Technology used : Angular , Firebase , Bootstrap<br><br>Other version developed with : Asp.Net, SQL, Bootstrap',
            'category_id' => '1',
            'image' => '/uploads/projects/1592626658combine_images.jpg',
            'url' => 'https://liuclubs.now.sh/',
            'from' => '2019-07-01',
            'to' => '2020-09-01',
        ]);

        App\WSProject::create([
            'title' => 'BTC Blog',
            'description' => 'BTC Blog is a modern design for any blog. You can boost your business using BTC Blog script. It will give interactive any kind of product presentation for yourself. <br><br>Technology used : Laravel , MySQL and bootstrap<br><br>Additional info : You can add and delete and download E-Books<br><br>Note : The website is under construction and the demo in the link below is an old version.',
            'category_id' => '1',
            'image' => '/uploads/projects/1592628404combine_images (1).jpg',
            'url' => 'https://liucsblog.000webhostapp.com/',
            'from' => '2020-04-01',
        ]);

        App\WSProject::create([
            'title' => 'BTC Real estate',
            'description' => 'BTC Real estate   made simple is a lightning fast and light weight website. BTC Real estate agents work with property buyers or sellers and help them navigate the complex nature of the property market.
                                <br><br>
                                Features : 
                                <br> <br>
                                &#8226; &#160;   View and manage all your agents with their listed properties.<br> 
                                &#8226; &#160;  View the detail of a property. <br>
                                &#8226; &#160;   Enable/disable agent signup from the admin panel.<br> 
                                &#8226; &#160;   Responsive design<br> 
                                &#8226; &#160;   Custom Property Search<br>
                                &#8226; &#160;    Build in email system<br>
                                &#8226; &#160;     Ability to manage properties<br>
                                &#8226; &#160;    Agents can easily register to the website.<br> 
                                &#8226; &#160;    Easily add social icons Links Using admin panel.<br>
                                &#8226; &#160;    Easily manage notification email using admin panel.<br> 
                                <br>Technology used : Asp.Net , SQL and bootstrap',
            'category_id' => '1',
            'image' => '/uploads/projects/1592629491combine_images (2).jpg',
            'url' => '',
            'from' => '2019-03-21',
            'to' => '2019-05-27',
        ]);

        App\WSProject::create([
            'title' => 'Library Management System',
            'description' => 'LIU Library management system is a project as it’s name suggests, is based on a library system or in other words is semi-automatic system. This system is divided into three parts, librarian website system, student self check-out system and a mobile application. In addition to the three parts, there’s a robotics part included. <br><br>
                            Developers : Ahmad Shebbo, Hussein Safa, Izzat Ala Eddine. <br><br>
                            Technology used : Laravel , MySQL , NodeMCU , Java , RFID . <br><br>',
            'category_id' => '1',
            'image' => '/uploads/projects/1592628545combine_images.jpg',
            'url' => '',
            'from' => '2020-02-14',
            'to' => '2020-05-04',
        ]);

        App\WSProject::create([
            'title' => 'BTC Portfolio',
            'description' => 'BTC Portfolio is a responsive Personal Portfolio Laravel Script It’s suitable for Resume or Portfolio websites. This Script can be used for personal portfolio, artist portfolio and freelancer portfolio and coder, company, web developer. It’s comfortable with Laptops, tablets, mobiles or any device. BTC Portfolio is 100% responsive and supports the most popular browsers. All codes are clean and nicely commented.
                            <br><br>
                            Features :
                            <br><br>
                            &#8226; &#160;  Fully Dynamic <br>
                            &#8226; &#160;  Customizable Color  and Media Easily<br>
                            &#8226; &#160;  Enable and Disable any Section With One Click<br>
                            &#8226; &#160;  User Friendly<br>
                            &#8226; &#160;  Custom Css or Js<br>
                            &#8226; &#160;  Laravel 7.x<br>',
            'category_id' => '1',
            'image' => '/uploads/projects/1592725818-combine_images.jpg',
            'url' => '',
            'from' => '2020-06-16',
            'to' => '2020-06-21',
        ]);

        App\WSProject::create([
            'title' => 'Bookarilla',
            'description' => "Do you think it's a shame that most books are only read once and then
                                just set dust for an eternity in a bookshelf?
                                Are you someone who reads many books but would rather not know how much they cost over time?
                                Bookarilla offers the solution to exactly these problems.<br><br>
                                With this app you can easily share your book collection  and exchange them with other users.
                                <br><br>
                                Developers : Ahmad Shebbo and Hussein Safa. <br><br>
                                Technology used : Java using Android Studio and php API .",
            'category_id' => '2',
            'image' => '/uploads/projects/1592749511-combine_images.jpg',
            'url' => '',
            'from' => '2019-11-01',
            'to' => '2019-12-01',
        ]);

        App\WSProject::create([
            'title' => 'Library Management System Application',
            'description' => "LIU Library management system is a project as it’s name suggests, is based on a library system or in other words is semi-automatic system. This system is divided into three parts, librarian website system, student self check-out system and a mobile application. In addition to the three parts, there’s a robotics part included.<br>
                                The student scan his id cart using the QR Code scanner on his phone to access his profile and see all available books and his borrowed books.<br><br>
                                Developers : Ahmad Shebbo, Hussein Safa, Izzat Ala Eddine.<br><br>
                                Technology used : Java , Laravel API , MySQL .<br><br>",
            'category_id' => '2',
            'image' => '/uploads/projects/1592752573-photo_2020-06-21_18-15-38.jpg',
            'url' => '',
            'from' => '2019-02-01',
            'to' => '2019-05-01',
        ]);

        App\WSProject::create([
            'title' => 'Laser Security System',
            'description' => "Our laser security system is designed in microcontroller based platform. Because microcontroller now brings a modern era to develop electronics project using a few component. Also we can develop this project and can collect data for future analysis. Here i have used Arduino Uno R3 for this process. Arduino is now a popular microcontroller platform in the world. If you have a basic abc knowledge on programming you can make different types interesting project using this board. One of the best example of this is our arduino laser security system.<br><br>
                                Components : <br><br>
                                &#8226; &#160;  Laser<br>
                                &#8226; &#160;  Heat Sensor<br>
                                &#8226; &#160;  Gaz Sensor<br>
                                &#8226; &#160;  Piezo<br>
                                &#8226; &#160;  LED <br>
                                &#8226; &#160;  LED Screen <br>
                                &#8226; &#160;  Bluetooth Reciever <br>",
            'category_id' => '3',
            'image' => '/uploads/projects/1592755328-combine_images (1).jpg',
            'url' => '',
            'from' => '2019-11-01',
            'to' => '2019-11-05',
        ]);

    
    }
}
