<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Order History</title>
</head>

<body>
 <?php
 echo "<h2 align='center'>Order History for: </h2>";
echo "<table align='center' style='border: solid 1px black;'>";
echo "<tr><th>OrderId</th><th>Product Name</th><th>Item Price</th><th>Customer Name</th><th>Customer Email</th><th>Trans ID</th><th>Item Number</th><th>Quantity</th><th>Order Date</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "csillsze";
$password = "Levon252!";
$dbname = "csillsze_virtualplanet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT orderid, prodname, CONCAT('$',itemprice), custname, custemail, transactionid, itemnumber, itemqty,   date_format(orderdate,'%M %D %Y') FROM orders");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 
</body>
</html>