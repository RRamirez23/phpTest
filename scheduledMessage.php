<?php
    include_once 'includes/dbh.inc.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>


    
</head>
<body>
    
    

    <video autoplay muted loop id="myVideo">
        <source src="rain.mp4" type="video/mp4">
    </video>

    <div class="content">
        <h1>Heading</h1>
        <p>Lorem ipsum...</p>
        <!-- Use a button to pause/play the video with JavaScript -->
        <button id="myBtn" onclick="myFunction()">Pause</button>
    </div>


    <?php
    // $dayofWeek = date("w");


    // switch($dayofWeek){
    //     case 1:
    //         echo "<p class='dayText'>Today is Monday</p>";
    //         break;
    //     case 2:
    //         echo "<p class='dayText'>Today is Tuesday</p>";
    //         break;
    //     case 3:
    //         echo "<p class='dayText'>Today is Wednesday</p>";
    //         break;
    //     case 4:
    //         echo "<p class='dayText'>Today is Thursday</p>";
    //         break;
    //     case 5:
    //         echo "<p class='dayText'>Today is Friday</p>";
    //         break;
    //     case 6:
    //         echo "<p class='dayText'>Today is Saturday</p>";
    //         break;
    //     case 0:
    //         echo "<p class='dayText'>Today is Sunday</p>";
    //         break;

    // }

    function getAllEmails(){
        $sql = "SELECT * FROM emails;";

        $result = mysqli_query($GLOBALS['conn'], $sql);

        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            $i = 0;

            while($row = mysqli_fetch_assoc($result)){
                
                echo $row['email']."</br>";

                
            }

        }
    }

//    getAllEmails();

    function getTournamentsAttended($email){

        $sql = "SELECT tournaments.tournamentDate as 'Tournament Date', games.name as 'Game Played', emails.email 
        FROM emails 
        JOIN emails_tournaments et ON emails.id = et.email_id 
        JOIN tournaments on et.tournament_id = tournaments.id 
        JOIN games on tournaments.gameID = games.id
        WHERE emails.email = '$email';
        ;";

        $result = mysqli_query($GLOBALS['conn'], $sql);

        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            $i = 0;

            while($row = mysqli_fetch_assoc($result)){

                echo json_encode($row)."</br>";

            }

        }

    }

//    getTournamentsAttended("Testemail@notreal.com");

    function getAttendees($date){

        $sql = "SELECT tournaments.id as 'Tournament ID', tournaments.tournamentDate as 'Date Held', games.name as 'Game', emails.email as 'Participants' 
        FROM tournaments 
        JOIN games on tournaments.gameID = games.id 
        JOIN emails_tournaments et on tournaments.id = et.tournament_id 
        JOIN emails on et.email_id = emails.id 
        where tournaments.tournamentDate = '$date';";

        $result = mysqli_query($GLOBALS['conn'], $sql);
       
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            $i = 0;

            while($row = mysqli_fetch_assoc($result)){

                echo json_encode($row)."</br>";

            }

        }

    }

//    getAttendees("2022-05-08");

    function getNextTourney(){
        $sql = 'SELECT * 
        FROM tournaments 
        WHERE tournamentDate > CURRENT_TIMESTAMP() 
        ORDER BY tournamentDate LIMIT 1;';

        $result = mysqli_query($GLOBALS['conn'], $sql);

        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            $i = 0;

            while($row = mysqli_fetch_assoc($result)){
                
                echo "<p class ='subText'> Next Tournament</p>";
                echo "<p class ='dayText'>".date_format(date_create($row["tournamentDate"]), ' l jS \a\t g:ia')."</p></br>";



            }

        }

    }

    getNextTourney();

    function getAttendeesR($date){
        $sql = "SELECT tournaments.id as 'Tournament ID', tournaments.tournamentDate as 'Date Held', games.name as 'Game', emails.email as 'Participants' 
            FROM tournaments 
            JOIN games on tournaments.gameID = games.id 
            JOIN emails_tournaments et on tournaments.id = et.tournament_id 
            JOIN emails on et.email_id = emails.id 
            where tournaments.tournamentDate = '$date'
            ORDER BY RAND();";
        
        $result = mysqli_query($GLOBALS['conn'], $sql);
        
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0){

            $i = 0;

            while($row = mysqli_fetch_assoc($result)){

                echo "<p style='color:white'>".json_encode($row)."</p></br>";

            }

        }
        
    
    }

//    getAttendeesR("2022-05-08");

    function getNumberofAttendees($tournamentDate){
        $sql = "SELECT count(*) as 'Count'
        FROM emails
        JOIN emails_tournaments et on emails.id = et.email_id
        JOIN tournaments on et.tournament_id = tournaments.id
        WHERE tournaments.tournamentDate = '$tournamentDate';";

        $result = mysqli_query($GLOBALS['conn'], $sql);

        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            $i = 0;

            while($row = mysqli_fetch_assoc($result)){

                echo "<p style='color:white'>".$row["Count"]."</p></br>";

            }

        }

    }
//    getNumberofAttendees("2022-05-08");


    

    




    ?>

    <script>
        // Get the video
        var video = document.getElementById("myVideo");

        // Get the button
        var btn = document.getElementById("myBtn");

        // Pause and play the video, and change the button text
        function myFunction() {
        if (video.paused) {
            video.play();
            btn.innerHTML = "Pause";
        } else {
            video.pause();
            btn.innerHTML = "Play";
        }
        }
    </script>
</body>
</html>
