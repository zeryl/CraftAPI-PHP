<?

header("Content-type: text/css");

$terrainsize = 32;

$sapling = 15;

$saplingx = $sapling * $terrainsize;

?>

.sprite {
	background: url(img/terrain.png);
	height: <?=$terrainsize;?>px;
	width: <?=$terrainsize;?>px;
}

.sapling {
	background-position: -<?=$saplingx;?>px 0px;
}