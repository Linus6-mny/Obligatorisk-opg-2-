<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge et student som skal slettes  
/*  Programmet sletter det valgte student
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettstudentSkjema" name="slettstudentSkjema" onSubmit="return bekreft()">
  student <input type="text" id="student" name="student" required /> <br/>
  <input type="submit" value="Slett student" name="slettstudentKnapp" id="slettstudentKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettstudentKnapp"]))
    {	
      $student=$_POST ["student"];
	  
	  if (!$student)
        {
          print ("student m&aring; fylles ut");
        }
      else
        {
         include("db-tilkobling.php");
 /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE student='$student';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* student er ikke registrert */
            {
              print ("student finnes ikke");
            }
          else
            {	  
              $sqlSetning="DELETE FROM student WHERE student='$student';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("F&oslash;lgende student er n&aring; slettet: $student  <br />");
            }
        }
    }
?> 