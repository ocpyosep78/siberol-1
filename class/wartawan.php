<?php defined ('SISPATH') or die ('Acces Denied');?>
<?php if ($_SESSION['tipe'] !== 'Wartawan') exit ('You dont have acces this');?>
<!DOCTYPE html>
<html>
<head>
        <title>Wartawan | Siberol</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common.css">
		
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/ui-lightness/jquery-ui-1.8.16.custom.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/ckeditor/ckeditor.js"></script>
</head>

<body>
	<div class="navbar navbar-fixed" data-scrollspy="scrollspy">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url()?>wartawan">Siberol</a>
				<ul class="nav">
                                        <li><a href="<?php echo base_url()?>wartawan">News</a></li>
					<li><a href="<?php echo base_url()?>logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
    <div class="container">
	<div class="page-header">
                <h1>Selamat Datang<small> [Wartawan] <?php echo $_SESSION['nama_lengkap'];?>.</small></h1>
        </div>
        <div class="row">
            <div class="span12">
                <?php
                
                if ($_POST)
                {
		    $file = array();
		    $valid = array ('image/png','image/jpeg','image/gif', 'image/jpg');
		    
		    $file["nama"] = $_FILES['gambar']['name'];
		    $file["lokasi"] = $_FILES['gambar']['tmp_name'];
		    $file["tipe"] = $_FILES['gambar']['type'];
		    $file["ukuran"] = $_FILES['gambar']['size'];
		    
		    if ((in_array($file["tipe"], $valid, true)))
		    {
			$lokasi_img = 'assets/images/upload/' . $file["nama"];
			move_uploaded_file($file["lokasi"], $lokasi_img);
			
		    }
		    else
		    {
			$lokasi_img ='';
		    }
		    $DB->query(
			    "INSERT INTO berita (judul, nm_war, kategori, isi, gambar)
			    VALUES ('".get_post('judul')."','".$_SESSION['nama_lengkap']."','".$_POST['kategori']."','".$_POST['isi']."','".$lokasi_img."')"
			);		
		    
                        echo '<div class="alert-message block-message success">
                                <p><strong>Well done!</strong> Berita berhasil disimpan<p>
                            </div>';
                    
                }
                
                ?>
                <form class="vertical-form" method="post" action="" enctype="multipart/form-data">
                    <legend>Selamat Datang Wartawan</legend>
                        <fieldset class="control-group">
                            <label class="control-label" for="judul">Judul Berita</label>
                            <div class="controls">
                                <input class="span6" name="judul" type="text" placeholder="Judul berita ...">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="kategori">Kategori</label>
                            <div class="controls">
                                <?php echo form_dropdown('kategori', array('olahraga'=>'Olahraga','politik'=>'Politik','hiburan'=>'Hiburan','internet'=>'Internet'), '')?>
                            </div>
                        </fieldset>
			<fieldset class="control-group">
                            <label class="control-label" for="kategori">Gambar</label>
                            <div class="controls">
                                <input type="file" name="gambar">
				<p class="help-text"><b>Note:</b> Image only, png, jpeg, jpg, gif</p>
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="isi">Isi Berita</label>
                            <div class="controls">
                                <textarea class="span9 ckeditor" name="isi" rows="15" placeholder="Isi berita ..."></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-actions">
                            <button type="submit" class="btn primary">Save </button>
                            <button type="reset" class="btn">Cancel</button>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html> 