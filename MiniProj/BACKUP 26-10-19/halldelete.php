<?php
// include("dbconnect.php");
// $hallid=$_POST['hallid'];
// $sql_delete="delete from examhall where hall_id='$hallid'";
// $res=$conn->query($sql_delete);
// if($res==true)
// {
//     // echo "deleted";
//     header('Location:examhallreg.php');
//}
?>
<?php
	include_once('dbconnect.php');
 
	if( isset($_GET['del']) )
	{
		$hallid = $_GET['del'];
		// $sql= "DELETE FROM examhall WHERE hall_id='$hallid'";
        // $res= mysql_query($sql) or die("Failed".mysql_error());
        $sql_delete="delete from examhall where hall_id='$hallid'";
         $res=$conn->query($sql_delete);
        header('Location:examhallreg.php');
		//echo "<meta http-equiv='refresh' content='0;url=examhallreg.php'>";
	}
?>