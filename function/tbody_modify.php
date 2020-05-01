<?php
$count = count($fields);

if($cetak == 1){
	$cetak_validation = true;
}

if($link_edit){
	$mod = $link_edit;
}else{
	$mod = $_GET['mod'];
}

if(!empty($count)){
	$body .= "<tbody>";
	$no = 1;
	$sql = mysql_query("SELECT $list_field FROM $table $where");
	//echo "SELECT $list_field FROM $table $where";
	while($data=mysql_fetch_array($sql)){
		
		$body .= "<tr>";
		$body .= "<td>".$no."</td>";
		
		for($i=0;$i<$count;$i++){
			$body .= "<td>".$data[$fields[$i]]."</td>";
		}
		
		if($cetak_validation == true){
			$cetak = "<a href='module/cetak_transmak.php?id=".$data['id']."' class='btn btn-success' target='_blank'>Cetak</a>";
		}
		$body .= "<td>";
		if($edit == true){
			if($mod == "datauser_notcomplete.php"){
				$body .= "<a href='index.php?mod=data_personel.php&edit&id=".$data['id']."' class='btn btn-success'>EDIT</a>";
			}else{
				$body .= "<a href='index.php?mod=".$mod."&edit&id=".$data['id']."' class='btn btn-success'>EDIT</a>";
			}
		}
		$body .= "<!--a href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id']."' class='btn btn-danger'>Hapus</a--> ";
		$body .= $cetak;
		$body .= "</td></tr>";
		$no++;
	}
	$body .= "</tbody>";
	
	echo $body;
}

?>	