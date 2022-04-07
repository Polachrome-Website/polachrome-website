<?php
    include "db.php";

    // $input = $_POST['search'];
    // $input = preg_replace("#[^0-9a-z]#i","",$input);

    if(isset($_POST['submit-search'])){
        $input = $_POST['search-txt'];

        $sql = "SELECT * from products WHERE prodName LIKE '{$input}%'";

        $result = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($result);

        if($count == 0){
            echo "walang products";
        }
    }
?>

