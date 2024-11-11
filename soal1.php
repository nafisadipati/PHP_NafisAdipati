<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";
for ($a = $jml; $a > 0; $a--) {
    $total = 0;
    echo "<tr><td colspan='" . ($a + 1) . "'>total: ";
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }
    echo "$total</td></tr>\n";

    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}
echo "</table>";
