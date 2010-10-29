<?php

header('Content-type: text/html; charset=utf-8');

echo('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link href="css.php" rel="stylesheet" type="text/css"> 
<title>Sample XML-RPC Commands</title>
</head>
<body>
');

require_once('lib/xmlrpc.class.php');
require_once('lib/minecraft.php');

$url = 'http://zeryl:test@localhost:20012';
$client = new PrettyXMLRPC($url, new PrettyXMLRPCEpiBackend);

echo('<pre>');
$client->player->getPlayerNames();
print_r($client->result);
echo('</pre>');
echo('<br>');

echo('Sending message: Test123!');
$client->player->broadcastMessage('Test123!');
echo('<br>');

echo('Getting Zeryl\'s Inventory');
$client->player->getInventory('zeryl');
$result = $client->result;		
foreach($result as $key => $value) {
	$newresult[$key] = $value;
	if(isset($items[$value['itemID']]))
		$newresult[$key]['itemName'] = $items[$value['itemID']];
}
echo('<pre>');
print_r($newresult);
echo('</pre>');

echo('Getting player info for Zeryl');
echo('<br>');
$client->player->getPlayerInfo('zeryl');
$result = $client->result;
echo('<pre>');
print_r($result);
echo('</pre>');

echo('Sending Zeryl a message');
echo('<br>');
$client->player->sendMessage('zeryl', 'Testing sending a message');
$result = $client->result;
echo('<pre>');
var_dump($result);
echo('</pre>');

/*
echo('Adding Nox404 to the reserve list');
echo('<br>');
$client->server->addToReserveList('nox404');
$result = $client->result;
echo('<pre>');
var_dump($result);
echo('</pre>');

echo('Kick and remove Nox from the reserve list');
echo('<pre>');
$client->player->kick('nox404', 'Testing!');
$result = $client->result;
echo('<pre>Kick:');
var_dump($result);
echo('</pre>');
$client->server->removeFromReserveList('nox404');
$result = $client->result;
echo('<pre>Remove from Reserve:');
var_dump($result);
echo('</pre>');
*/



echo('<br><br>Sprite Test<br>');

echo('<img src="img/1x1.gif" class="sprite sapling" alt="Sapling">');

echo('</body>
</html>');

/*
int        minecraft.getBlockID(int, int, int)
base64     minecraft.getCuboidIDs(int, int, int, int, int, int)
int        minecraft.getHighestBlockY(int, int)
int        minecraft.getTime()
boolean    minecraft.setBlockID(int, int, int, int)
boolean    minecraft.setCuboidIDs(int, int, int, int, int, int, base64)
boolean    minecraft.setTime(int)
boolean    player.broadcastMessage(string)
array      player.getAccessibleKits(string)
array      player.getAccessibleWarps(string)
struct     player.getInventory(string)
struct     player.getPlayerInfo(string)
array      player.getPlayerNames()
array      player.getPlayers()
boolean    player.giveItem(string, int, int)
boolean    player.giveItemDrop(string, int, int)
boolean    player.kick(string, string)
boolean    player.removeInventoryItem(string, int, int)
boolean    player.removeInventorySlot(string, int)
boolean    player.sendMessage(string, string)
boolean    player.teleportTo(string, double, double, double, double, double)
boolean    player.teleportTo(string, double, double, double)
boolean    player.toggleMute(string)
boolean    server.addGroup(string, string, array, array, boolean, boolean, boolean, boolean)
boolean    server.addKit(string, string, struct, int)
boolean    server.addToReserveList(string)
boolean    server.addToWhitelist(string)
boolean    server.disablePlugin(string)
boolean    server.enablePlugin(string)
array      server.getAllowedItems()
struct     server.getBan(string, string)
array      server.getDisallowedItems()
struct     server.getKit(string)
string     server.getMotd()
int        server.getPlayerCount()
int        server.getPlayerLimit()
struct     server.getPlugin(string)
array      server.getPlugins()
struct     server.getSpawnLocation()
int        server.getSpawnProtectionSize()
string     server.getWhitelistMessage()
boolean    server.hasKits()
boolean    server.hasReserveList()
boolean    server.hasTimerExpired(string)
boolean    server.hasWarps()
boolean    server.hasWhitelist()
boolean    server.isBanned(string, string)
boolean    server.isWhitelistEnabled()
boolean    server.modifyBan(string, string, string, int)
boolean    server.modifyKit(string, string, string, struct, int)
boolean    server.reloadBanList()
boolean    server.reloadGroups()
boolean    server.reloadHomes()
boolean    server.reloadKits()
boolean    server.reloadPlugin(string)
boolean    server.reloadReserveList()
boolean    server.reloadWarps()
boolean    server.reloadWhitelist()
boolean    server.removeFromReserveList(string)
boolean    server.removeFromWhitelist(string)
boolean    server.runConsoleCommand(string, string)
boolean    server.runConsoleCommand(string)
boolean    server.setAllowedItems(array)
boolean    server.setDisallowedItems(array)
boolean    server.setMotd(string)
boolean    server.setPlayerLimit(int)
boolean    server.setSpawnProtectionSize(int)
boolean    server.setWhitelistEnabled(boolean)
boolean    server.setWhitelistMessage(string)
array      system.listMethods()
string     system.methodHelp(string)
array      system.methodSignature(string)
*/