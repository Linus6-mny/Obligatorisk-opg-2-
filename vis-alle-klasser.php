<?php  
/* vis_alle_klasser.php */
/* Viser alle registrerte klasser */

include("db-tilkobling.php");  // kobler til databasen

$sqlSetning = "SELECT * FROM klasse;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);  // teller antall rader

echo "<h3>Registrerte klasser</h3>";
echo "<table border='1'>";
echo "<tr>
        <th align='left'>Klassekode</th> 
        <th align='left'>Klassenavn</th> 
        <th align='left'>Studiumkode</th>
      </tr>";

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlResultat);
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    $studiumkode = $rad["studiumkode"];

    echo "<tr> 
            <td>$klassekode</td> 
            <td>$klassenavn</td> 
            <td>$studiumkode</td> 
          </tr>";
}

echo "</table>"; 
?>

?>