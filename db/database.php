<?php
$db['host'] = "localhost";
$db['users'] = "root";
$db['pass'] = "";
$db['name'] = "cost_share";

foreach ($db as $key => $value) {

  define(strtoupper($key), $value);
}
$conn = mysqli_connect('localhost', 'root', '', 'cost_share');
$connTest = "";
if ($conn)

  $connTest = "<h1>Database Connected</h1>";
else
  echo "not working";