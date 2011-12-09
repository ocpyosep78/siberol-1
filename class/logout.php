<?php defined ('SISPATH') or die ('Acces Denied');

unset($_SESSION);
session_destroy();
header ("location:".base_url());

