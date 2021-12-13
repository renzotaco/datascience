<?php
$linea = 0;
$archivo = fopen("datacovid-0.csv", "r");

echo "<table border='2' align='center'>";
echo "<tr><td>#</td><td> Country</td><td>TotalCases</td><td>NewCases</td><td>TotalDeaths</td><td>NewDeaths</td>"
    ."<td>TotalRecovered</td><td>NewRecovered</td><td>ActiveCases</td><td>Serious Critical</td><td>Tot Cases 1M POP</td>"
    ."<td>Deaths 1M pop</td></tr>";
while (($d = fgetcsv($archivo, ",")) == true)
{
  $num = count($d);
  echo "<tr>";
  for ($c = 1; $c < $num; $c++)
      {
         echo "<td>".$d[$c] . "</td>";
     }
  echo "</tr>";
}
fclose($archivo);
?>
