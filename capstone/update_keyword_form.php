<?php
require_once ('includes/check_session.inc.php'); // check session

# Title of page
$page_title = 'Update a Keyword';
include ('includes/header.inc.html');

# Import database connection file (needs to be mysqli_connect_capstone.php)
require_once ('../../mysqli_connect_capstone.php');
echo "<div class=\"page-header\"><h3>Update Keywords</h3></div>";
$id = $_GET['id'];

# 		  SELECT * FROM table WHERE primary_key=$id
$query = "SELECT * FROM keyword WHERE keyword_id=$id";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);
if ($num > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
<!-- Make sure this points to the correct update_ page -->
<form action="update_keyword.php" method="post">

	<!-- Table values to be updated. Make sure to update fields and id -->
	Keyword: <input name="term" size=50
		value="<?php echo $row['keyword_term']; ?>"><br /> <input
		type="submit" value="update"> <input type="reset" value="reset"> <input
		type="hidden" name="id" value="<?php echo $row['keyword_id'];?>">
</form>
<?php
    }
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>