<?php

// Redirect to success page
header("Location: success.html");

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

// Read the existing content of the file
$existing_content = file_get_contents('users_data.xml');

// Add form data as a new line to the content
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

// Write the new content to the file
file_put_contents('users_data.xml', $existing_content . $new_line);

?>