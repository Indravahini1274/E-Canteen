<?php require "header.php"; ?>
<?php require "config.php"; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>
                <div class="card-body">
                    <div id="paypal-button-container" class="paypal-container" style="position: relative;">
                        <div class="paypal-loader" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; border: 3px solid #f3f3f3; border-top: 3px solid #3498db; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                    </div>
                    <div id="confirmation-message" style="display: none; text-align: center; margin-top: 20px;">
                        <p style="font-size: 24px;">Order confirmed. You can collect it in a few minutes.</p>
                        <img src="images/tick_symbol.png" alt="Tick Symbol" class="tick-symbol" style="width: 50px; height: 50px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_SESSION["totalCost"])) {
                        echo "<p>Total Cost: $" . $_SESSION["totalCost"] . "</p>";
                    } else {
                        echo "<p>Total Cost (Debugging): $0</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AS9JikETFMASkJmuMeRFFk-4O3Rhh8DVZD56XSTPG8yeZxg9Q7pa-59OoxVG9S5HGVRCfo8eB8qVlnpc&currency=USD"></script>
<script>
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo isset($_SESSION["totalCost"]) ? $_SESSION["totalCost"] : 0; ?>'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            document.getElementById('paypal-button-container').style.display = 'none';
            document.getElementById('confirmation-message').style.display = 'block';

            // Add the PHP code to update the status to "completed" in the "ordered" table
            <?php
            // Update the status to "completed" in the "ordered" table
            $update_status_query = $conn->prepare("UPDATE ordered SET status = 'completed' WHERE username = :username AND status = 'pending'");
            $update_status_query->bindParam(':username', $_SESSION['username']);
            $update_status_query->execute();
            ?>
        }
    }).render('#paypal-button-container');
</script>

<?php require "footer.php"; ?>