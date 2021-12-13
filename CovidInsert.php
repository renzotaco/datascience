<?php
$linea = 0;
$archivo = fopen("datacovid-0.csv", "r");

echo "<table border='2' align='center'>";
echo "<tr><td>#</td><td> Country</td><td>TotalCases</td><td>NewCases</td><td>TotalDeaths</td><td>NewDeaths</td>"
    ."<td>TotalRecovered</td><td>NewRecovered</td><td>ActiveCases</td><td>Serious Critical</td><td>Tot Cases 1M POP</td>"
    ."<td>Deaths 1M pop</td></tr>";
$con = mysqli_connect("localhost", "usrcopias", "password123", "covid");
$f = date("Y-m-d");
$h = date("H:m:s");
if ($con)
{
        $db = mysqli_select_db($con, "covid");
}
$i = 0;
while (($d = fgetcsv($archivo, ",")) == true)
{
  if ($i>0)
  {
          $num = count($d);
          echo "<tr>";
          for ($c = 1; $c < $num; $c++)
          {
                 echo "<td>".$d[$c] . "</td>";
          }
          echo "</tr>";
		  //corregir INSERT	
$sql = "insert into covidliveupdates (id,pais,totalcasos,nuevoscasos,totalmuertos,nuevosmuertos,totalrecuperados,"
        ." nuevosrecuperados,casosactivos,criticos,totalcasos1mpop,muertos1mpop,fecha,hora) "
        ." values ('','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]','$d[8]','$d[9]','$d[10]"
        ."','$d[11]','$d[12]','$f','$h'))";
 $rs = mysqli_query($con,$sql );

  }
        $i++;
}
echo "</table>";
fclose($archivo);
mysqli_close($con);
?>
