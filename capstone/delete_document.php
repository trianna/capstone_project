<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = "Delete a Document";
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
echo "<div class=\"page-header\"><h3>Delete</h3></div>";
$id = $_GET['id'];
$query = "DELETE FROM document WHERE id=$id";
$result = mysqli_query($dbc, $query);
if ($result) {
    echo "The selected record has been deleted.";
} else {
    echo "The selected record could not be deleted.";
}
echo "<p><a href=\"index.php\">Home</a></p>";
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>