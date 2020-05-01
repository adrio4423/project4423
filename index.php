<?php
session_start();

$server = $_SERVER['HTTP_HOST'];
// if(empty($_SESSION['login_user']) && empty($_SESSION['login_level'])){
// 	print"<meta http-equiv=\"refresh\" content=\"0;URL=http://$server/agenda/login.php\">";
// 	print"LOGIN FIRST...";
// 	exit;
// }

require_once "config/conn.php";
include("header.php");
extract($_POST, EXTR_SKIP);

 
?>

<div class="wrapper row-offcanvas row-offcanvas-left">
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="left-side sidebar-offcanvas">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left info">
					<p>Agenda Kegiatan <br/>Wikrama</p>
					<!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
				</div>
			</div>
			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search..."/>
					<span class="input-group-btn">
						<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
                <li class="treeview " >
					<a href="#">
                        <span><i class="fa fa-laptop"></i> Master Data</span><i class="fa pull-right fa-angle-left"></i>
					</a>
					<ul class="treeview-menu" style="display: none;">
                        <li><a href="index.php?mod=siswa"><i class="fa fa-angle-double-right"></i> Siswa</a></li>
                        <li><a href="index.php?mod=guru"><i class="fa fa-angle-double-right"></i> Guru</a></li>
                        <li><a href="index.php?mod=ortu"><i class="fa fa-angle-double-right"></i> Orang tua</a></li>
                        <li><a href="index.php?mod=mapel"><i class="fa fa-angle-double-right"></i> Mata Pelajaran</a></li>
                        <li><a href="index.php?mod=detail_jadwal"><i class="fa fa-angle-double-right"></i> Jadwal</a></li>

					</ul>
				</li>
				<li><a href="index.php?mod=data_diri"> Data Diri</a></li>
				<li><a href="index.php?mod=jadwal"> Jadwal</a></li>
				<li><a href="index.php?mod=cuti"> Cuti</a></li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content">
			<?php
				
				if(@$_GET['mod']){
					$mod = $_GET['mod'];
					
					if(!empty($mod)){
					
						$filename = "module/".$mod.".php";
					
						if(file_exists($filename)) {
							@include($filename);
						}else{
							@include("module/home.php");
						}
						
					}else{
						@include("module/home.php");
					}
				}else{
					@include("module/home.php");
				}
			?>
		</section>
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php
include ("footer.php");
?>

 <!-- jQuery 2.0.2 -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-bootstrap-rspad.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes>
<script src="js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
	$(function() {
		$("#example1").dataTable();
		$('#example2').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false
		});
	});
	
</script>