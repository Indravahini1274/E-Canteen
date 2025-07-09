<?php
require "header.php";
require "config.php";

function getItemDetails($item_name, $conn) {
    $stmt = $conn->prepare("SELECT cost, 'hungrymenu' as menu FROM hungrymenu WHERE name = :item_name");
    $stmt->bindParam(':item_name', $item_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // If cost is found in the hungrymenu, return it along with the menu name
    if ($row && isset($row['cost'])) {
        return array('cost' => $row['cost'], 'menu' => $row['menu']);
    } else {
        // If cost is not found in the hungrymenu, try the snackmenu
        $stmt = $conn->prepare("SELECT cost, 'snackmenu' as menu FROM snackmenu WHERE name = :item_name");
        $stmt->bindParam(':item_name', $item_name);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if cost is found in the snackmenu
        if ($row && isset($row['cost'])) {
            return array('cost' => $row['cost'], 'menu' => $row['menu']);
        } else {
            // If cost is not found in both menus, return 0 or any default value you prefer
            return array('cost' => 0, 'menu' => ''); // Return 0 cost and empty menu
        }
    }
}

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $user_query = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $user_query->bindParam(':id', $user_id);
    $user_query->execute();
    $singleUser = $user_query->fetch(PDO::FETCH_OBJ);

    if (isset($_POST['submit']) || isset($_POST['add_item'])) {
        // Check if any required fields are empty
        if (empty($_POST['item_name']) || empty($_POST['quantity'])) {
            echo "<script>alert('One or more input fields are empty')</script>";
        } else {
            $username = $singleUser->username;
            $phone_number = $singleUser->phone_number;
            $item_name = $_POST['item_name'];
            $quantity = $_POST['quantity'];
            $status = "pending";

            // Get item details including cost and menu name
            $itemDetails = getItemDetails($item_name, $conn);
            $cost = $itemDetails['cost'];
            $menu = $itemDetails['menu'];

            $booking = $conn->prepare("INSERT INTO orders (username, phone_number, item_name, quantity, cost, status, payment, created_at, stall) VALUES (:username, :phone_number, :item_name, :quantity, :cost, :status, :payment, NOW(), :stall)");
            $booking->execute([
                ":username" => $username,
                ":phone_number" => $phone_number,
                ":item_name" => $item_name,
                ":quantity" => $quantity,
                ":cost" => $cost,
                ":status" => $status,
                ":payment" => 0, // Assuming payment is not retrieved correctly
                ":stall" => $menu // Set the stall name based on the menu where the item is found
            ]);

            // Redirect to the appropriate page after adding the order
            if (isset($_POST['submit'])) {
                header("Location: cart.php");
            } elseif (isset($_POST['add_item'])) {
                header("Location: menu.php");
            }
            exit; // Stop further execution
        }
    }
}
?>

<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APPURL; ?>/images/<?php echo $singleUser->image; ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form action="bookings.php" method="POST" class="appointment-form" style="margin-top: -568px;">
                    <h3 class="mb-3">Place Order</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $singleUser->username; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="<?php echo $singleUser->phone_number; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="item_name" class="form-control" placeholder="Item Name" value="<?php echo isset($_GET['item_name']) ? htmlspecialchars($_GET['item_name']) : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Order now" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Add a button to submit the form and add item -->
                            <input type="submit" name="add_item" value="Add Item" class="btn btn-primary py-3 px-4">
                            <!-- Add the hidden input field for the menu -->
                            <input type="hidden" name="menu" value="hungrymenu">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require "footer.php";
?>
