<?php defined ('SISPATH') or die ('Acces Denied');?>
<!DOCTYPE html>
<html>
<head>
        <title>Wartawan | Siberol</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common.css">
		
		<script type="text/javascript" href="<?php echo base_url()?>assets/js/jquery.js">
		<script type="text/javascript" href="<?php echo base_url()?>assets/js/jquery-ui.js">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/ui-lightness/jquery-ui-1.8.16.custom.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span8">
                <?php
                
                if ($_POST)
                {
                    $data = $DB->query(
                        "INSERT INTO berita (judul, nm_war, kategori, isi)
                        VALUES ('".get_post('judul')."','".get_post('nm_war')."','".get_post('kategori')."','".get_post('isi')."')"
                    );
                    if ($data)
                    {
                        echo '<div class="alert-message block-message success">
                                <p><strong>Well done!</strong> Berita berhasil disimpan<p>
                            </div>';
                    }
                }
                
                ?>
                <form class="vertical-form" method="post" action="">
                    <legend>Selamat Datang Wartawan</legend>
                        <fieldset class="control-group">
                            <label class="control-label" for="judul">Judul Berita</label>
                            <div class="controls">
                                <input class="span6" name="judul" type="text" placeholder="Judul berita ...">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="nm_war">Nama Wartawan</label>
                            <div class="controls">
                                <input class="xlarge" name="nm_war" type="text" placeholder="Nama wartawan ...">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="kategori">Kategori</label>
                            <div class="controls">
                                <input class="xlarge" name="kategori" type="text" placeholder="Kategori berita ...">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="isi">Isi Berita</label>
                            <div class="controls">
                                <textarea class="span6" name="isi" rows="15" placeholder="Isi berita ..."></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-actions">
                            <button type="submit" class="btn primary">Save </button>
                            <button type="reset" class="btn">Cancel</button>
                        </fieldset>
                </form>
            </div>
            <div class="span4">
                Eed
            </div>
        </div>
    </div>
</body>

</html> 