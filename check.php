<?php
include'db.php';
include 'PHPMachineLearning-master/src/phpLearn/phpLearn.php';

$caste=$_POST["caste"];
$university=$_POST["university"];
$university=strtoupper($university);
$marks=$_POST["marks"];

//$samples = [[16566, 2015], [15545, 2016], [16856, 2017]];
//$targets = [16066,15045,16356];

$samples = [[16999, 2015], [15999, 2016], [16999, 2017]];
$targets = [16001,15001,16001];

$classifier = new MultipleLinearRegression(true);
$classifier->train($samples, $targets);
$data = $classifier->predict([$marks, 2018]);
$diff = $marks - $data[0];
$max_target = $marks+$diff;

$min_target = $data[0];

//echo $mmarks;
$result = mysqli_query($conn,"select * from $university where $caste<=$max_target AND $caste>=$min_target AND $caste!=0 order by $caste desc");
$json_response = array();
while ($row = mysqli_fetch_array($result)) {  
// Fetch data of Fname Column and store in array of row_array  

$row_array['name'] = $row['name'];
$row_array['branch'] = $row['branch'];
$row_array['address'] = $row['address'];
$row_array['year'] = $row['year'];

//push the values in the array  

array_push($json_response,$row_array);  
}  

//echo $min_target;

echo json_encode($json_response);

?>