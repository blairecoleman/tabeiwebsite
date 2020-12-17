<?php
$email = $fName = $lName = $subject = $message = $organization = $consultation = $questions = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Validating Form
    $fName = filter_input(INPUT_POST, "fname");
    $lName = filter_input(INPUT_POST, "lname");
    $organization = filter_input(INPUT_POST, "orgname");
    $email = filter_input(INPUT_POST, "contactemail");
    $consultation = filter_input(INPUT_POST, "consultation");
    $questions = filter_input(INPUT_POST, "questions");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    $message = filter_input(INPUT_POST, "messageBody");


    $body = $fName . " has contacted you through your website." . $message;
    if ($consultation == TRUE){
        $subject = "TABEI:Contacting to schedule a consultation";
    }
    if($questions == TRUE){
        $subject = "TABEI:Contacting you with some questions";
    }
    if($consultation == TRUE && $questions == TRUE){
        $subject = "TABEI:Contacting to schedule a consultation and ask some questions";
    }
    if (!empty($fName)|| !empty($email) || !empty($message)){
    //Sending Messages
    $owner = "blaireacoleman.com";
    $headers1 = "From: $email \r\n";
    $headers1 .= "Reply-To: $email \r\n";
    mail($owner, $subject, $body, $headers1);
    $thankyouMessage = "<h4>Thank you for contacting us $fName, we will respond with 3-5 business days</h4>
<h5>Your Message was as follows:</h5>
<div class = formThankYouMessage>
<b><p>Your Name: $fName $lName</p></b>
<b><p>Your Email: $email</p></b>
<b><p>Subject: $subject</p></b><br>
<p>Your Message:<br> $message</p>
</div>";


//Message to Client
    $to = $email;
    $headers2 = "From: DO_NOT_REPLY@3ctrealestate.com \r\n";
    $headers2 .= "Reply-To: DO_NOT_REPLY@3ctrealestate.com \r\n";
    $thankyou = "Thank you for contacting us $fName! Your message has been received. We will be in contact within 3-5 business days.";
    $subjectLine = "THANK YOU FOR CONTACTING 3CT REAL ESTATE";
    mail($to, $subjectLine, $thankyou, $headers2);


    //show the home page again with thank you
    print <<<HERE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabei</title>
    <link rel = "stylesheet" href = "cssbasic/style.css">
    <link rel = "icon" href = "assets/fabicon2.png">
    <script src="https://kit.fontawesome.com/8ecbe21a08.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<div id = "loading"></div>
<header>
    <div class = "blockquotefeat">
        <blockquote class ="featureblockquote"> We are a brand-conscious design company
            working with organizations to
            construct a firmly established online presence
            that perfectly aligns with their brand.
        </blockquote>
    </div>
    <img class = "logo" src ="assets/rocky-mountain-671658head.jpg" alt = "">
    <h1>Tabei Design</h1>
</header>
<div>
    <nav>
        <ul class ="navstandard">
            <li><a href = "process.html">Our Process</a></li>
            <li><a href = "about.html">About Us</a></li>
            <li><a href = "blog.html">Blog</a></li>
            <li><a href = "courses.html">Courses</a></li>
            <li><a href = "portfolio.html">Our Work</a></li>
        </ul>
    </nav>
</div>

<div>
    <h2>Our Services</h2>
    <ul class = "serviceslist">
        <li class = "servicelistitem">Web Design</li>
        <li class = "servicelistitem">Web Development</li>
        <li class = "servicelistitem">Brand Development</li>
        <li class = "servicelistitem">Social Media Management</li>
        <li class = "servicelistitem">Online Course Development</li>
        <li class = "servicelistitem">Content Management Consulting</li>
        <li class = "servicelistitem">User Experience/Interface Design</li>
        <li class = "servicelistitem">Usability and Accessibility Consulitng</li>
        <li class = "servicelistitem">Graphic Design</li>
        <li class = "servicelistitem">Online Courses on Web Development</li>
    </ul>
</div>

<!-- have this appear like a fade in. add a modal for covid note-->
<div class = "secondarynav">
    <div class = "secondarynavitem">
        <a href = "process.html#WebDD"><button class = "secNavBut">Web Design and Development</button></a>

     </div>
    <div class = "secondarynavitem">
        <a href = "process.html#Brand"><button class = "secNavBut">Brand Development</button></a>

    </div>
    <div class = "secondarynavitem">
        <a href = "process.html#Courses"><button class = "secNavBut">Online Course Development</button></a>

    </div>
    <div class = "secondarynavitem">
        <a href = "process.html#Counsult"><button class = "secNavBut">Consulting Services</button></a>

    </div>
</div>
<div class = "carouselpowerpointfeat">
    <!-- Slideshow container -->
    <div class="slideshow-container">
<h2>Testimonials</h2>
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <div class = "pptcontent">
                <p>We are what we repeatedly do. Excellence then is not an act but a habit<br><i>~Aristole</i></p>
                <img class = "pptimg" src = "assets/IMG_0938.jpg" alt = "">
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <div class = "pptcontent">
                <p>Excellence is to do a common thing in an uncommon way.<br><i>~Booker T. Washington</i></p>
                <img class = "pptimg" src = "assets/IMG_1070.jpg" alt = "">
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <div class = "pptcontent">
                <p>Perfection is not attainable, but if we chase perfection, we can catch excellence
                    .<br><i>~Vince Lombardi</i></p>
                <img class = "pptimg" src = "assets/IMG_0594.jpg" alt = "">
            </div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script src = "js/autocarousel.js"></script>
</div>
<div class = "Tansection">
    <h2 id = "Contact">Contact Us</h2>
    $thankyouMessage
    <form action = "contact.php" method = post>
        <div class = "formorderhor">
        <label for = "fname">First Name:</label>
        <input type = "text" id = "fname" required>
        <label for = "lname">Last Name:</label>
            <input type = "text" id = "lname">
        </div>
       <div class = "formorderhor">
        <label for = "orgname">Organization Name:</label>
        <input type = "text" id = "orgname">
       </div>
        <div class = "formorderhor">
            <label for = "contactemail">Contact Email:</label>
            <input type = "email" id = "contactemail" required>
        </div>
        <div class = formorderhor>
            <input id = "consultation"  type ="checkbox" checked>
            <label for = "consultation">I am contacting you to schedule a free consultation meeting</label>
        </div>
        <div class = "formorderhor">
            <input id = questions type = "checkbox">
            <label for = "questions">I am contacting you with some questions</label>
        </div>
        <div class = "formorderhor">
            <label for = "messagebody">Message:</label>
            <textarea id = "messageBody"></textarea>
        </div>
        <button class = "calltoaction" type = "submit">Send</button>
    </form>
</div>
<div id = "footer"></div>
<script>
    $(document).ready(function() {
        $("#footer").load("footer.php"); //NAME OF THE PAGE TO ADD
    });
</script>
<script>
    $(window).load(function() {
        $('#loading').hide();
    });
</script>
</body>
</html>
HERE;

}}
else{
    if(empty($fName) && empty($email) && empty($message)){
        $errorMessage = "First Name, Email and Message is required";
    }
    if (empty($fName)){
        $errorMessage = "First Name is required";
    }
    if (empty($email)){
        $errorMessage = "Your Email is required";
    }
    if (empty($message)){
        $errorMessage = "Please write your message";
    }
    print<<<HERE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabei</title>
    <link rel = "stylesheet" href = "cssbasic/style.css">
    <link rel = "icon" href = "assets/fabicon2.png">
    <script src="https://kit.fontawesome.com/8ecbe21a08.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<div id = "loading"></div>
<header>
    <div class = "blockquotefeat">
        <blockquote class ="featureblockquote"> We are a brand-conscious design company
            working with organizations to
            construct a firmly established online presence
            that perfectly aligns with their brand.
        </blockquote>
    </div>
    <img class = "logo" src ="assets/rocky-mountain-671658head.jpg" alt = "">
    <h1>Tabei Design</h1>
</header>
<div>
    <nav>
        <ul class ="navstandard">
            <li><a href = "process.html">Our Process</a></li>
            <li><a href = "about.html">About Us</a></li>
            <li><a href = "blog.html">Blog</a></li>
            <li><a href = "courses.html">Courses</a></li>
            <li><a href = "portfolio.html">Our Work</a></li>
        </ul>
    </nav>
</div>

<div>
    <h2>Our Services</h2>
    <ul class = "serviceslist">
        <li class = "servicelistitem">Web Design</li>
        <li class = "servicelistitem">Web Development</li>
        <li class = "servicelistitem">Brand Development</li>
        <li class = "servicelistitem">Social Media Management</li>
        <li class = "servicelistitem">Online Course Development</li>
        <li class = "servicelistitem">Content Management Consulting</li>
        <li class = "servicelistitem">User Experience/Interface Design</li>
        <li class = "servicelistitem">Usability and Accessibility Consulitng</li>
        <li class = "servicelistitem">Graphic Design</li>
        <li class = "servicelistitem">Online Courses on Web Development</li>
    </ul>
</div>

<!-- have this appear like a fade in. add a modal for covid note-->
<div class = "secondarynav">
    <div class = "secondarynavitem">
        <a href = "process.html#WebDD"><button class = "secNavBut">Web Design and Development</button></a>

     </div>
    <div class = "secondarynavitem">
        <a href = "process.html#Brand"><button class = "secNavBut">Brand Development</button></a>

    </div>
    <div class = "secondarynavitem">
        <a href = "process.html#Courses"><button class = "secNavBut">Online Course Development</button></a>

    </div>
    <div class = "secondarynavitem">
        <a href = "process.html#Counsult"><button class = "secNavBut">Consulting Services</button></a>

    </div>
</div>
<div class = "carouselpowerpointfeat">
    <!-- Slideshow container -->
    <div class="slideshow-container">
<h2>Testimonials</h2>
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <div class = "pptcontent">
                <p>We are what we repeatedly do. Excellence then is not an act but a habit<br><i>~Aristole</i></p>
                <img class = "pptimg" src = "assets/IMG_0938.jpg" alt = "">
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <div class = "pptcontent">
                <p>Excellence is to do a common thing in an uncommon way.<br><i>~Booker T. Washington</i></p>
                <img class = "pptimg" src = "assets/IMG_1070.jpg" alt = "">
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <div class = "pptcontent">
                <p>Perfection is not attainable, but if we chase perfection, we can catch excellence
                    .<br><i>~Vince Lombardi</i></p>
                <img class = "pptimg" src = "assets/IMG_0594.jpg" alt = "">
            </div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script src = "js/autocarousel.js"></script>
</div>
<div class = "Tansection">
    <h2 id = "Contact">Contact Us</h2>
    $errorMessage
    <form action = "contact.php" method = post>
        <div class = "formorderhor">
        <label for = "fname">First Name:</label>
        <input type = "text" id = "fname" required>
        <label for = "lname">Last Name:</label>
            <input type = "text" id = "lname">
        </div>
       <div class = "formorderhor">
        <label for = "orgname">Organization Name:</label>
        <input type = "text" id = "orgname">
       </div>
        <div class = "formorderhor">
            <label for = "contactemail">Contact Email:</label>
            <input type = "email" id = "contactemail" required>
        </div>
        <div class = formorderhor>
            <input id = "consultation"  type ="checkbox" checked>
            <label for = "consultation">I am contacting you to schedule a free consultation meeting</label>
        </div>
        <div class = "formorderhor">
            <input id = questions type = "checkbox">
            <label for = "questions">I am contacting you with some questions</label>
        </div>
        <div class = "formorderhor">
            <label for = "messagebody">Message:</label>
            <textarea id = "messageBody"></textarea>
        </div>
        <button class = "calltoaction" type = "submit">Send</button>
    </form>
</div>
<div id = "footer"></div>
<script>
    $(document).ready(function() {
        $("#footer").load("footer.php"); //NAME OF THE PAGE TO ADD
    });
</script>
<script>
    $(window).load(function() {
        $('#loading').hide();
    });
</script>
</body>
</html>
HERE;


}

