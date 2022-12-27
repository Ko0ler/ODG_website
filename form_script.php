<?php

// Redirect to thank-you page
header("Location: success.html");
exit;

// Get form data
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$country = $_POST['country'];
$profession = $_POST['profession'];
$other_profession = $_POST['other_profession'];
$comment = $_POST['comment'];
$feel = $_POST['feel'];
$look = $_POST['look'];
$efficiency = $_POST['efficiency'];

// Create an XML document with the UTF-8 encoding attribute
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><form_data></form_data>');

// Add form data as elements to the XML document
$xml->addChild('last_name', $last_name);
$xml->addChild('first_name', $first_name);
$xml->addChild('email', $email);
$xml->addChild('country', $country);
$xml->addChild('profession', $profession);
$xml->addChild('other_profession', $other_profession);
$xml->addChild('comment', $comment);
$xml->addChild('feel', $feel);
$xml->addChild('look', $look);
$xml->addChild('efficiency', $efficiency);

// Save the XML document to a file
$xml->asXML('users_data.xml');


?>