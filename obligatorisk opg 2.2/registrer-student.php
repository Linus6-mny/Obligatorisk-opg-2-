<?php
/* registrer-student.php
   Lager et skjema for å registrere en student
   Registrerer data i databasen
*/
?>

<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
  Brukernavn: <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  Fornavn: <input type="text" id="fornavn" name="fornavn" required /> <br/>
  Etternavn: <input type="text" id="etternavn" name="etternavn" required /> <br/>
  Klassekode: <input type="text" id="klassekode" name="klassekode" required /> <br/>
  
  <input type="submit" value="Registrer student" id="registrerstudentKnapp" name="registrerstudentKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerstudentKnapp"])) {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
        print("Alle felt må fylles ut.");
    } else {
        include("db-tilkobling.php");

        $sql = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $resultat = mysqli_query($db, $sql) or die("Feil ved henting av data.");

        if (mysqli_num_rows($resultat) != 0) {
            print("Studenten finnes allerede.");
        } else {
            $sql = "INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
            mysqli_query($db, $sql) or die("Feil ved registrering.");
            print("✅ Studenten <strong>$brukernavn</strong> er nå registrert!");
        }
    }
}
?>
