<?php
# Finished by @pmwright 10/18/2018
require_once ('includes/check_session.inc.php'); // check session
$page_title = "Delete a Document";
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
echo "<div class=\"page-header\"><h3>Delete Document</h3></div>";
$id = $_GET['id'];
$query = "DELETE FROM document WHERE id=$id";
$result = mysqli_query($dbc, $query);
if ($result) {
    echo "The selected document has been deleted.";
} else {
    echo "The selected document could not be deleted.";
}
echo "<p><a href=\"index.php\">Home</a></p>";
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>