<?php

$file = getcwd().'/'.$_POST['the_jar'];
if (!file_exists($file)) die("File not found!".$file);

exec('java -jar '.$file);

?>
