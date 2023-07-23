<?php

// Get form data
$last_name = htmlspecialchars($_POST['last_name']);
$first_name = htmlspecialchars($_POST['first_name']);
$email = htmlspecialchars($_POST['email']);
$country = htmlspecialchars($_POST['country']);
$profession = htmlspecialchars($_POST['profession']);
$other_profession = htmlspecialchars($_POST['other_profession']);
$comment = htmlspecialchars($_POST['comment']);
$feel = htmlspecialchars($_POST['feel']);
$look = htmlspecialchars($_POST['look']);
$efficiency = htmlspecialchars($_POST['efficiency']);

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: /submission_review/error.html");
    exit();
}

// Future feature to add
// Authenticate and authorize user
// Add the authentication and authorization logic
// For example, we can check if the user is logged in or has the necessary privileges

// Read the existing content of the file
$existing_content = file_get_contents('users_data.xml');

// Prepare the new form data as XML
$new_line = "\n" . '<form_data>' . "\n" .
    '    <last_name>' . $last_name . '</last_name>' . "\n" .
    '    <first_name>' . $first_name . '</first_name>' . "\n" .
    '    <email>' . $email . '</email>' . "\n" .
    '    <country>' . $country . '</country>' . "\n" .
    '    <profession>' . $profession . '</profession>' . "\n" .
    '    <other_profession>' . $other_profession . '</other_profession>' . "\n" .
    '    <comment>' . $comment . '</comment>' . "\n" .
    '    <feel>' . $feel . '</feel>' . "\n" .
    '    <look>' . $look . '</look>' . "\n" .
    '    <efficiency>' . $efficiency . '</efficiency>' . "\n" .
    '</form_data>';

// Encode the XML data to JSON
$xml = simplexml_load_string($existing_content . $new_line);
$json = json_encode($xml);

// Write the new JSON content to the file
file_put_contents('users_data.json', $json, LOCK_EX);

// Redirect to success page
header("Location: /submission_review/success.html");
exit();
?>
