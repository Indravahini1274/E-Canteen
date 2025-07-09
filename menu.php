<?php require "header.php"; ?>
<?php require "config.php"; ?>
<?php

    $hungrymenu = $conn->query("SELECT * FROM hungrymenu WHERE status = 1");
	$hungrymenu->execute();
    $allHungrymenu = $hungrymenu->fetchAll(PDO::FETCH_OBJ);

    $snackmenu = $conn->query("SELECT * FROM snackmenu WHERE status = 1");
	$snackmenu->execute();
    $allSnackmenu = $snackmenu->fetchAll(PDO::FETCH_OBJ);

    $cravemenu = $conn->query("SELECT * FROM cravemenu WHERE status = 1");
	$cravemenu->execute();
    $allCravemenu = $cravemenu->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="font-weight-bold">MENU</h1>
        </div>
    </div>
</div>

<section class="ftco-section ftco-services" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url(images/fastfood.jpg);"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">The Hungry Hub</h3>
                        <p><a href="#" class="btn btn-primary view-menu" data-target="hungry-menu">View menu</a></p>
                    </div>
                </div>      
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url(images/img_4.jpg);"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Snack Shack</h3>
                        <p><a href="#" class="btn btn-primary view-menu" data-target="snack-menu">View Menu</a></p>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url(images/image5.jpg);"></div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading">Crave Cave</h3>
                        <a href="#" class="btn btn-primary view-menu" data-target="crave-menu">View Menu</a></p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section>

<div id="hungry-menu" class="menu-items" style="display: none;">
    <div class="container">
        <div class="row">
            <?php foreach ($allHungrymenu as $hungrymenu) : ?>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center <?php echo ($hungrymenu->amount == 0) ? 'dull-item' : ''; ?>">
                    <div class="img" style="background-image: url(images/<?php echo $hungrymenu->image; ?>); width: 150px; height: 150px; background-size: cover; position: relative;">
                        <a href="#" class="btn btn-primary add-to-cart <?php echo ($hungrymenu->amount == 0) ? 'disabled' : ''; ?>" data-item-name="<?php echo $hungrymenu->name; ?>" onclick="addToCart(event)" <?php echo ($hungrymenu->amount == 0) ? 'disabled' : ''; ?> style="position: absolute; bottom: 50px; left: 150%; transform: translateX(-50%);">Add</a>
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading"><?php echo $hungrymenu->name; ?></h3>
                        <p class="description"><?php echo $hungrymenu->description; ?></p>
                        <p class="cost"><strong>₹<?php echo $hungrymenu->cost; ?></strong></p>
                    </div>
                </div>      
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="snack-menu" class="menu-items" style="display: none;">
    <div class="container">
        <div class="row">
            <?php foreach ($allSnackmenu as $snackmenu) : ?>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center <?php echo ($snackmenu->amount == 0) ? 'dull-item' : ''; ?>">
                    <div class="img" style="background-image: url(images/<?php echo $snackmenu->image; ?>); width: 150px; height: 150px; background-size: cover; position: relative;">
                    <a href="#" class="btn btn-primary add-to-cart <?php echo ($snackmenu->amount == 0) ? 'disabled' : ''; ?>" data-item-name="<?php echo $snackmenu->name; ?>" onclick="addToCart(event)" <?php echo ($snackmenu->amount == 0) ? 'disabled' : ''; ?> style="position: absolute; bottom: 50px; left: 150%; transform: translateX(-50%);">Add</a>
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading"><?php echo $snackmenu->name; ?></h3>
                        <p class="description"><?php echo $snackmenu->description; ?></p>
                        <p class="cost"><strong>₹<?php echo $snackmenu->cost; ?></strong></p>
                    </div>
                </div>      
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div id="crave-menu" class="menu-items" style="display: none;">
    <div class="container">
        <div class="row">
            <?php foreach ($allCravemenu as $cravemenu) : ?>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center <?php echo ($cravemenu->amount == 0) ? 'dull-item' : ''; ?>">
                    <div class="img" style="background-image: url(images/<?php echo $cravemenu->image; ?>); width: 150px; height: 150px; background-size: cover; position: relative;">
                        <a href="#" class="btn btn-primary add-to-cart <?php echo ($cravemenu->amount == 0) ? 'disabled' : ''; ?>" data-item-name="<?php echo $cravemenu->name; ?>" onclick="addToCart(event)" <?php echo ($cravemenu->amount == 0) ? 'disabled' : ''; ?> style="position: absolute; bottom: 50px; left: 150%; transform: translateX(-50%);">Add</a>
                    </div>
                    <div class="media-body py-4 px-3">
                        <h3 class="heading"><?php echo $cravemenu->name; ?></h3>
                        <p class="description"><?php echo $cravemenu->description; ?></p>
                        <p class="cost"><strong>₹<?php echo $cravemenu->cost; ?></strong></p>
                    </div>
                </div>      
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
function addToCart(event) {
    event.preventDefault(); 
    const itemName = event.target.getAttribute('data-item-name');
    window.location.href = `bookings.php?item_name=${encodeURIComponent(itemName)}`;
}

document.addEventListener('DOMContentLoaded', function() {
    const viewMenuLinks = document.querySelectorAll('.view-menu');
    viewMenuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const target = this.getAttribute('data-target');
            const menuItems = document.getElementById(target);
            // Hide all menu items first
            const allMenuItems = document.querySelectorAll('.menu-items');
            allMenuItems.forEach(item => {
                item.style.display = 'none';
            });
            // Then display the selected menu items
            menuItems.style.display = 'block';

            // Scroll to the top of the menu items section
            menuItems.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // Code for handling 'Add to Cart' clicks
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const addedMsg = this.parentElement.querySelector('.added-msg');
            addedMsg.style.display = 'block';
            // Hide the message after 2 seconds
            setTimeout(function() {
                addedMsg.style.display = 'none';
            }, 2000);
        });
    });
});

</script>

<?php require "footer.php"; ?>

