<?php
if(file_exists(DIR.'\core\helper.php')){
    require_once DIR.'\core\helper.php';
}else{
    throw new Exception(DIR."'\core\helper.php' file does not exist");
}

inc_file(DIR.'\core\router\manager.php');
inc_file(DIR.'\routes\web.php');
inc_file(DIR.'\routes\api.php');

