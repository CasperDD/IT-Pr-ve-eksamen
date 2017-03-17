<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
      <INPUT TYPE = "Text" VALUE ="Tilfj navn" NAME = "nytNavn"/>
        <?php
            $personer = array("Oliver", "Casper", "Mikkel", "Rune", "Emil", "Mads", "Lucas", "Andreas", "Christoffer", "Simon", "Anders", "Jonas");

            // viser alle navn
            foreach($personer as $navn) {
                echo "$navn <br>";
            }
        ?>
        <h3>Grupper</h3>
        <?php
            // Gruppe indeler
            // opretter variabler
            $brugteNumre = array(false, false, false, false, false, false, false, false, false, false, false, false);
            $antalGrupper = 5;
            $gruppeNummer = 0;

            // indeler personer i grupper
            for ($i = 0; $i < count($personer); $i++)
            {
              $nummer = rand(0,11);
              $plus = 0;

              // angiver gruppenummeret
              $gruppeNummer++;

              // Tjekker gruppenummeret
              if ($gruppeNummer >= $antalGrupper)
              {
                $gruppeNummer = 1;
              }

              // finder en person der ikke er taget i forvejen
              while ($brugteNumre[$nummer + $plus])
              {
                if (($nummer + $plus + 1) >= count($personer))
                {
                  $plus = 0;
                  $nummer = 0;
                }
                else
                {
                  $plus++;
                }
              }

              // markere den som brugt og udskriver personen
              $brugteNumre[$nummer + $plus] = true;
              echo $personer[$nummer + $plus] . " " . $gruppeNummer;
            }

            echo "<br>";
          //  }
        ?>


    </body>
</html>
