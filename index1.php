<?php require "header.php"; ?>
<?php require "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&family=Sevillana&display=swap" rel="stylesheet">
    <style>
body, html {
    margin: -10px;
    padding: 0;
    height: 100%;
    overflow: hidden; 
}
#mydiv {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
    left: 0;
    animation-name: background-transition;
    animation-duration: 40s;
    animation-iteration-count: infinite; 
}
@keyframes background-transition {
    0% {background-image: url('images/image2.jpg');}
    25% {background-image: url('https://img.freepik.com/premium-photo/chicken-dhum-biriyani-using-jeera-rice-spices-arranged-earthen-ware_527904-513.jpg');}
    50% {background-image: url('images/image8.jpg');}
    75% {background-image: url('https://img.freepik.com/free-vector/flat-world-chocolate-day-background-with-chocolate-sweets_23-2149430827.jpg?size=626&ext=jpg&ga=GA1.1.1141335507.1710460800&semt=ais');}
    100% {background-image: url('https://png.pngtree.com/background/20230412/original/pngtree-coffee-illustration-background-border-picture-image_2396475.jpg');}
}
.text-container {
    position: absolute;
    color: white;
    font-size: 24px;
    opacity: 0;
    animation-fill-mode: forwards; 
    text-align: center; 
    display: flex;
    flex-direction: column;
    align-items: center;
}
.text-container .line {
    display: block;
    margin-bottom: 20px;
}
.button {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    font-size: 20px;
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}
.button:hover {
    background-color: rgba(0, 0, 0, 0.7);
}
#text1 {
    top: 100px;
    left: 2%; 
    animation: text-transition-1 40s infinite;
    font-size: 60px; 
    color: rgb(190, 160, 120);
    font-family: 'Briem Hand', cursive; 
    max-width: 50%; 
    text-align: left;
}
#text2 {
    top: 100px;
    left: 2%;
    animation: text-transition-2 40s infinite;
    font-size: 60px; 
    color: white;
    font-family: 'Briem Hand', cursive; 
    max-width: 50%; 
    text-align: left;
}
#text3 {
    top: 150px;
    left: 20%;
    animation: text-transition-3 40s infinite;
    font-size: 60px;
    color: rgb(123, 63, 0);
    font-family: 'Briem Hand', cursive; 
    max-width: 50%; 
    text-align: left;
}
#text4 {
    top: 50%;
    left: 50%;
    animation: text-transition-4 40s infinite;
    font-size: 70px; 
    color: rgb(165, 42, 42);
}
@keyframes text-transition-1 {
    0% {opacity: 0;}
    6%, 25% {opacity: 1;}
    26%, 100% {opacity: 0;}
}
@keyframes text-transition-2 {
    0%, 25% {opacity: 0;}
    31%, 50% {opacity: 1;}
    51%, 100% {opacity: 0;}
}
@keyframes text-transition-3 {
    0%, 50% {opacity: 0;}
    56%, 75% {opacity: 1;}
    76%, 100% {opacity: 0;}
}
@keyframes text-transition-4 {
    0%, 75% {opacity: 0;}
    81%, 100% {opacity: 1;}
}
</style>
</head>
<body>
    <div id="mydiv"></div>
    <div id="text1" class="text-container">
        Study break? <br>
        Snack break! Power up for the next round
        <a href="#" class="button">Order Now</a>
    </div>
    <div id="text2" class="text-container">
        <span class="line">Cravings calling?</span>
        <span class="line">We've got the cure.</span>
        <a href="#" class="button">Order Now</a>
    </div>
    <div id="text3" class="text-container">
        Need a chocolaty pick-me-up.
        <a href="#" class="button">Order Now</a>
    </div>
    <div id="text4" class="text-container">
        Inhale caffeine, exhale creativity
        <a href="#" class="button">Order Now</a>
    </div>
    <footer class="footer">
        <p class="copyright mb-0">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i class="fa fa-heart" aria-hidden="true"></i>
        </p>
    </footer>
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>
    <?php require "footer.php" ?>
</body>
</html>
