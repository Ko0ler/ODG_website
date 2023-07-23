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

// Prepare the new form data as an associative array
$new_data = array(
    'last_name' => $last_name,
    'first_name' => $first_name,
    'email' => $email,
    'country' => $country,
    'profession' => $profession,
    'other_profession' => $other_profession,
    'comment' => $comment,
    'feel' => $feel,
    'look' => $look,
    'efficiency' => $efficiency
);

// Encode the new data as JSON
$json_data = json_encode($new_data);

// Read existing JSON data from the file
$existing_data = file_get_contents('users_data.json');

// Append the new data to the existing JSON data
$existing_data .= $json_data . PHP_EOL;

// Write the JSON data to the file
file_put_contents('users_data.json', $existing_data, LOCK_EX);

// Redirect to success page
header("Location: /submission_review/success.html");
exit();
?>
