<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">Form Data Diri Siswa</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">

			<div class="input-group margin">
				Nis :
				<input class="form-control" type="text" placeholder="Nis" name="nis" value="<?php echo $nis;?>">
			</div>
			<div class="input-group margin">
				Nama :
				<input class="form-control" type="text" placeholder="Nama" name="nama" value="<?php echo $nama;?>">
			</div>
			<div class="input-group margin">
				Kelas :
				<select name="kelas" class="form-control">
					<option value="" readonly>--- PILIH ---</option>
                    <option value="X" <?php if(isset($_GET['edit']) && $kelas=="X"){ echo "selected"; }?>>10</option>
                    <option value="XI" <?php if(isset($_GET['edit']) && $kelas=="XI"){ echo "selected"; }?>>11</option>
                     <option value="XII" <?php if(isset($_GET['edit']) && $kelas=="XII"){ echo "selected"; }?>>12</option>
                </select>
			</div>
			<div class="input-group margin">
				Jurusan :
				<select name="jurusan" class="form-control">
					<option value="" readonly>--- PILIH ---</option>
                    <option value="RPL" <?php if(isset($_GET['edit']) && $jurusan=="RPL"){ echo "selected"; }?>>RPL</option>
                    <option value="TKJ" <?php if(isset($_GET['edit']) && $jurusan=="TKJ"){ echo "selected"; }?>>TKJ</option>
                    <option value="MMD" <?php if(isset($_GET['edit']) && $jurusan=="MMD"){ echo "selected"; }?>>MMD</option>
                    <option value="OTKP" <?php if(isset($_GET['edit']) && $jurusan=="OTKP"){ echo "selected"; }?>>OTKP</option>
                    <option value="TBG" <?php if(isset($_GET['edit']) && $jurusan=="TBG"){ echo "selected"; }?>>TBG</option>
                    <option value="BDP" <?php if(isset($_GET['edit']) && $jurusan=="BDP"){ echo "selected"; }?>>BDP</option>
                    <option value="HTL" <?php if(isset($_GET['edit']) && $jurusan=="HTL"){ echo "selected"; }?>>HTL</option>
                </select>
			</div>
          
			<div class="input-group margin">
				<span class="input-group-btn">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-flat">
				</span>
			</div>
		</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
 
