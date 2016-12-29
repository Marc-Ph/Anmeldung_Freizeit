<!Doctype HTML>
<html>
<head>
<title>Test Seite f&uuml;r die Anmeldung zur Jugendfreizeit 2017 </title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
</head>
<body>

                    <div id="header">
                            <img src="Alternative.png">
                            <h1>Anmeldung</h1>
                    </div>

<form method="post">
    <div class="vorname">
    <label>Vorname:</label>
    <input type="text" name="vname" size="20" style="margin-top: 8%;"/>
    <br/>
    </div>
    <label>Nachname:</label>
    <input type="text" name="nname" size="20"/>
    <br/>
    <label>Geburtstag:</label>
    <input type="text" name="bday" size="20"/>
    <br/>
    <label>Stra&szlig;e:</label>
    <input type="text" name="street" size="20"/>
    <br/>
    <label>PLZ:</label>
    <input type="text" name="zip" size="20"/>
    <br/>
    <label>Stadt:</label>
    <input type="text" name="city" size="20"/>
    <br/>
    <label>Telefonnummer:</label>
    <input type="text" name="tel" size="20"/>
    <br/>
    <label>Handynummer (Teilnehmer):</label>
    <input type="text" name="mob" size="20"/>
    <br/>
    <label>E-Mail Adresse:</label>
    <input type="text" name="mail" size="20"/>
    <br/>
    <label>Sonstiges:</label>
    <textarea onfocus="clearContents(this);" name="etc">Hier bitte sonstige Fragen, Wünsche und Anregungen eintragen.</textarea>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Anmelden"> 
</form>


    <?php 
    if(isset($_POST['submit'])){
        
        include 'handler.php';

            if( empty($vorname) || empty( $nachname) || empty($bday)|| empty($zip)||
                empty($city) || empty($mail) || empty($street) || empty($tel) ||
                empty($mob)){      
                echo    '<script type="text/javascript" language="Javascript"> 
                        alert("Bitte fülle alle Felder aus!") 
                        </script> '; 
                   
                }
            else if (!ctype_digit($tel)){
                echo    '<script type="text/javascript" language="Javascript"> 
                        alert("Die Telefonnummer darf nur aus Zahlen bestehen!") 
                        </script> '; 
                }
            else if (!ctype_digit($mob)){
                echo    '<script type="text/javascript" language="Javascript"> 
                        alert("Die Handynummer darf nur aus Zahlen bestehen!") 
                        </script> '; 
                }

                else{
                        $day = substr($bday,0,2);
                        $month = substr($bday,3,2);
                        $year = substr($bday,6,4);
                        $bday = $year ."-" .$month ."-".$day;

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "freizeit";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "INSERT INTO teilnehmer (firstname, lastname, birthday, email, street, zip, city, telephone, mobile, etc) 
                        VALUES ('$vorname', '$nachname', '$bday', '$mail', '$street', '$zip', '$city', '$tel', '$mob', '$etc')";
               
               if ($conn->query($sql) === TRUE) 
                {
                 echo    '<script type="text/javascript" language="Javascript"> 
                        alert("Du wurdest in die Datenbank aufgenommen!") 
                        </script> '; 
                   
                } else {

                        echo    '<script type="text/javascript" language="Javascript"> 
                        alert("Es ist ein Fehler bei der Datenbank verbindung aufgetreten." ) 
                        </script> ';
}
        $conn->close();
    }     
}
    ?>

    <script type="text/javascript" language="Javascript"> 
    function clearContents(element) {
     element.value = '';
    }
    </script> 

</body>
</html>