<div class="page-header">
    <h2>Tulis Berita Baru</h2>
</div>
<?php echo form_open_multipart();?>
    <legend>Form Berita</legend>
    <?php echo view_errors();?>
    <?php echo form_text('Judul Berita','judul',@$b->judul,'class="span6"');?>
    <?php echo form_drop('Kategori','kategori',array('olahraga'=>'Olahraga','politik'=>'Politik','hiburan'=>'Hiburan','internet'=>'Internet'),@$b->judul);?>
    <?php echo form_file('Attachment','gambar',@$berita->gambar);?>
    <?php echo form_area('Isi Berita','isi',@$berita->isi,'class="span12"');?>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Sign In</button>
        <button type="reset" class="btn">Reset</button>
    </div>
<?php echo form_close();?>

<?php echo js('tiny_mce/tiny_mce.js');?>
<script>
    tinyMCE.init({
            // General options
            mode : "exact",
            elements : "isi",
            theme : "advanced",
            skin : "o2k7",
            skin_variant : "black",
            height : "480",
            plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Example content CSS (should be your site CSS)
            // content_css : "css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                    username : "Some User",
                    staffid : "991234"
            }
	});
</script>