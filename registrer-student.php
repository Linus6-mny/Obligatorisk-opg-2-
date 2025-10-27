<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 /* registrer-poststed 
  Programmet lager et html-skjema for å registrere et poststed
  Programmet registrerer data (postnr og poststed) i databasen
*/
?> 

<h3>Registrer student</h3>
<<form method="post" action="registrer-student.php" id="registrerStudentSkjema" name="registrerStudentSkjema">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
   Fornavn<input type="text" id="fornavn" name="fornavn" required /> <br/> 
   Etternavn<input type="text" id="etternavn" name="etternavn" required /> <br/>
   Klassekode<input type="text" id="klassekode" name="klassekode" required /> <br/>
  <input type="submit" value="Registrer Student" id="registrerstudentKnapp" name="registrerstudentKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>


<?php 
  if (isset($_POST ["registrerStudentKnapp"]))
    {
      echo "<p>Skjema mottatt – knappen fungerer!</p>";
      $brukernavn= $_POST["brukernavn"];
      $fornavn= $_POST ["fornavn"];
      $etternavn= $_POST ["etternavn"];
      $klassekode= $_POST ["klassekode"];

      if (!$brukernavn || !$fornavn|| !$etternavn || !$klassekode)
        {
          print ("Alle felt m&aring; fylles ut, brukernavn , fornavn, etternavn og klassekode m&aring; fylles ut");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader!=0)  /* poststedet er registrert fra før */
            {
              print ("Student er registrert fra f&oslashr");
            }
          else
            {
              $sqlSetning="INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
                /* SQL-setning sendt til database-serveren */

              print ("F&oslash;lgende poststed er n&aring; registrert: $brukernavn, $fornavn, $etternavn, $klassekode");

               
            }
        }
    }
?> 