<?php  
/* vis_alle_studenter.php */
/* Viser alle registrerte studenter */

include("db-tilkobling.php");  // kobler til databasen

$sqlSetning = "SELECT * FROM student;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);  // teller antall rader

echo "<h3>Registrerte studenter</h3>";
echo "<table border='1'>";
echo "<tr>
        <th align='left'>Brukernavn</th> 
        <th align='left'>Fornavn</th> 
        <th align='left'>Etternavn</th>
        <th align='left'>Klassekode</th>
      </tr>";

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlResultat);
    $Brukernavn = $rad["brukernavn"];
    $Fornavn = $rad["fornavn"];
    $Etternavn = $rad["etternavn"];
    $Klassekode = $rad["klassekode"];

    echo "<tr> 
            <td>$Brukernavn</td> 
            <td>$Fornavn</td> 
            <td>$Etternavn</td>
            <td>$Klassekode</td>
          </tr>";
}

echo "</table>"; 


?>