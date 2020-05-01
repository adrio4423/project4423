<?php
session_start();
require_once "config/conn.php";
$server = $_SERVER['HTTP_HOST'];
if(!empty($_SESSION['login_nik']) && !empty($_SESSION['login_level'])){
	print"<meta http-equiv=\"refresh\" content=\"0;URL=http://$server/padinet/index.php\">";
	print"LOGIN FIRST...";
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SKRIPSI - STMIK JAYAKARTA</title>
<link rel="stylesheet" href="css/style1.default.css" type="text/css" />
<script type="text/css">

#body { 
  background: url(img/preview/image6.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</script>
</head>
<body class="loginbody">

    <div class="loginwrapper">
        <div class="loginwrap zindex100 animate2 bounceInDown">
        <h1 class="logintitle">Agenda Kegiatan<span class="subtitle">&copy;SMK Wikrama Bogor - 2020.</span></h1>
            <div class="loginwrapperinner">
			
				<form id="loginform" method="post">
					<p class="animate4 bounceIn"><input type="text" id="nik" name="username" placeholder="NIK Pegawai" /></p>
					<p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" autocomplete=""/></p>
					<p class="animate6 bounceIn"><button class="btn btn-default btn-block">Masuk</button></p>
					
				</form>
				<?php
				if(isset($_POST['username']))
				{
					$spf		= mysql_query("SELECT pegawai.*,`level`.`level` FROM pegawai JOIN `level` ON pegawai.id_level = `level`.id_level where pegawai.nik='".$_POST['username']."' and pegawai.password='".md5($_POST['password'])."' LIMIT 1");
					@$rw		= mysql_fetch_array($spf);
					@$rc		= mysql_num_rows($spf);
					
					if($rc==1)
					{
						$_SESSION['login_nik']=$rw['nik'];
						$_SESSION['login_nama']=$rw['nama_pegawai'];
						$_SESSION['login_level']=$rw['level'];
						
						echo "<script>alert('Berhasil login.');</script>";
						echo "<script>window.location='index.php'</script>";
					}else{
						echo "<p align='center' style='color:red;font-size:14px;'>Username atau Password Salah !!!</p>";
					}
				}
				?>
            </div><!--loginwrapperinner-->
        </div>
        <div class="loginshadow animate3 fadeInUp"></div>
    </div><!--loginwrapper-->
    
    <script type="text/javascript">
    jQuery.noConflict();
    
    jQuery(document).ready(function(){
        
        var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
        jQuery('.loginwrap').bind(anievent,function(){
            jQuery(this).removeClass('animate2 bounceInDown');
        });
        
        jQuery('#username,#password').focus(function(){
            if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
        });
        
        jQuery('#loginform button').click(function(){
            if(!jQuery.browser.msie) {
                if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
                    if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
                    if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
                    jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
                        jQuery(this).removeClass('animate0 wobble');
                    });
                } else {
                    jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
                        jQuery('#loginform').submit();
                    });
                }
                return false;
            }
        });
    });
    </script>

</body>
</html>