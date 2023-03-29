<?php
$list_tuts = array(
  'https://youtu.be/TaBWhb5SPfc' => "Programmer Zaman Now",
  'https://youtu.be/l1W2OwV5rgY' => "Web Programming UNPAS",
  'https://www.youtube.com/watch?v=OK_JCtrrv-c' => "FreeCodecamp",
  'https://phptherightway.com/' => 'PHP The Right Way',
  'https://www.geeksforgeeks.org/php-tutorials/' => 'Geeks for Geeks'
);
echo "<h2>List Tutorial PHP</h2>";
echo "<ul>";
foreach($list_tuts as $url => $title) {
  echo "<li><a href='$url'>$title</a></li>";
}
echo "</ul>";
?>