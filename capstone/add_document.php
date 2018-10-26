<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Add a document!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div class="page-header">
	<h3>Add a document</h3>
</div>
<?php
if (isset($_POST['submitted'])) {
    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $database_id = mysqli_real_escape_string($dbc, $_POST['database_id']);
    $publication_id = mysqli_real_escape_string($dbc, $_POST['publication_id']);
    $publication_date = mysqli_real_escape_string($dbc, $_POST['publication_dat']);
    $volume = mysqli_real_escape_string($dbc, $_POST['volume']);
    $issue = mysqli_real_escape_string($dbc, $_POST['issue']);
    $pages = mysqli_real_escape_string($dbc, $_POST['pages']);
    $start_page = mysqli_real_escape_string($dbc, $_POST['start_page']);
    $epub_date = mysqli_real_escape_string($dbc, $_POST['epub_date']);
    $date = mysqli_real_escape_string($dbc, $_POST['date']);
    $artiicle_type = mysqli_real_escape_string($dbc, $_POST['article_type']);
    $short_title = mysqli_real_escape_string($dbc, $_POST['short_title']);
    $alternate_publication_id = mysqli_real_escape_string($dbc, $_POST['alternate_publication_id']);
    $doi = mysqli_real_escape_string($dbc, $_POST['pages']);
    $original_publication_id = mysqli_real_escape_string($dbc, $_POST['original_publication_id']);
    $reprint_edition = mysqli_real_escape_string($dbc, $_POST['reprint_edition']);
    $reviewed_item = mysqli_real_escape_string($dbc, $_POST['reviewed_item']);
    $legal_note = mysqli_real_escape_string($dbc, $_POST['legal_note']);
    $pmcid = mysqli_real_escape_string($dbc, $_POST['pmcid']);
    $nihmsid = mysqli_real_escape_string($dbc, $_POST['nihmsid']);
    $article_number = mysqli_real_escape_string($dbc, $_POST['article_number']);
    $accession_number = mysqli_real_escape_string($dbc, $_POST['accession_number']);
    $call_number = mysqli_real_escape_string($dbc, $_POST['call_number']);
    $label = mysqli_real_escape_string($dbc, $_POST['label']);
    $abstract = mysqli_real_escape_string($dbc, $_POST['abstract']);
    $notes = mysqli_real_escape_string($dbc, $_POST['notes']);
    $research_notes = mysqli_real_escape_string($dbc, $_POST['research_notes']);
    $url = mysqli_real_escape_string($dbc, $_POST['url']);
    $file_attachment_path = mysqli_real_escape_string($dbc, $_POST['file_attachment_path']);
    $figure = mysqli_real_escape_string($dbc, $_POST['figure']);
    $caption = mysqli_real_escape_string($dbc, $_POST['caption']);
    $access_date = mysqli_real_escape_string($dbc, $_POST['access_date']);
    $translated_author = mysqli_real_escape_string($dbc, $_POST['translated_author']);
    $translated_title = mysqli_real_escape_string($dbc, $_POST['translated_title']);
    $aricle_language = mysqli_real_escape_string($dbc, $_POST['article_language']);
    
    $query = "INSERT INTO article VALUES ('$title', '$author', '$date_published', '$pages', '$isbn13')";
    $result = @mysqli_query($dbc, $query);
    if ($result) {
        echo "<p><b>A new article has been added.</b></p>";
        echo "<a href=\"bookmark.php\">Show all books</a>";
    } else {
        echo "<p>The record could not be added due to a system error" . mysqli_error($dbc) . "</p>";
    }
}
// form runs first
mysqli_close($dbc);
?>

<form action="add.php" method="POST">

	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Title</label> <input
			name="title" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Author</label> <input
			name="author" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Year</label> <input
			name="date_published" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Number of Pages</label>
		<input name="pages" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">ISBN-13</label> <input
			name="isbn13" type="text" class="form-control">
	</div>

	<p>
		<button type="submit" class="btn btn-primary btn-sm" name="submit"
			value="Login">Submit</button>
		<button type="reset" class="btn btn-primary btn-sm" name="reset"
			value="Login">Reset</button>
	</p>

	<input type="hidden" name="submitted" value="true">
</form>
<?php include('includes/footer.inc.html');?>