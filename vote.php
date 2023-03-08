<?php
include("connection.php");

// Check if the user is logged in and hasn't voted yet
session_start();
if(!isset($_SESSION['ID']) || $_SESSION['voted'] == 1){
    header("Location: index.php");
    exit();
}

// If the form is submitted, update the candidate's vote count and mark the user as having voted
if(isset($_POST['submit_vote'])){
    $voter_id = $_POST['voter_id'];
    
    // Loop through each position
    $sql_positions = "SELECT * FROM positions";
    $result_positions = mysqli_query($conn, $sql_positions);
    while($row_positions = mysqli_fetch_assoc($result_positions)){
        $position_id = $row_positions['PositionID'];
        $candidate_id = $_POST["position-$position_id"];
        
        // Update the candidate's vote count in the database
        $sql_update = "UPDATE candidates SET `number of votes` = `number of votes` + 1 WHERE `candidate ID` = '$candidate_id'";
        mysqli_query($conn, $sql_update);
    }
    
    // Mark the user as having voted in the database
    $sql_mark_voted = "UPDATE voters SET voted = 1 WHERE ID = '$voter_id'";
    mysqli_query($conn, $sql_mark_voted);
    
    // Redirect the user back to the home page
    header("Location: home_page.php");
    exit();
}

// If the user is allowed to vote, display the list of positions and candidates
$sql_positions = "SELECT * FROM positions";
$result_positions = mysqli_query($conn, $sql_positions);

if(mysqli_num_rows($result_positions) > 0) {
    while($row_positions = mysqli_fetch_assoc($result_positions)){
        $position_id = $row_positions['PositionID'];
        $position_name = $row_positions['Name'];

        // Display the position name
        echo "<h3>$position_name</h3>";

        // Get the candidates for this position from the database
        $sql_candidates = "SELECT * FROM candidates WHERE position ID = '$position_id'";
        $result_candidates = mysqli_query($conn, $sql_candidates);

        // Display a form to allow the user to vote for a candidate
        echo "<form method='post'>";
        while($row_candidates = mysqli_fetch_assoc($result_candidates)){
            $candidate_id = $row_candidates['CandidateID'];
            $candidate_name = $row_candidates['Name'];
            $num_of_votes = $row_candidates['num_of_votes'];

            echo "<label>
                    <input type='radio' name='position-$position_id' value='$candidate_id' required>
                    $candidate_name ($num_of_votes votes)
                  </label><br>";
        }
        echo "<br>";
    }
}
echo "<input type='hidden' name='voter_id' value='".$_SESSION['ID']."'>";
echo "<input type='submit' name='submit_vote' value='Submit Vote'>";
echo "</form>";

?>
