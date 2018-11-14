<?php
require_once('includes/check_session.inc.php'); //check session
$page_title = 'Update a Author';
include('includes/header.inc.html');
require_once('../../mysqli_connect_capstone.php');
echo"<div class=\"page-header\"><h3>Updated</h3></div>";

$id = mysqli_real_escape_string($dbc, $_POST['id']);
$first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
$middle_initial = mysqli_real_escape_string($dbc, $_POST['middle_initial']);
$last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
$address = mysqli_real_escape_string($dbc, $_POST['address']);

$query = "UPDATE author SET first_name='$first_name' WHERE author_id='$id'";
$result = @mysqli_query($dbc, $query);
$query = "UPDATE author SET middle_initial='$middle_initial' WHERE author_id='$id'";
$result = @mysqli_query($dbc, $query);
$query = "UPDATE author SET last_name='$last_name' WHERE author_id='$id'";
$result = @mysqli_query($dbc, $query);
$query = "UPDATE author SET address='$address' WHERE author_id='$id'";
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
