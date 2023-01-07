<?Php
$id=$_POST['id'];
$mark=$_POST['mark'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$class=$_POST['class'];

$message=''; // 
$status='success';              // Set the flag  
//sleep(2); // if you want any time delay to be added

//// Data validation starts ///
if(!is_numeric($mark)){ // checking data
$message= "Data Error";
$status='Failed';
 }

if(!is_numeric($id)){  // checking data
$message= "Data Error";
$status='Failed';
}

if($mark > 100 or $mark < 0 ){
$message= "Mark should be between 0 & 100";
$status='Failed';
}
//// Data Validation ends /////
if($status<>'Failed'){  // Update the table now

//$message="update student set mark=$mark, name
require "config.php"; // MySQL connection string
$stmt = $connection->prepare("update student set mark=?,name=?,class=?,sex=? WHERE id=?");
if ($stmt) {
$stmt->bind_param('isssi', $mark,$name,$class, $sex, $id);
$stmt->execute();
$no=$stmt->affected_rows;
$message= " $no  Record updated<br>";
}else{
echo $connection->error;
}
}else{

}// end of if else if status is success 
$a = array('id'=>$id,'mark'=>$mark,'name'=>$name,'class'=>$class,'sex'=>$sex);
$a = array('data'=>$a,'value'=>array("status"=>"$status","message"=>"$message"));
echo json_encode($a); 
?>