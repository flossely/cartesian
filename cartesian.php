<?php
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
foreach ($list as $key=>$value) {
    if (!file_exists($value.'/coord') && !file_exists($value.'/rating') && !file_exists($value.'/mode')) {
        unset($list[array_search($value, $list)]);
    }
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Cartesian</title>
<link rel="shortcut icon" href="sys.map.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<?php include 'base.incl.php'; ?>
</head>
<body>
<?php
foreach ($list as $key=>$value) {
    $coord = file_get_contents($value.'/coord');
    $coordDiv = explode(';', $coord);
    if (is_numeric($coordDiv[0])) {
        $coordX = $coordDiv[0];
    } else {
        $coordX = 0;
    }
    if (is_numeric($coordDiv[1])) {
        $coordY = $coordDiv[1];
    } else {
        $coordY = 0;
    }
    if (is_numeric($coordDiv[2])) {
        $coordZ = $coordDiv[2];
    } else {
        $coordZ = 0;
    }
    echo $value.' ('.$coordX.';'.$coordY.';'.$coordZ.')<br>';
}
?>
</body>
</html>