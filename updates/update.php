<?php

if(!isset($_REQUEST['title']) || !isset($_REQUEST['body']))
{
	exit;
}

$xml = simplexml_load_file('updates.xml') or die( "Could not connect to database" );

for($i=0;$xml->update[$i]!="";$i++);

$xml->addChild( "update", "." );
$xml->update[$i]->addChild( "title",$_REQUEST['title'] );
$xml->update[$i]->addChild( "body",$_REQUEST['body'] );

$xml->asXML( "updates.xml" );

?>

