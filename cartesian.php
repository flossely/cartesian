<?php
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
foreach ($list as $key=>$value) {
    if (!file_exists($value.'/coord')) {
        unset($list[array_search($value, $list)]);
    }
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Cartesian</title>
<link rel="shortcut icon" href="sys.console.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
</head>
<body>
<?php
foreach ($list as $key=>$value) {
    $coord = file_get_contents($value.'/coord');
    $coordDiv = explode(';', $coord);
    $coordX = $coordDiv[0];
    $coordY = $coordDiv[1];
    $coordZ = $coordDiv[2];
    echo $value.' ('.$coordX.';'.$coordY.';'.$coordZ.')<br>';
}
?>
</body>
</html>