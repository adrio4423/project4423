<?php
$count = count($fields);
	
if(!empty($count)){
	$body .= "<tbody>";
	$no = 1;
	//echo "SELECT * FROM $table $where";
	$sql = mysql_query("SELECT * FROM $table $where");
	while($data=mysql_fetch_array($sql)){
		$body .= "<tr>";
		$body .= "<td>".$no."</td>";
		for($i=0;$i<$count;$i++){
			$body .= "<td>".$data[$fields[$i]]."</td>";
		}
		$body .= "<td><a href='index.php?mod=".$_GET['mod']."&edit&id=".$data['id']."' class='btn btn-success'>EDIT</a> <a href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id']."' class='btn btn-danger'>hapus</a></td>";
		$body .= "</tr>";
		$no++;
	}
	$body .= "</tbody>";
	
	echo $body;
}

?>	