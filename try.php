<?php require "header.php"; ?>
<?php require "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
    /* Your existing CSS */
    @font-face {
      font-family: 'Sevillana';
      font-style: normal;
      font-weight: 400;
      src: local('Sevillana Regular'), local('Sevillana-Regular'), url(https://fonts.gstatic.com/s/sevillana/v10/6xKmdmZ9WUPzUKiCWVqFvYkCsKcQ0XLSw1YV0hGLuaw.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden; /* Prevent scrolling */
    }
    #mydiv {
        width: 100%;
        height: 100%;
        background-image: url('images/image1.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        position: absolute;
        top: 0;
        left: 0;
        animation-name: background-transition;
        animation-duration: 40s;
        animation-iteration-count: infinite; /* Repeat the animation indefinitely */
    }
    @keyframes background-transition {
        0% {background-image: url('images/image1.jpeg');}
        25% {background-image: url('https://img.freepik.com/premium-photo/chicken-dhum-biriyani-using-jeera-rice-spices-arranged-earthen-ware_527904-513.jpg');}
        50% {background-image: url('https://img.freepik.com/free-photo/top-close-up-view-vegetables-tomatoes-with-pedicels-garlic-bell-peppers-lemon-oil-onion_140725-72203.jpg?size=626&ext=jpg&ga=GA1.1.1224184972.1715472000&semt=ais_user');}
        75% {background-image: url('https://img.freepik.com/free-vector/flat-world-chocolate-day-background-with-chocolate-sweets_23-2149430827.jpg?size=626&ext=jpg&ga=GA1.1.1141335507.1710460800&semt=ais');}
        100% {background-image: url('https://png.pngtree.com/background/20230412/original/pngtree-coffee-illustration-background-border-picture-image_2396475.jpg');}
    }
    .text-container {
        position: absolute;
        color: white;
        font-size: 24px;
        opacity: 0; /* Initially hidden */
        animation-fill-mode: forwards; /* Keep the last keyframe state */
    }
    #text1 {top: 50%; left: 50%; animation: text-transition-1 40s infinite;}
    #text2 {top: 50%; left: 50%; animation: text-transition-2 40s infinite;}
    #text3 {top: 50%; left: 50%; animation: text-transition-3 40s infinite; font-family: 'Sevillana', cursive;}
    #text4 {top: 50%; left: 50%; animation: text-transition-4 40s infinite;}

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
    <div id="text1">Text for Transition 1</div>
    <div id="text2">Text for Transition 2</div>
    <div id="text3">Text for Transition 3</div>
    <div id="text4">Text for Transition 4</div>
    <div style="margin-top: 100px;">
        <h1 style="color: white; margin-right: 100px;">Skip the hunger, not the flavor. Order now and dine in delight!</h1>
        <p style="color: white; margin-right: 100px;"><a href="menu.php" class="btn btn-primary">Order Now</a></p>
    </div>
    <footer class="footer">
        <p class="copyright mb-0">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i class="fa fa-heart" aria-hidden="true"></i>
        </p>
    </footer>
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    <?php require "footer.php" ?>
</body>
</html>


<div style="margin-top: 100px;">



color: rgb(165, 42, 42)
;