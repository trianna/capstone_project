<?php
require_once('includes/check_session.inc.php'); //check session
$page_title = 'Update an Author';
include('includes/header.inc.html');
require_once('../../mysqli_connect_capstone.php');
echo"<div class=\"page-header\"><h3>Update Authors</h3></div>";
$id = $_GET['id'];
$query = "SELECT * FROM author WHERE author_id=$id";
$result = @mysqli_query ($dbc, $query);
$num = mysqli_num_rows($result);
if ($num > 0)
{
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        ?>
        <form action="update_author.php" method="post">
            Author: <input name="term" size=50 value="<?php echo $row['author_term']; ?>"><br/>
            <input type="submit" value="update">
            <input type="reset" value="reset">
            <input type="hidden" name="id" value="<?php echo $row['author_id'];?>">
        </form>
<?php
    }
}
mysqli_close($dbc);
include('includes/footer.inc.html');
?>
