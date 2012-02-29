<!DOCTYPE html>
<html>
    <head>
	<title><?php echo $template['title']; ?></title>
	<?php echo css('bootstrap.css') ?>
        <?php echo css('bootstrap-responsive.css') ?>
        <?php echo css('docs.css') ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
	<h1><?php echo $template['title']; ?></h1>
	<?php echo $template['body']; ?>
    </body>
    <?php echo js('jquery.js');?>
</html>