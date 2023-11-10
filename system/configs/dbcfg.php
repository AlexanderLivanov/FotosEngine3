<!-- 10.11.2023 (c) Alexander Livanov -->
<?php

session_start();

try { $connect = new PDO('mysql:dbname=fotosengine;host=localhost', 'root', ''); } catch(PDOException $e) { echo ''. $e->getMessage(); }

?>