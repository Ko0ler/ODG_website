<?php

header('Location: success.html');

$name = $_POST['name'];
$email = $_POST['email'];

$data = [$name, $email];

$file = fopen('users_data.csv', 'a');

fputcsv($file, $data);

fclose($file);

?>