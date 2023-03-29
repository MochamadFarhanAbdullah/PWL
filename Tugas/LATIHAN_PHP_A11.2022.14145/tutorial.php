<?php
$list_tuts = array(
    'https://youtu.be/TaBWhb5SPfc' => "Programmer Zaman Now",
    'https://youtu.be/l1W2OwV5rgY' => "Web Programming UNPAS",
    'https://www.youtube.com/watch?v=OK_JCtrrv-c' => "FreeCodecamp",
    'https://phptherightway.com/' => 'PHP The Right Way',
    'https://www.geeksforgeeks.org/php-tutorials/' => 'Geeks for Geeks',
    'logout.php' => 'Keluar'
);
?>
<h1>Daftar Tutorial PHP:</h1>
<ul>
    <?php
    foreach ($list_tuts as $url => $text) {
        echo "<li><a href='$url'>$text</a></li>";
    }
    ?>
</ul>