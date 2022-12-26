<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetBook</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
</head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ebook";   
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if($conn) {
                echo '';
            } else {
                echo 'failed';
            }
            $orderid = 0;
            $sql = 'SELECT COUNT(*) FROM getBook;';
            $retval= mysqli_query($conn, $sql);
            if (!$retval) {
                die("Could not get the data".mysqli_error($conn));
            }
            while ($row = mysqli_fetch_array($retval)){
                 $orderid = $row['COUNT(*)'] + 1;
            }
            $email = $_POST['email'];
            $address = $_POST['address'];
            $bookName = $_POST['bookName'];
            $totalprice = 0;
            if ($bookName == "Python For DataScience"){
                $totalprice += 1500 ;
            } elseif ($bookName == "An Indian Economy") {
                $totalprice += 700;
            } elseif ($bookName == "Consumer Behaviour") {
                $totalprice += 850;
            } elseif ($bookName == "General Knowledge 2017") {
                $totalprice += 250;
            } elseif ($bookName == "General Studies 2016(paper1)") {
                $totalprice += 650;
            } elseif ($bookName == "The Year Mega Book") {
                $totalprice += 1250;
            } elseif ($bookName == "Wings of Fire") {
                $totalprice += 1000;
            } elseif ($bookName == "The Z Factor") {
                $totalprice += 1000;
            } elseif ($bookName == "The Standing Gaurd") {
                $totalprice += 1000;
            } elseif ($bookName == "Pranab Mukherjee") {
                $totalprice += 1000;
            } elseif ($bookName == "M.K.Gandhi") {
                $totalprice += 1000;
            } elseif ($bookName == "Steve jobs") {
                $totalprice += 1000;
            } elseif ($bookName == "The Girl in the Spider's Web") {
                $totalprice += 1200;
            } elseif ($bookName == "LOL") {
                $totalprice += 1200;
            } elseif ($bookName == "Kane And Abel") {
                $totalprice += 1200;
            }
            else {
                $totalprice += 0;
            }
          
            // echo $price1;
            
            echo "<h3 style='margin:5%; text-align: center;'>Your Book is ".$bookName."</h3>";
            echo "<h3 style='margin:5%; text-align: center;'>Your bill is ".$totalprice."</h3>";
            echo '<h3 class="back">Purchase Successful <a href="../index.html">Home</a><br> 
                <a class="back" href="orders.html">orders</a></h3>';
            $sql = "INSERT INTO getBook(orderId, email, address, bookName, totalprice) values ($orderid,'$email', '$address', '$bookName',  '$totalprice')";
            if (mysqli_query($conn, $sql) == TRUE){
                // echo '<h3 class="back">Purchase Successful <a href="../index.html">Go back</a><br> 
                // <a class="back" href="orders.html">orders</a></h3>';
            }
            
            mysqli_close($conn);
        ?>
    </body>
</html>

<!--
        CREATE TABLE getBook (
            orderId INT PRIMARY KEY,
            email VARCHAR(50),
            address VARCHAR(255),
            bookName VARCHAR(60),
            totalprice INT,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
-->