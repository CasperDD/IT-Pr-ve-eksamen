<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
      <INPUT TYPE = "Text" VALUE ="Tilfj navn" NAME = "nytNavn"/>
        <?php
            $personer = array("Oliver", "Casper", "Mikkel", "Kalle", "Emil", "Mads", "Lucas", "Andreas", "Christoffer", "Simon", "Anders", "Jonas");

            // viser alle navn
            foreach($personer as $navn) {
                echo "$navn <br>";
            }
        ?>
        <h3>Grupper</h3>
        <?php
            // Gruppe indeler
            // opretter variabler
            $brugteNumre = array();
            $antalGrupper = 5;
            $antalPersoner = count($personer);
            $gruppeNummer = 0;
            $grupper = array_fill_keys($personer, '1');

            // fra "stackoverflow"
            for ($i = 0; $i <= $antalPersoner; $i++)
            {
              array_push($brugteNumre, false);
            }
            // slut

            // indeler personer i grupper
            for ($i = 0; $i < $antalPersoner; $i++)
            {
              $nummer = rand(0, ($antalPersoner - 1));
              $plus = 0;

              // Tjekker gruppenummeret
              if ($gruppeNummer >= $antalGrupper)
              {
                $gruppeNummer = 1;
              }
              else
              {
                $gruppeNummer++;
              }

              // finder en person der ikke er taget i forvejen
              while ($brugteNumre[$nummer + $plus])
              {
                if (($nummer + $plus + 1 ) >= $antalPersoner)
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
              echo $personer[$nummer + $plus] . " " . $gruppeNummer . " ";
              $grupper[$personer[$nummer + $plus]] = $gruppeNummer;
            }
            echo "<br>";

            for ($i = 0; $i < $antalGrupper ; $i++)
            {
              $print = " ";

              foreach ($grupper as $key => $value)
              {
                //echo "Key:" . $key . "Value:" . $value ."<br />";

                if ($i+1 == $value)
                {
                  $print = $print . $key . "<br>";
                }

              }

              echo $i+1;
              echo $print;
            }
          //  }
        ?>
    </body>
</html>
