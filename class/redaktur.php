<?php defined ('SISPATH') or die ('Acces Denied');?>
<!DOCTYPE html>
<html>
<head>
        <title>Berita Terhangat | Siberol</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span8">
                <form class="inline-form">
                    <legend>Selamat Datang Redaktur</legend>
                        <fieldset class="control-group">
                            <label class="control-label" for="input01">Judul Berita</label>
                            <div class="controls">
                                <input class="span6" name="input01" type="text">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="input02">Nama Wartawan</label>
                            <div class="controls">
                                <input class="xlarge" name="input02" type="text">
                            </div>
                        </fieldset>
                        <fieldset class="control-group has-error">
                            <label class="control-label" for="textareaError">Isi Berita</label>
                            <div class="controls">
                                <textarea class="span6" rows="30"></textarea>
                            </div>
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