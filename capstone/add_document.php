<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Add a document!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="page-header">
	<h3>Add a document</h3>
</div>
<?php
if (isset($_POST['submitted'])) {
	$author_id = mysqli_real_escape_string($dbc, $_POST['author_id']);
	
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
    
    $query = "INSERT INTO document VALUES ('$title', '$database_id', '$publication_id', '$publication_date', '$volume', '$issue', '$pages', '$start_page', 
'$epub_date', '$date', '$artiicle_type', '$short_title', '$alternate_publication_id', '$doi', '$original_publication_id', '$reprint_edition', '$reviewed_item', 
'$legal_note', '$pmcid', '$nihmsid', '$article_number', '$accession_number', '$call_number', '$label', '$abstract', '$notes', '$research_notes', 
'$url', '$file_attachment_path', '$figure', '$caption', '$access_date', '$translated_author', '$translated_title', '$aricle_language')";
    $result = @mysqli_query($dbc, $query);
    if ($result) {
        echo "<p><b>A new article has been added.</b></p>";
        echo "<a href=\"view_document.php\">Show all documents</a>";
    } else {
        echo "<p>The document could not be added due to a system error" . mysqli_error($dbc) . "</p>";
    }
}
// form runs first
mysqli_close($dbc);
?>

<script>
$(document).ready(function(){
	$("#show").click(function(){
	    $("#form1").toggle();
	    $("#show").prop('value', 'Save');
	});
});
</script>

<button class="btn btn-primary btn-sm" id="show">Hide</button>


<form id="form1" action="add_document.php" method="POST">

	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Title</label> <input
			name="title" type="text" class="form-control">
	</div>
	<!--  
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Author</label> <input
			name="author" type="text" class="form-control">
	</div>
	-->		
	<!--  add author iframe  -->
	
	<iframe src="add_authors.php" height="500" width="100%" ></iframe>
	<p>This is IFrame</p>
	    <button onclick="displayIframe()">Click me</button>
	  <div id="iframeDisplay"></div>  
	
	<script>
	    function displayIframe() {
	        document.getElementById("iframeDisplay").innerHTML = "<iframe src=\"add_authors.php\" height=\"200\" width=\"300\" ></iframe>";
	
	    }
	</script>
		
	
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">publication_id</label> <input
			name="publication_id" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">publication_date</label>
		<input name="publication_date" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">volume</label> <input
			name="volume" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">issue</label> <input
			name="issue" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">pages</label> <input
			name="pages" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">start_page</label> <input
			name="start_page" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">epub_date</label> <input
			name="epub_date" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">document_type</label> <input
			name="document_type" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">short_title</label> <input
			name="short_title" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">alternate_publication_id</label> <input
			name="alternate_publication_id" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">DOI</label> <input
			name="DOI" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">original_publication_id</label> <input
			name="original_publication_id" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">reprint_edition</label> <input
			name="reprint_edition" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">reviewed_item</label> <input
			name="reviewed_item" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">legal_note</label> <input
			name="legal_note" type="text" class="form-control">
	</div><div class="form-group">
		<label class="col-form-label" for="inputDefault">PMCID</label> <input
			name="PMCID" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">NIHMSID</label> <input
			name="NIHMSID" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">document_number</label> <input
			name="document_number" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">accession_number</label> <input
			name="accession_number" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">call_number</label> <input
			name="call_number" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">label</label> <input
			name="label" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">abstract</label> <input
			name="abstract" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">notes</label> <input
			name="notes" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">research_notes</label> <input
			name="research_notes" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">URL</label> <input
			name="URL" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">file_attachment_path</label> <input
			name="file_attachment_path" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">figure</label> <input
			name="figure" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">caption</label> <input
			name="caption" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">access_date</label> <input
			name="access_date" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">translated_author</label> <input
			name="translated_author" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">translated_title</label> <input
			name="translated_title" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">document_language</label> <input
			name="document_language" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">full_text</label> <input
			name="full_text" type="text" class="form-control">
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