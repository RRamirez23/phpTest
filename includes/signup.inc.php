<?php
include_once 'dbh.inc.php';

$email = $_POST['email'];
$username = $_POST['username'];

$check = "SELECT email, username, id FROM emails WHERE email = '$email';";

$result = mysqli_query($conn, $check);

$resultCheck = mysqli_num_rows($result);

if($resultCheck == 0){

    $insertSql = "INSERT INTO emails (email, username) VALUES('$email', '$username');";
    $insert = mysqli_query($conn, $insertSql);

    $insertRow = mysqli_fetch_assoc($insert);

    $emailId = $insertRow['id'];

    $tournamentSql = 'SELECT * FROM tournaments WHERE tournamentDate > CURRENT_TIMESTAMP() ORDER BY tournamentDate LIMIT 1;';
    $tournamentResult = mysqli_query($conn, $tournamentSql);

    $tournamentRow = mysqli_fetch_assoc($tournamentResult);

    $tournamentId = $tournamentRow['id'];

    $bridge = "INSERT INTO emails_tournaments(email_id, tournament_id) VALUES('$emailId','$tournamentId')";

} else {

    $insertSql = "INSERT INTO emails (email, username) VALUES('$email', 'stinky');";
    $insert = mysqli_query($conn, $insertSql);

}



header("Location:../scheduledMessage.php?signup=success");