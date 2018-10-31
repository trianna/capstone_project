<?php
require_once('includes/check_session.inc.php'); //check session
$page_title = 'Welcome to my Site!';
include('includes/header.inc.html');
require_once('../../mysqli_connect_capstone.php');
?>
<div class="page-header"><h3>Authors</h3></div>
<?php
echo ("<div style=\"text-align:center\">");
echo ("<a href=\"add_author.php\">Add a record</a><p>");
echo ("<a href=\"searchform.php\">Search records</a><p>");
echo ("</div>");
$query = "SELECT * FROM author";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num > 0)
{
    echo "<p><b>There are currently $num authors.</b></p>";
    echo"<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\">";
    
	echo "<tr><th scope=\"col\">ID</th>
		<td scope=\"col\">First Name</td></th>
		<th scope=\"col\">M.I.</th>
		<th scope=\"col\">Last Name</th>
		<th scope=\"col\">Address</th>";
	
	echo "<th><center>*</center></th><th><center>*</center></th></tr>";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
    {
        echo "<tr scope=\"row\"><td>".$row['author_id']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['middle_initial']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['addresss']."</td>";
        echo "<td><a href=\"deleteconfirm_author.php?id=".$row['author_id']."\">Delete</a></td>";
        echo "<td><a href=\"update_author_form.php?id=".$row['author_id']."\">Update</a></td></tr>";
    }
    echo "</table>";
    mysqli_free_result ($result); //frees memory
}
else
{
    echo '<p>There are currently no authors.</p>';
}
mysqli_close($dbc);
include('includes/footer.inc.html');
?>
