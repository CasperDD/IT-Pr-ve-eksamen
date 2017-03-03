<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
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
            $brugteNumre = array(false, false, false, false, false, false, false, false, false, false, false, false);
            $antalGrupper = 4;
            $personerPrGruppe = (12/$antalGrupper);

            for ($i = 0; $i < 4; $i++)
            {
                for ($j = 0; $j < $personerPrGruppe; $j++)
                {
                    $nummer = rand(0,11);
                    $plus = 0;

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

                    $brugteNumre[$nummer + $plus] = true;
                    echo $personer[$nummer + $plus];


                    /*
                    if (!$brugteNumre[$nummer]) 
                    {
                        echo $personer[$nummer];
                    }
                    else
                    {
                        echo $personer[$nummer-1];
                    }
                    */
                }
                

                echo "<br>";
            }
        ?>


    </body>
</html>