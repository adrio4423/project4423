<?php 
$conn = mysqli_connect("localhost","root","","agenda");

if(!$conn){
?>
<div align="center"><font size="3"> Agenda Kegiatan &copy;SMK Wikrama - <?php echo date("Y");?> is Protected</font><br>
<font size="2" color="blue">Contact Your Webmaster administrator</font></div> 
<?php 
}
?>