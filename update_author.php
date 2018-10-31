<?php
require_once('includes/check_session.inc.php'); //check session
$page_title = 'Update a Author';
include('includes/header.inc.html');
require_once('../../mysqli_connect_capstone.php');
echo"<div class=\"page-header\"><h3>Updated</h3></div>";

$id = mysqli_real_escape_string($dbc, $_POST['id']);
$term = mysqli_real_escape_string($dbc, $_POST['term']);

$query = "UPDATE author SET author_term='$term' WHERE author_id='$id'";
$result = @mysqli_query($dbc, $query);
if ($result)
{
    echo "<div class=\"alert alert-dismissible alert-success\"><strong>The selected author has been updated.</strong>.</div>";

    echo "<div class=\"btn-group-vertical\" data-toggle=\"buttons\">";
    echo "<button onclick=\"location.href='view_authors.php'\" type=\"button\" class=\"btn btn-outline-primary\">View Authors</button>";
    echo "<button onclick=\"location.href='index.php'\" type=\"button\" class=\"btn btn-outline-primary\">Home</button>";
    echo "</div>";
}
else
{
    echo "<div class=\"alert alert-dismissible alert-danger\"><strong>The record could not be updated due to a system error: ".mysqli_error($dbc)."</strong>.</div>";
}
mysqli_close($dbc);
include('includes/footer.inc.html');
?>
