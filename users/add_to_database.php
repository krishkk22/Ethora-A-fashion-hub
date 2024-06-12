<?php
    include 'db.php'; 

    $orderDetails = json_decode(file_get_contents('php://input'), true);

    session_start();

    $user = $_SESSION['username'];
    $sql1 = "SELECT id FROM users WHERE username = $1";
    $result = pg_query_params($con, $sql1, array($user));

    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $userId = $row['id'];

            $date = date('Y-m-d');
            foreach ($orderDetails as $order) {
                $productId = $order['product_id']; 
                $quantity = $order['quantity'];
                $subtotalAmount = $order['subtotal_amount'];
                $invoiceNumber = $order['invoice_number'];

                $sql = "INSERT INTO orders (user_id, date, subtotal_amount, invoice_number) VALUES ($1, $2, $3, $4) RETURNING id";
                $result = pg_query_params($con, $sql, array($userId, $date, $subtotalAmount, $invoiceNumber));

                if ($result) {
                    $row = pg_fetch_assoc($result);
                    $orderId = $row['id'];

                    $sqlProductOrder = "INSERT INTO product_order (product_id, order_id, quantity) VALUES ($1, $2, $3)";
                    if (!pg_query_params($con, $sqlProductOrder, array($productId, $orderId, $quantity))) {
                        echo "Error: " . pg_last_error($con);
                    }
                } else {
                    echo "Error: " . pg_last_error($con);
                }
            }
        }
    } else {
        echo "Error: " . pg_last_error($con);
    }
    pg_close($con);
?>
