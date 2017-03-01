<?php

$encoded = $_POST['imageData'];

preg_match("/^data:(.*);base64/",$encoded, $match);
echo $match[1];    

$decoded = urldecode($encoded);

$exp = explode(',', $decoded);

$base64 = array_pop($exp);

$data = base64_decode($base64);
$file = 'images/data.jpg'; // once I know the extension type then I will add it here

file_put_contents($file, $data);