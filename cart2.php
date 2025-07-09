require "header.php";
require "config.php";

$totalCost = 0;

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

// Get the currently logged-in user's username
$username = $_SESSION['username'];

// Check if the delete button is clicked
if (isset($_POST['delete_item']) && isset($_POST['item_id'])) {
    // Get the item ID to delete
    $item_id = $_POST['item_id'];

    // Prepare and execute SQL to delete the item from the orders table
    $delete_query = $conn->prepare("DELETE FROM orders WHERE id = :item_id");
    $delete_query->bindParam(':item_id', $item_id);
    $delete_query->execute();

    // Redirect back to the same page to refresh the order details
    header("Location: cart.php");
    exit;
}

if (isset($_POST['confirm_order'])) {
    // Define order status
    $status = "pending";

    // Retrieve orders for the currently logged-in user from the 'orders' table
    $orders_query = $conn->prepare("SELECT * FROM orders WHERE username = :username");
    $orders_query->bindParam(':username', $username);
    $orders_query->execute();

    // Calculate total cost and insert each order into the 'ordered' table
    while ($order = $orders_query->fetch(PDO::FETCH_ASSOC)) {
        // Calculate total cost
        $totalCost += ($order['cost'] * $order['quantity']);

        $insert_query = $conn->prepare("INSERT INTO ordered (username, phone_number, item_name, quantity, status, payment, created_at, stall) VALUES (:username, :phone_number, :item_name, :quantity, :status, :payment, :created_at, :stall)");
        $insert_query->execute([
            ":username" => $order['username'],
            ":phone_number" => $order['phone_number'],
            ":item_name" => $order['item_name'],
            ":quantity" => $order['quantity'],
            ":status" => $status,
            ":payment" => $order['cost'] * $order['quantity'], // Set payment to the cost of the order
            ":created_at" => $order['created_at'],
            ":stall" => $order['stall']
        ]);

        // Update the respective menu table based on the stall and item name
        $menu_table = $order['stall']; // Assuming the stall name is the same as the table name
        if ($menu_table !== "") {
            // Update the amount in the respective menu table
            $update_query = $conn->prepare("UPDATE $menu_table SET amount = amount - :quantity WHERE name = :item_name");
            $update_query->execute([
                ":quantity" => $order['quantity'],
                ":item_name" => $order['item_name']
            ]);
        }
    }

    // Delete all orders for the currently logged-in user from the 'orders' table after confirming the order
    $delete_query = $conn->prepare("DELETE FROM orders WHERE username = :username");
    $delete_query->bindParam(':username', $username);
    $delete_query->execute();

    // Store total cost in session for payment page
    $_SESSION['totalCost'] = $totalCost;

    // Redirect to the payment page
    header("Location: pay.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Order Details</h2>
        <div class="row">
            <?php
            // Retrieve order details for the currently logged-in user from the "orders" table
            $orders_query = $conn->prepare("SELECT id, item_name, quantity, cost FROM orders WHERE username = :username");
            $orders_query->bindParam(':username', $username);
            $orders_query->execute();
            while ($order = $orders_query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $order['item_name']; ?></h5>
                            <p class="card-text">Quantity: <?php echo $order['quantity']; ?></p>
                            <p class="card-text">Cost: <?php echo $order['cost'] * $order['quantity']; ?></p>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $order['id']; ?>">
                                <button type="submit" name="delete_item" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                // Add the cost of this item to the total cost
                $totalCost += ($order['cost'] * $order['quantity']);
            }
            ?>
        </div>

        <!-- Display total cost -->
        <div class="row mt-4">
            <div class="col-md-4 offset-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Cost</h5>
                        <p class="card-text">Total Cost: <?php echo $totalCost; ?></p>
                        <!-- Add the form with the button to confirm order and pay now -->
                        <form action="cart.php" method="POST">
                            <button type="submit" name="confirm_order" class="btn btn-primary btn-block">Confirm Order and Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
