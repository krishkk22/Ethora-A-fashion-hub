<?php
    include 'db.php'; 

    // Check if data is received via POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get data sent from AJAX
        $data = json_decode(file_get_contents("php://input"), true);

        // Check if data is successfully decoded
        if ($data !== null) {
            $currentDate = date('Y-m-d');

            // Insert data into database
            foreach ($data as $item) {
                $title = pg_escape_string($item["title"]);
                $price = $item["price"];
                $quantity = $item["quantity"];
                $total = $item["total"];
                $sql = "INSERT INTO cart (title, price, quantity, total, date_created) VALUES ('$title', '$price', '$quantity', '$total', '$currentDate')";
                $result = pg_query($con, $sql);
                if (!$result) {
                    echo "Error: " . pg_last_error($con);
                }
            }

            // Close connection
            pg_close($con);
        } else {
            echo "Error decoding JSON: " . json_last_error_msg();
        }
    } else {
        echo "Invalid request method";
    }
?>
