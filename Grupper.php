<!-- Icons https://www.w3schools.com/icons/icons_reference.asp -->

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="Billeder\teacher.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-home fa-fw"></i>  Hjem</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Projekter</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-question-circle fa-fw"></i>  Om</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Projekter</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Klasser</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5>Opret grupper</h5>
    //    <?php
    //    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //      $valgtKlasse = test_input($_POST["Klasse"]);
    //    } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Vælg klasse:
          <select name="Klasse">

        <?php
          $valgtKlasseNavn = array('0' => "0");

          $servername = "localhost";
          $username = "root";
          $password = "vmb26qts";
          $dbname = "database1";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT KlasseID, KNavn FROM klasse";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo '<option value="' . $row["KlasseID"] . '">' . $row["KNavn"] . '</option>';
              $valgtKlasseNavn[$row["KlasseID"]] = $row["KNavn"];
            }
          } else {
            echo "0 results";
          }
          $conn->close();
          ?>
          </select>
          <input type="submit" name="Indel grupper" value="formSubmit">
      </form>

      <?php
      $valgtKlasse = "";

      if(isset($_POST['formSubmit']) ) {
        $valgtKlasse = $_POST['Klasse'];
      }

      echo $valgtKlasse;
      echo $valgtKlasseNavn[$valgtKlasse];
      ?>
      </div>
    </div>
  </div>
  <hr>

<!--********** Random bliver inkluderet starter her og designet ********** -->
  <div class="w3-container">
    <!-- random init -->
    <?php
    // init personer
        $personer = array();

        $servername = "localhost";
        $username = "root";
        $password = "vmb26qts";
        $dbname = "database1";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT FNavn, LNavn FROM elev WHERE KlasseID='". $valgtKlasse . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            array_push($personer, $row["FNavn"] . " " . $row["LNavn"]);
          }
        } else {
          echo "0 results";
        }
        $conn->close();


        // viser alle navn
    //      echo "<h5>Elever i klassen</h5>";
    //    foreach($personer as $navn) {
    //        echo "$navn <br>";
    //    }
    ?>
    <h5>Grupper</h5>
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
          $grupper[$personer[$nummer + $plus]] = $gruppeNummer;
        }
    ?>

    <?php
    for ($h = 1; $h <= $antalGrupper ; $h++)
    {
      echo '<h6>gruppe ' . $h . '</h6>';
      echo '<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">';

      foreach ($grupper as $key => $value)
      {
        //echo "Key:" . $key . "Value:" . $value ."<br />";

        if ($h == $value)
        {
          echo "<tr><td>". $key . "</td></tr>";
        }
      }

      echo "</table>";
    }
    ?>
    <!--
    <h6>gruppe 1 </h6>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
  -->
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  </div>
  <br>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
