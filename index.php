<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Freelance Web Developer | Sineth Sandaruwan
        </title>
        <link rel="stylesheet" href="src/css/styles.css">
        <link rel="icon" type="image/x-icon" href="src/img/logo.png">
    </head>
        <body>
            <?php
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $validated = true ;

                $fnameErr = $lnameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";

                $fname = $lname = $email = $phone =  $subject = $message = "";


               if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["fname"])) {
                        $fnameErr = "First Name is required";
                        $validated = false;
                    } else {
                        $fname = test_input($_POST["fname"]);
                       
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                            $fnameErr = "Only letters and white space allowed";
                            $validated = false;
                        }
                    }
                    if (empty($_POST["lname"])) {
                        $lnameErr = "Last Name is required";
                        $validated = false;
                    } else {
                        $lname = test_input($_POST["lname"]);
                       
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                            $lnameErr = "Only letters and white space allowed";
                            $validated = false;
                        }
                    }
                    
                    if (empty($_POST["email"])) {
                        $emailErr = "Email is required";
                        $validated = false;
                    } else {
                        $email = test_input($_POST["email"]);
                       
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Invalid email format";
                            $validated = false;
                        }
                    }

                    if (empty($_POST["phone"])) {
                        $phoneErr = "Phone Number is required";
                        $validated = false;
                    } else {
                        $phone = test_input($_POST["phone"]);
                       
                        if (!preg_match('/^[0-9]*$/', $phone)) {
                            $phoneErr = "Invalid phone number";
                            $validated = false;
                        }
                    }
                    
                    if (empty($_POST["subject"])) {
                        $subjectErr = "Subject is required";
                        $validated = false;
                    } else {
                        $sublect = test_input($_POST["subject"]);
                       
                    }
                    if (empty($_POST["message"])) {
                        $messageErr = "Message is required";
                        $validated = false;
                    } else {
                        $message = test_input($_POST["message"]);
                       
                    }

                    if($validated){
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $db = "db_portfolio";

                        $conn = new mysqli($host,$username,$password,$db);
                        if($conn->connect_error){
                            echo "$conn->connect_error";
                            echo '<script>alert("Error Occured...")</script>';
                            echo '<script type="text/javascript">
                            window.location = "index.php"
                            </script>';
                        } else {
                            $stmt = $conn->prepare("insert into tbl_contacts(fname,lname, email, phone,subject,message) values(?, ?, ?, ?,?,?)");
                            $stmt->bind_param("ssssss", $fname, $lname, $email, $phone,$subject,$message);
                            $execval = $stmt->execute();
                            echo '<script>alert("Thank you for contacting us..")</script>';
                            echo '<script type="text/javascript">
                            window.location = "index.php"
                            </script>';
                            $stmt->close();
                            $conn->close();
                    }
                    }else{
                        echo '<script type="text/javascript">
                        window.location = "index.php#contactForm"
                        </script>';
                    }
                
                }
                
                
                
        ?>
        <img src="src/img/arrow-up.png" alt="" id="btnTop" class="btn-top">
        <div class="side-nav">
            <a href="#contactForm"><img src="src/img/phone.png" alt=""></a>
            <a href="#recentProjects"><img src="src/img/history.png" alt=""></a>
            <a href="#about"><img src="src/img/info.png" alt=""></a>
        </div>
        <section class="section-nav-bar">
            <ul>
                <li style="float:left"><img class="nav-bar-logo" src="src/img/logo.png" alt="logo"></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#experiences">EXPERIENCE</a></li>
                <li><a href="#recentProjects">PROJECTS</a></li>
                <li><a href="#feedbacks">FEEDBACKS</a></li>
                <li><a href="#contactForm">CONTACT</a></li>
                
                </ul>
        </section>

		<section  class="section-main">
            <img src="src/img/main-perso.png" alt="image">
            <div>
                <h1>Full Stack<br>Web Developer</h1>
                <p id="mainP"></p>
                <button class="btn-2" id="btnContact">Get in Touch</button>
            </div>
            
		</section>

        <section id="about" class="section-about">
            <h2 class="header">About</h2>
            <p>I'm Sineth. A designer, maker and problem solver. 
                <br>
                <br>
                I have been designing with computers since the day I first opened Microsoft Paint. 
                The cusp of art and technology has always fascinated me and I've never been afraid to just jump in and give it a go, whether it's Paint, Photoshop, Sketch or CSS. 
                Fast forward to 2023 and I have tried it all, from Digital Campaign Design and Flash Actionscript to Web Design, Animation, HTML/CSS/Webflow, Product Design and Product Management. 
                Everything I have done, small or big, has been a vital stepping stone for where I am today.
                <br>
                <br>
                What excites me most about working in software development is being able to design and create things that have purpose and solve real problems. 
                Leaning into customer research and insight, finding the right problems to solve, delivering that value as quickly as possible, learning from it and then iterating and improving that value over time is the key to great design.
            </p>
        </section>

        <section id="experiences" class="section-experiences">
            <h2 class="header">Experiences and Skills</h2>
            <p>The main area of expertise is front end development (client side of the web).

                HTML, CSS, JS, building small and medium web applications with Vue or React, custom plugins, features, animations, and coding interactive layouts. I have also full-stack developer experience with one of the most popular open source CMS on the web - WordPress</p>
            <div class="icon-gallery">
                <img src="src/img/binary.png" alt="">
                <img src="src/img/code.png" alt="">
                <img src="src/img/coding.png" alt="">
                <img src="src/img/html.png" alt="">
                <img src="src/img/java-script.png" alt="">
                <img src="src/img/mysql.png" alt="">
                <img src="src/img/typescript.png" alt="">
                <img src="src/img/c-logo.png" alt="">
            </div>
        </section>

        <section id="recentProjects" class="section-recent">
            <h2 class="header">Recent Projects</h2>
            <div class="recent-container bg-1">
                <img src="src/img/project_3.png" alt="project">
                <h3>LUMOR</h3>
                <p>Full marketing website with custom animations for Mr.Perera. Built with React & Gatsby.</p>
                <h4>Development Tools</h4>
                <ul>
                    <li>React</li>
                    <li>Styled-Components</li>
                    <li>Vimeo API</li>
                    <li>Gatsby</li>
                    <li>Hooks</li>
                </ul>
                <button class="btn-1">VIEW PROJECT</button>
            </div>
            <div class="recent-container bg-2">
                <img src="src/img/project_1.png" alt="project">
                <h3>FILERER</h3>
                <p>A new website & lead generation tool for Arun D Company. Built with Gatsby & DatoCMS.</p>
                <h4>Development Tools</h4>
                <ul>
                    <li>React</li>
                    <li>Netlify</li>
                    <li>Gatsby</li>
                    <li>Netlify</li>
                    <li>DatoCMS</li>
                </ul>
                <button class="btn-1">VIEW PROJECT</button>
            </div>
            <div class="recent-container bg-3">
                <img src="src/img/project_2.png" alt="project">
                <h3>ATVILE</h3>
                <p>An light yet animation-heavy landing page experience for AVILE PVT Ltd.</p>
                <h4>Development Tools</h4>
                <ul>
                    <li>Netlify</li>
                    <li>React</li>
                    <li>Gatsby</li>
                    <li>Netlify</li>
                    <li>Mailgun</li>
                </ul>
                <button class="btn-1">VIEW PROJECT</button>
            </div>
        </section>

        <section id="slideshow" class="section-slideshow">
            <div class="mySlides fade">
                <img src="src/img/web-1.jpeg">
            </div>
              
            <div class="mySlides fade">
                <img src="src/img/web-2.jpg">
            </div>
              
            <div class="mySlides fade">
                <img src="src/img/web-3.jpg">
            </div>
              
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        </section>

        <section id="feedbacks" class="section-testomonial">
            <h2 class="header">What People Say</h2>
            <div class="testomonial-container">
                <img src="src/img/person_1.jpg" alt="person">
                <p class="content"><span>"</span> Sineth built and designed my blog for me about a year ago and I couldn't be happier with his work. He is so easy to work with, professional and always there when I need him. My business has increased immensely since hiring Chase and I will continue working with him and recommending him to my colleagues for years to come!<span>"</span></span></p>
                <p class="name">Saman Fernando</p>
                
            </div>
            <div class="testomonial-container">
                <img src="src/img/person_2.jpg" alt="person">
                <p class="content"><span>"</span>We started looking for a freelance web developer last year and were fortunate to find Sineth. He's been easy to work with since the very beginning: organized, responsive, and helpful. And always on time.<span>"</span></span></p>
                <p class="name">Vimasha Kumari</p>
                
            </div>
            <div class="testomonial-container">
                <img src="src/img/person_3.jpg" alt="person">
                <p class="content"><span>"</span>Sineth has been the freelance web developer for our feature film from the pitch stage, through production, to the marketing/distribution stage. Whenever a change has to be made, he always jumps on it. His design is fantastic and user-friendly and he is extremely collaborative. I won't use anyone else moving forward. WORK WITH HIM.<span>"</span></span></p>
                <p class="name">Nuwan Pathirana</p>
                
            </div>
        </section>

        <section id="contactForm" class="section-contact" >
            <h2 class="header">Let's Build a Thing</h2>
            <form id="formContact" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-line">
                    <input type="text" id="fname" name="fname" placeholder="First Name">
                    <input type="text" id="lname" name="lname" placeholder="Last Name">
                    
                </div>
                <div class="form-line">
                    <table>
                        <tr>
                            <td><span class="error"><?php echo $fnameErr;?></span></td>
                            <td><span class="error"><?php echo $lnameErr;?></span></td>
                        </tr>
                    </table>
                </div>
                <div class="form-line">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="tel" id="phone" name="phone" placeholder="Phone">
                </div>
                <div class="form-line">
                <table>
                        <tr>
                            <td><span class="error"><?php echo $emailErr;?></span></td>
                            <td><span class="error"><?php echo $phoneErr;?></span></span></td>
                        </tr>
                    </table>
                    
                </div>
                <input type="text" id="subject" name="subject" placeholder="Subject">
                <span class="error"><?php echo $subjectErr;?></span>
                <textarea id="message" name="message" placeholder="Message"></textarea>
                <span class="error"><?php echo $messageErr;?></span>
                <input id="btnnn" type="submit" name="submit "value="Submit">
                
            </form>
        </section>

        <footer >
            <p>A Frontend focused Web Developer building the Frontend of Websites and Web Applications that leads to the success of the overall product.</p>
            <h4>CONTACT US</h4>
            <div class="social-media-icons">
                <img src="src/img/facebook.png" alt="facebook">
                <img src="src/img/instagram.png" alt="instagram">
                <img src="src/img/google-plus.png" alt="google-plus">
                <img src="src/img/linkedin.png" alt="linkedin">
            </div>
            <p>Copyright 2023 - Sineth Sandaruwan</p>

            <script src="src/script/script.js"></script>
        </footer>
    </body>
</html>
