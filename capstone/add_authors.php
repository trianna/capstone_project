<?php
 
require_once('includes/check_session.inc.php'); //check session
$page_title = 'Add a author';
include('includes/header.inc.html');
require_once('../../mysqli_connect_capstone.php');
?>
<div class="page-header"><h3>Add a author</h3></div>
<?php
if (isset($_POST['submitted']))
{
	# Write vars from from POST
    $first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
    $middle_initial = mysqli_real_escape_string($dbc, $_POST['middle_initial']);
    $last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
    $address = mysqli_real_escape_string($dbc, $_POST['address']);

    # Insert data in to database
    $query = "INSERT OR IGNORE INTO author (first_name, middle_initial, last_name, address) VALUES ('$first_name', '$middle_initial', '$last_name', '$address')";
    $result = @mysqli_query($dbc, $query);
    if ($result)
    {
        echo "<p><b>A new author has been added.</b></p>";
        echo "<a href=\"view_authors.php\">Show all author</a>";
    }
    else
    {
        echo "<p>The author could not be added due to a system error".mysqli_error($dbc)."</p>";
    }
}
//form runs first
mysqli_close($dbc);
?>

<form action="add_author.php" method="POST">

    <div class="form-group">
      <label class="col-form-label" for="inputDefault">First Name</label>
      <input name="first_name" type="text" class="form-control">

      <label class="col-form-label" for="inputDefault">Middle Initial</label>
      <input name="middle_initial" type="text" class="form-control">

      <label class="col-form-label" for="inputDefault">Last Name</label>
      <input name="last_name" type="text" class="form-control">

      <label class="col-form-label" for="inputDefault">Address</label>
      <input name="address" type="text" class="form-control">
    </div>

    <p><button type="submit" class="btn btn-success btn-sm" name="submit" value="Login">Submit</button>
    <button type="reset" class="btn btn-warning btn-sm" name="reset" value="Login">Reset</button></p>

    <input type="hidden" name="submitted" value="true">
</form>
<?php include('includes/footer.inc.html');?>
