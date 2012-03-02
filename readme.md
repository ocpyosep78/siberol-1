# Siberol

Siberol merupakan singkatan sistem informasi berita online yang dibuat untuk menyelesaikan
tugas mata kuliah server side scripting yang diberikan oleh Dosen Mercubuana Meruya Jakarta.


## Framework

1. CodeIgniter : <a href="https://github.com/EllisLab/CodeIgniter">3.0.0-dev</a>
2. Twitter bootstrap : <a href="http://twitter.github.com/bootstrap/">bootstrap</a>.
3. jQuery 1.7.1 : <a href="http://jquery.com">jQuery 1.7.1</a>.
4. Tiny MCE  : <a href="http://www.tinymce.com/">Tiny MCE 3.4.9</a>.

## Codeigniter Sparks Packages

1. Debug-Toolbar : <a href="http://getsparks.org/packages/Debug-Toolbar/versions/HEAD/show">1.0.7</a>
2. Template : <a href="http://getsparks.org/packages/template/versions/HEAD/show">1.9.0</a>
3. db-assets : <a href="http://getsparks.org/packages/db-assets/versions/HEAD/show">0.5.0</a>
4. DataMapper-ORM : <a href="http://getsparks.org/packages/DataMapper-ORM/versions/HEAD/show">0.5.0</a>

## Requirements

1. PHP 5.1+
2. Directory structure for the assets files, with a writeable assets/cache directory


## Project URL : 
http://goo.gl/33Z68


## Instalasi

1. Upload shcema sql yang terdapat di `sql/siberol_*` ke dalam mysql server anda
2. Ubah konfigurasi database yang terdapat di `application/config/database` sesuai dengan
   konfigurasi server anda
   
        $db['production']['dsn']      = '';
        $db['production']['hostname'] = 'localhost';
        $db['production']['username'] = '';
        $db['production']['password'] = '';
        $db['production']['database'] = '';
        $db['production']['dbdriver'] = 'mysqli';
        $db['production']['dbprefix'] = '';
        $db['production']['pconnect'] = FALSE;
        $db['production']['db_debug'] = TRUE;
        $db['production']['cache_on'] = FALSE;
        $db['production']['cachedir'] = '';
        $db['production']['char_set'] = 'utf8';
        $db['production']['dbcollat'] = 'utf8_general_ci';
        $db['production']['swap_pre'] = '';
        $db['production']['autoinit'] = TRUE;
        $db['production']['stricton'] = FALSE;
        $db['production']['failover'] = array();
    
    ` NOTES yang dirubah adalah config di atas `

3. Buat folder `_assets/_witable/capth` dan `_assets/_witable/upload` menjadi writable ( chmod 777)
4. Aplikasi ini merapkan FQDN, jika anda meletakkan aplikasi ini di bawah root FQDN, rubahlah
   file `.htaccess`
   
        RewriteEngine on
        RewriteCond $1 !^(index\.php|_assets|robots\.txt)
        RewriteRule ^(.*)$ /index.php/$1 [L]
        
    semisal jika anda meletakkan aplikasi ini di bawah `www.your-domain.com` dan nama folder
    yang anda gunakan untuk menampung siberol adalah `berita`
        
        `www.your-domain.com/berita`
    
    maka rubah lah file `.htaccess`
    
        RewriteEngine on
        RewriteCond $1 !^(index\.php|_assets|robots\.txt)
        RewriteRule ^(.*)$ /berita/index.php/$1 [L]
        
## Sumber sample berita

1. Detik : <a href="http://www.detik.com">Detik</a>
2. JanganTulalit : <a href="http://www.jangantulalit.com">JanganTulalit</a>


## Author
    
+ Purwandi : http://www.purwandi.me
+ Twitter : http://www.twitter.com/purwandi_m