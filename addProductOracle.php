<?php


if(isset($_POST['type']))
{
require_once("dbconnect1.php");

// $record = array("Medicare", "Lahore Pharmass", "024");

// echo "I like " . $record[0] . ", " . $record[1] . " and " . $record[2] . ".";

 
$open = fopen('input_data.txt','r');
$count = 1;
while (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
	list($prodName,$company,$distID) = $explodeLine;


	$my_query = "INSERT INTO product (prodName, company, distID) VALUES ('$prodName','$company', '$distID')";
mysqli_query($con, $my_query);

$query1 = "SELECT * FROM product ORDER BY prodID DESC LIMIT 1";

$result1 = mysqli_query($con ,$query1);
$row = @mysqli_fetch_row($result1);

if((strcmp($row[1], $prodName)==0) && (strcmp($row[2], $company)==0) && (strcmp($row[3], $distID)==0) )
{
	echo "Verdict Passed for Test Case #".$count."";
	echo '</br>';
}
else{
	echo "Verdict Failed for Test Case #".$count."";
	echo '</br>';
	
}

$count++;


	
}
 
fclose($open);




}
else 

{    
	echo "error";
}



?>