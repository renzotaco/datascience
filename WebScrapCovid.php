<?php
        $file="covid.csv";

        $fp = fopen ( $file, "r" );

        echo "<h2><center>Actualización de COVID a nivel mundial</center></h2><hr width='80%'>";
        echo "<table align='center' border='2' width='80%'><tr><td>Country</td><td>confirmed</td><td>death</td><td>continent</td></tr>";

        while (!feof($fp))
        { // Mientras hay líneas que leer...
                $row = fgets($fp);
                $n =  explode("|", $row);
                echo "<tr><td>".$n[0]."</td><td>".$n[1]."</td><td>".$n[2]."</td><td>".$n[3]."</td></tr>";
        }
        echo "</table>";
        fclose ( $fp );

?>
