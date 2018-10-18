<?php
require_once ('includes/check_session.inc.php'); // check session

# Title of Page
$page_title = 'Update a Keyword';
include ('includes/header.inc.html');

# Import database connection file (needs to be mysqli_connect_capstone.php)
require_once ('../../mysqli_connect_capstone.php');
echo "<div class=\"page-header\"><h3>Updated</h3></div>";

$id = mysqli_real_escape_string($dbc, $_POST['id']);
$term = mysqli_real_escape_string($dbc, $_POST['term']);
#		  UPDATE table SET values=$vars WHERE primary_key=$id
$query = "UPDATE keyword SET keyword_term='$term' WHERE keyword_id='$id'";
$result = @mysqli_query($dbc, $query);
if ($result) {
	
	# Change text and referenced pages to match table
    echo "<div class=\"alert alert-dismissible alert-success\"><strong>The selected keyword has been updated.</strong>.</div>";
    
    echo "<div class=\"btn-group-vertical\" data-toggle=\"buttons\">";
    echo "<button onclick=\"location.href='view_keywords.php'\" type=\"button\" class=\"btn btn-outline-primary\">View Keywords</button>";
    echo "<button onclick=\"location.href='index.php'\" type=\"button\" class=\"btn btn-outline-primary\">Home</button>";
    echo "</div>";
} else {
    echo "<div class=\"alert alert-dismissible alert-danger\"><strong>The record could not be updated due to a system error: " . mysqli_error($dbc) . "</strong>.</div>";
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>