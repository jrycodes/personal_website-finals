<?php
$hostname = "localhost";
$dbuser = "id21973899_choa";
$dbPassword = "@Admin123";
$dbname = "id21973899_choa";
$conn = mysqli_connect($hostname, $dbuser, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $messages = $_POST["messages"];

    // Insert data into the database
    $sql = "INSERT INTO messages (name, email, messages) VALUES ('$name', '$email', '$messages')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Personal Website</title>
	<link rel="stylesheet" href="about.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" />
    
</head>
<body>
<header>
        <div class="ul">
            <nav>
                <ul>
                    <a class="welcome" style="font-family: 'Lobster', cursive">Ola! </a>
                    <li class="li"><a href="index.php">Home</a></li>
                    <li class="li"><a href="about.php#contact">Contact</a></li>
                    <li class="li"><a href="#About">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="about-div">
        <h1>Jerycho Roniel Choa</h1>
        <p style="text-align: justify;">A college student studying Information Technology at the National University signifies a dynamic blend of dedication and distinct passions. Jerycho, born on September 30, 2003, in Caloocan, Philippines, balances the demands of coding and algorithms with a dedication to overall well-being. His routine comprises a fitness regimen for physical resilience, a culinary flair for artistic expression, Netflix binge-watching for mental calm, and his love for photography. In the complex field of information technology studies, Jerycho exemplifies the diverse nature of college students juggling academic and personal interests.</p>
    </div>
    <div>
        <img class="me5" src="me5.jpg">
    </div>

    <section id="skills" class="skills">
        <h2 style="text-align: center">Skills</h2>
        <div class="skill-item">
            <div class="skill-bar-container">
                <span class="skill-label">Python:</span>
                <div class="skill-bar">
                    <div class="skill-progress" style="width: 50%;"></div>
                    <div class="percentage-label">50%</div>
                </div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-bar-container">
                <span class="skill-label">Java:</span>
                <div class="skill-bar">
                    <div class="skill-progress" style="width: 20%;"></div>
                    <div class="percentage-label">20%</div>
                </div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-bar-container">
                <span class="skill-label">HTML:</span>
                <div class="skill-bar">
                    <div class="skill-progress" style="width: 70%;"></div>
                    <div class="percentage-label">70%</div>
                </div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-bar-container">
                <span class="skill-label">CSS:</span>
                <div class="skill-bar">
                    <div class="skill-progress" style="width: 65%;"></div>
                    <div class="percentage-label">65%</div>
                </div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-bar-container">
                <span class="skill-label">JavaScript:</span>
                <div class="skill-bar">
                    <div class="skill-progress" style="width: 30%;"></div>
                    <div class="percentage-label">30%</div>
                </div>
            </div>
        </div>
    
        <div class="skill-item">
            <div class="skill-bar-container">
                <span class="skill-label">MySQL:</span>
                <div class="skill-bar">
                    <div class="skill-progress" style="width: 35%;"></div>
                    <div class="percentage-label">35%</div>
                </div>
            </div>
        </div>
</section>

    <div class="resume">
        <p style="text-align: center; padding: 5px; color: white">Download and check my resume by clicking the button</p>
		<a href="Choa-Resume.pdf" download="Choa-Resume.pdf">
			<button type="button">Download PDF</button>
		</a>
    </div>

    <div class="contact" id="contact">
        <h1>contact</h1>
        <form id="contact-form" action="about.php" method="POST">
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="Name" required="" style="margin-bottom:10px; width: 30%;">
            </div>
            <div class="col-md-6 col-sm-6">
                <input type="email" class="form-control" name="email" placeholder="Email" required="" style="margin-bottom:10px; width: 30%;">
            </div>
            <div class="col-md-12 col-sm-12">
                <textarea class="form-control" rows="5" name="messages" placeholder="Message" required="" style="margin-bottom:10px; width: 30%;"></textarea>
            </div>
            <div class="col-md-offset-8 col-md-4 col-sm-offset-6 col-sm-6">
                <button id="submit" type="submit" class="form-control" name="submit">Send Message</button>
            </div>
        </form>
    </div>

    
    <footer>
        <p class="rights">2024 My Personal Website. All rights reserved.</p>
        <a href="https://www.facebook.com/jrych0" target="_blank">
            <img src="icons8-facebook-64.png" alt="Facebook Logo" width="30" height="30">
        </a>
        <a href="https://www.instagram.com/jrych_/" target="_blank">
            <img src="icons8-instagram-64.png" alt="instagram Logo" width="30" height="30">
        </a>
        <a href="https://www.tiktok.com/@jrych_" target="_blank">
            <img src="icons8-tiktok-64.png" alt="TikTok Logo" width="30" height="30">
        </a>
    </footer>
    <script>
        document.getElementById("contact-form").addEventListener("submit", function(event) {
            // Display alert when the form is submitted
            alert("Your message has been sent. ");
        });
</script>
   
</body>