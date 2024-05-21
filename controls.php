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

        public function delete($product_id) {
            global $conn;

            $sql = "DELETE FROM product WHERE product_id = '$product_id'";

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


class tbl_user{
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
?>