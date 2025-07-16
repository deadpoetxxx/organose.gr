<?php
// Demo αρχική σελίδα συλλόγου
echo "<h1>Καλωσήρθατε στον σύλλογο!</h1>";

$info = __DIR__ . '/info.txt';
if (file_exists($info)) {
    echo "<pre>" . file_get_contents($info) . "</pre>";
} else {
    echo "<p>Δεν υπάρχουν πληροφορίες.</p>";
}
