<?php
include 'DatabaseConnection.php';
?>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
</html>
<?php


$Name=$_POST['substructurename'];

$query1="select SubstructureID from newprojectschedule where Name='$Name' ";
$result1=mysqli_query($conn,$query1);

$row=mysqli_fetch_array($result1);
$id=$row['SubstructureID'];

$query2="select Overall_Progress from progressreport where SubstructureID='$id' ";
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_array($result2);
$pro=$row2['Overall_Progress'];

echo "<div class='c'>";
echo "Substructure Total Progress - ". $pro ."%";
echo "</div>";
$query="select * from workreport where SubstructureID='$id' ";
$result=mysqli_query($conn,$query);

echo "<table border='1'>
<tr>
<th>Date</th>
<th>Scheduled Work</th>
<th>Actual Work</th>
<th>Day Progress(%)</th>
</tr>
";
// echo " Date : " . $row["Date"]. "- ScheduledWork : " . $row["IdealWork"].
//  "- Actual Work : ". $row["ActualWork"]. "- Progress : ". $row["Progress"]. "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" .  $row["Date"] ."</td>";
      echo "<td>" .  $row["IdealWork"] ."</td>";
      echo "<td>" .  $row["ActualWork"] ."</td>";
      echo "<td>" .  $row["Progress"] ."</td>";
      echo "</tr>";
    }
} else {
    echo "0 results";
}
?>
