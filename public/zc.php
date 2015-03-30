<?php
$isdebug = isset($_REQUEST['debug']);
$qs = $_GET["f"];
$type = $_GET["t"];
$files = explode(",", $qs);
$allfiles = "";
if ( $type == 'css' ) {
  header('Content-type: text/css');
  $folder = '';
} else if ( $type == 'js') {
  header('Content-type: text/javascript');
  $folder= '';
} else if ( $type == 'map') {
  header('Content-type: text/json');
  $folder= '';
} else {

  return;
}

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
  ob_start("ob_gzhandler");
} else {
  ob_start();
}
echo $isdebug;

for ($i = 0; $i < count($files); $i++) {
  $minifiedPath = '.' . $folder . '/' . $files[$i] . '.min.' . $type;
  $regularPath = '.' . $folder . '/' . $files[$i] . '.' . $type;
  $filename = file_exists($minifiedPath) == true && $isdebug == false ? $minifiedPath : $regularPath;
  $allfiles = $allfiles ."\n\n /* ZCFile:".$files[$i]."*/\n\n". file_get_contents($filename) . ' ';
  // $allfiles = $allfiles . file_get_contents($filename) . ' ';
}
echo $allfiles;
?>

