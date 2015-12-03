<?php

require_once('init.php');

\Tamber\Tamber::setApiKey('80r2oX10Uw4XfZSxfh4O');
$item = new \Tamber\Item(array(
	'id' => '68753A444D6F',
	'properties' => array('height' => 23.4),
	'tags' => ['amazing', 'rustic'],
	'created' => 1446417346
));
$item->create();

print_r($item);
echo $item . "\n";

?>