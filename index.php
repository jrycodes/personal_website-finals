<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Personal Website</title>
	<link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" />
    
</head>
<body>
    <header>
        <div class="ul">
            <nav>
                <ul>
                    <a class="welcome" style="font-family: 'Lobster', cursive">Welcome</a>
                    <li class="li"><a href="about.php#contact">Contact</a></li>
                    <li class="li"><a href="about.php">About</a></li>
                    <li class="li"><a href="login.php">Log in</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div>
        <div class="item1">
            <h1 style="font-family: 'Lobster', cursive">Jerycho Roniel Choa</h1>
            <p>Bachelor of science in Information Technology at <br> National University Fairview</p>
        
        </div>

        <div class="grid-item2">
            <img class="mySlides" src="me.jpg"> 
            <img class="mySlides" src="me2.jpg">
            <img class="mySlides" src="me3.jpg">
            <img class="mySlides" src="me4.jpg">
            <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
        </div>
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
        var slideIndex = 1;
        showDivs(slideIndex);
    
        function plusDivs(n) {
            showDivs(slideIndex += n);
        }
    
        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) { slideIndex = 1; }
            if (n < 1) { slideIndex = x.length; }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>


</body>