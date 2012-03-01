<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <?php if ( ! $this->auth->is_secure()):?>
        <a class="brand" href="./index.html">Siberol</a>
        <?php endif;?>
    
        <div class="nav-collapse">
            
            <?php if ( ! $this->auth->is_secure()):?>
            <ul class="nav">
                <li class=""><a href="./index.html"><i class="icon-home icon-white"></i> Home</a></li>
                <li class=""><a href="./scaffolding.html">Internet</a></li>
                <li class=""><a href="./base-css.html">Olahraga</a></li>
                <li class=""><a href="./components.html">Politik</a></li>
                <li class=""><a href="./javascript.html">Hiburan</a></li>
            </ul>
            <?php elseif($this->auth->data('tipe') === 'Redaktur'):?>
            <ul class="nav">
                <li><?php echo anchor('accounts','<i class="icon-home icon-white"></i> Home</a>');?></li>
                <li class=""><a href="./scaffolding.html">Berita Tayang</a></li>
                <li class=""><a href="./base-css.html">Berita Baru</a></li>
                <li class=""><a href="./components.html">Manage Users</a></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $this->auth->data('nama_lengkap');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('accounts/profile','Profile');?></li>
                        <li><?php echo anchor('accounts/logout','Logout');?></li>
                    </ul>
                </li>
            </ul>
            <?php elseif($this->auth->data('tipe') === 'Wartawan'):?>
            <ul class="nav">
                <li><?php echo anchor('accounts','<i class="icon-home icon-white"></i> Home</a>');?></li>
                <li><?php echo anchor('wartawan/insert','Tulis Baru');?></li>
                <li><?php echo anchor('wartawan/index/review','Berita Proses Review');?></li>
                <li><?php echo anchor('wartawan/index/tayang','Berita Tayang');?></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $this->auth->data('nama_lengkap');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('accounts/profile','Profile');?></li>
                        <li><?php echo anchor('accounts/logout','Logout');?></li>
                    </ul>
                </li>
            </ul>
            <?php else:?>
            <?php endif;?>
            
        </div>
      </div>
    </div>
</div>