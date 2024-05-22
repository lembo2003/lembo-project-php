<?php 
    include("connect.php");

    class tbl_product {
        public function insert($product_name, $quantity, $picture, $category, $date, $price, $description) {
            global $conn;

            $sql = "INSERT INTO product(product_name, quantity, picture, category, date, price, description) 
                    VALUES('$product_name', '$quantity', '$picture', '$category', '$date', '$price', '$description')";

            return mysqli_query($conn, $sql);
        }

        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM product";

            return mysqli_query($conn, $sql);
        }

        public function select_product($id) {
            global $conn;

            $sql = "SELECT * FROM product WHERE product_id = '$id'";

            return mysqli_query($conn, $sql);
        }

        public function select_top($num) {
            global $conn;

            $sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT $num";

            return mysqli_query($conn, $sql);
        }

        public function select_out_of_stock() {
            global $conn;

            $sql = "SELECT * FROM product WHERE quantity = 0";

            return mysqli_query($conn, $sql);
        }

        public function delete($product_id) {
            global $conn;

            $sql = "DELETE FROM product WHERE product_id = '$product_id'";

            return mysqli_query($conn, $sql);
        }

        public function delete_by_category($category_name) {
            global $conn;

            $sql = "DELETE FROM product WHERE category = '$category_name'";

            return mysqli_query($conn, $sql);
        }

        public function update($product_id, $product_name, $quantity, $picture, $category, $date, $price, $description) {
            global $conn;

            $sql = "UPDATE product  
                    SET product_name = '$product_name', 
                        quantity = '$quantity', 
                        picture = '$picture', 
                        category = '$category', 
                        date = '$date', 
                        price = '$price', 
                        description = '$description'  
                    WHERE product_id = '$product_id'";

            return mysqli_query($conn, $sql);
        }
    }
    
    class tbl_category {
        public function insert($category_name, $category_description) {
            global $conn;

            $sql = "INSERT INTO category(category_name, category_description) 
                    VALUES('$category_name', '$category_description')";

            return mysqli_query($conn, $sql);
        }

        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM category";

            return mysqli_query($conn, $sql);
        } 

        public function select_category($id) {
            global $conn;

            $sql = "SELECT * FROM category WHERE category_id = '$id'";

            return mysqli_query($conn, $sql);
        }
        
        public function delete($id) {
            global $conn;

            $sql = "DELETE FROM category WHERE category_id = '$id'";

            return mysqli_query($conn, $sql);
        }

        public function update($id, $category_name, $category_description) {
            global $conn;

            $sql = "UPDATE category  
                    SET category_name = '$category_name', 
                        category_description = '$category_description' 
                    WHERE category_id = '$id'";

            return mysqli_query($conn, $sql);
        }
    }


    class tbl_user {
        public function insert($username, $password, $gender, $address, $hobby, $avatar_path, $email) {
            global $conn;

            $sql = "INSERT INTO user(username, password, gender, address, hobby, avatar_path, email) 
                    VALUES('$username','$password','$gender','$address','$hobby','$avatar_path','$email')";

            return mysqli_query($conn, $sql);
        }

        public function select_user($username) {
            global $conn;

            $sql = "SELECT * FROM user WHERE username='$username'";

            return mysqli_query($conn, $sql);
        }
    }
    class tbl_user_order {
        public function select_last_order() {
            global $conn;

            $sql = "SELECT * FROM user_order ORDER BY order_id DESC LIMIT 1";

            return mysqli_query($conn, $sql);
        }

        public function insert($orders, $user_id, $into_money) {
            global $conn;

            $today_date = date("Y-m-d");
            $sql = "INSERT INTO user_order(user_id, order_date, into_money) VALUES('$user_id', '$today_date', '$into_money')";

            if(mysqli_query($conn, $sql)) {
                $sql = "SELECT order_id FROM user_order ORDER BY order_id DESC LIMIT 1";
                $order_id = mysqli_query($conn, $sql)->fetch_assoc()["order_id"];

                foreach($orders as $order) {
                    try {
                        $product_id = $order["product"]["product_id"];
                        $quantity = $order["product"]["quantity"];
                        $number_buy = $order["number_buy"];

                        $sql = "INSERT INTO order_details VALUES ('$order_id','$product_id','$number_buy')";

                        mysqli_query($conn, $sql);

                        $sql = "UPDATE product SET quantity = $quantity - $number_buy WHERE product_id = '$product_id'";

                        mysqli_query($conn, $sql);
                    }
                    catch(Exception $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }

                return true;
            }

            return false;
        }

        public function select_order_products($order_id) {
            global $conn;

            $sql = "SELECT product.*, order_details.number_buy FROM product INNER JOIN order_details ON product.product_id = order_details.product_id 
                    WHERE order_id = $order_id";

            return mysqli_query($conn, $sql);
        }

        public function revenue_date($from, $to) {
            global $conn;

            $sql = "SELECT SUM(into_money) AS revenue FROM user_order WHERE order_date BETWEEN '$from' AND '$to'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) != 0) {
                return $result->fetch_assoc()["revenue"];
            }

            return 0;
        }

        public function select_all() {
            global $conn;

            $sql = "SELECT order_id, username, order_date, into_money, status FROM user_order INNER JOIN user ON user_order.user_id = user.user_id";

            return mysqli_query($conn, $sql);
        }

        public function select_order($id) {
            global $conn;

            $sql = "SELECT order_id, username, order_date, into_money, status FROM user_order INNER JOIN user ON user_order.user_id = user.user_id WHERE order_id = '$id'";

            return mysqli_query($conn, $sql);
        }

        public function update_status($id, $status) {
            global $conn;

            $sql = "UPDATE user_order SET status = '$status' WHERE order_id = '$id'";

            return mysqli_query($conn, $sql);
        }
    }
