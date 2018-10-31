<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Welcome to my Site!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div class="page-header">
	<h3>Entries</h3>
</div>
<?php
echo ("<div style=\"text-align:center\">");
echo ("<a href=\"add.php\">Add a Document</a><p>");
echo ("<a href=\"searchform.php\">Search records</a><p>");
echo ("</div>");

//Will this code work for pagination? 10/17/brandon;
$display = 20;
if(isset($_GET['p'])&&is_numeric($_GET['p'])) {
	$pages = $_GET['p'];
}else{
$query = "SELECT COUNT(id) FROM document";
$result = @mysqli_query($dbc, $query);
$row = @mysqli_fetch_array($result, MYSQL_NUM);
$records = $row[0];
if($records > $display) {
$pages = ceil($records/$display);
}else{
	$pages = 1;
}
}
//or should I look into this "https://code.tutsplus.com/tutorials/how-to-paginate-data-with-php--net-2928";

$query = "SELECT * FROM document 
			JOIN publication ON article.publication_id = publication.publication_id 
			JOIN article_author ON article.article_id = article_author.article_id
			JOIN author ON article_author.author_id = author.author_id";

$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num > 0) {
    echo "<p><b>There are currently $num entries.</b></p>";
    echo "<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\"><tr>

			<th scope=\"col\">Title</th>
			<th scope=\"col\">TYPE</th>
			<th scope=\"col\">Authors</th>
			<th scope=\"col\">Pub. Date</th>
			<th scope=\"col\">PUBLICATION</th>
			<th scope=\"col\">VOLUME</th>
			<th scope=\"col\">ISSUE</th>
			<th scope=\"col\">PAGES</th>
			<th scope=\"col\">START PAGE</th>
			<th scope=\"col\">EPUB DATE</th>
			<th scope=\"col\">SHORT TITLE</th>
			<th scope=\"col\">ALT. PUB.</th>
			<th scope=\"col\">DOI</th>
			<th scope=\"col\">ORIGINAL PUB.</th>
			<th scope=\"col\">REPRINT ED.</th>
			<th scope=\"col\">REVIEWED</th>
			<th scope=\"col\">LEGAL NOTE</th>
			<th scope=\"col\">PMCID</th>
			<th scope=\"col\">NIHMSID</th>
			<th scope=\"col\">DOCUMENT NUMBER</th>
			<th scope=\"col\">ACCESSION NUMBER</th>
			<th scope=\"col\">CALL NUMBER</th>
			<th scope=\"col\">LABEL</th>
			<th scope=\"col\">ABSTRACT</th>
			<th scope=\"col\">NOTES</th>
			<th scope=\"col\">RESEARCH NOTES</th>
			<th scope=\"col\">URL</th>
			<th scope=\"col\">FILE ATTACHMENT PATH</th>
			<th scope=\"col\">FIGURE</th>
			<th scope=\"col\">CAPTION</th>
			<th scope=\"col\">ACCESS DATE</th>
			<th scope=\"col\">TRANSLATED AUTHOR</th>
			<th scope=\"col\">TRANSLATED TITLE</th>
			<th scope=\"col\">DOCUMENT LANGUAGE</th>
			<th scope=\"col\">FULL TEXT</th>

			<th scope=\"col\">DELETE</th>
			<th scope=\"col\">UPDATE</th>
			

			<th><center>*</center></th>
			<th><center>*</center></th></tr>";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr scope=\"row\"><td>" . $row['article.title'] . "</td>";
        echo "<td>" . $row['article_type'] . "</td>";
        echo "<td><a href=\"view_authors.php?id=" . $row['document_id'] . "\">View Authors</a>";
        echo "<td>" . $row['publication_date'] . "</td>";
        echo "<td>" . $row['publication.title'] . "</td>";
        echo "<td>" . $row['volume'] . "</td>";
        echo "<td>" . $row['issue'] . "</td>";
        echo "<td>" . $row['pages'] . "</td>";
        echo "<td>" . $row['start_page'] . "</td>";
        echo "<td>" . $row['epub_date'] . "</td>";
        echo "<td>" . $row['short_title'] . "</td>";
        echo "<td>" . $row['alternate_publication_id'] . "</td>";
        echo "<td>" . $row['DOI'] . "</td>";
        echo "<td>" . $row['original_publication_id'] . "</td>";
        echo "<td>" . $row['reprint_edition'] . "</td>";
        echo "<td>" . $row['reviewed_item'] . "</td>";
        echo "<td>" . $row['legal_note'] . "</td>";
        echo "<td>" . $row['PMCID'] . "</td>";
        echo "<td>" . $row['NIHMSID'] . "</td>";
        echo "<td>" . $row['document_number'] . "</td>";
        echo "<td>" . $row['accession_number'] . "</td>";
        echo "<td>" . $row['call_number'] . "</td>";
        echo "<td>" . $row['label'] . "</td>";
        echo "<td>" . $row['abstract'] . "</td>";
        echo "<td>" . $row['notes'] . "</td>";
        echo "<td>" . $row['research_notes'] . "</td>";
        echo "<td>" . $row['URL'] . "</td>";
        echo "<td>" . $row['file_attachment_path'] . "</td>";
        echo "<td>" . $row['figure'] . "</td>";
        echo "<td>" . $row['caption'] . "</td>";
        echo "<td>" . $row['access_date'] . "</td>";
        echo "<td>" . $row['translated_author'] . "</td>";
        echo "<td>" . $row['translated_title'] . "</td>";
        echo "<td>" . $row['document_language'] . "</td>";
        echo "<td>" . $row['full_text'] . "</td>";
        
        echo "<td><a href=\"deleteconfirm_document.php?id=" . $row['article_id'] . "\">Delete</a></td>";
        echo "<td><a href=\"update_document_form.php?id=" . $row['article_id'] . "\">Update</a></td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result); // frees memory
} else {
    echo '<p>There are currently no records.</p>';
}

mysqli_close($dbc);

include('includes/footer.inc.html');
?>

