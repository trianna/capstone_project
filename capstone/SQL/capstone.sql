CREATE TABLE author (
	author_id INT NOT NULL AUTO_INCREMENT, 
	first_name VARCHAR(255), 
	middle_initial CHAR(1), 
	last_name VARCHAR(255), 
	address VARCHAR(255), 
	PRIMARY KEY (author_id));
CREATE TABLE publication (
	publication_id INT NOT NULL AUTO_INCREMENT, 
	title VARCHAR(255), 
	issn_web VARCHAR(255), 
	PRIMARY KEY (publication_id));
CREATE TABLE keyword (
	keyword_id INT NOT NULL AUTO_INCREMENT, 
	keyword_term VARCHAR(255), 
	PRIMARY KEY (keyword_id));
CREATE TABLE database (
	database_id INT NOT NULL AUTO_INCREMENT, 
	name VARCHAR(255), 
	provider VARCHAR(255), 
	PRIMARY KEY (keyword_id));

--unmodified past here
CREATE TABLE article (
	article_id INT NOT NULL AUTO_INCREMENT, 
	title VARCHAR(255), 
	publication_id VARCHAR(255), 
	publication_date DATE, 
	doi VARCHAR(255), 
	PRIMARY KEY (article_id));

CREATE TABLE article_author (
	article_id INT NOT NULL, 
	author_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (author_id) REFERENCES author(author_id)); 
CREATE TABLE article_collaborator (
	article_id INT NOT NULL, 
	collaborator_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (collaborator_id) REFERENCES collaborator(collaborator_id)); 
CREATE TABLE article_publication (
	article_id INT NOT NULL, publication_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (publication_id) REFERENCES publication(publication_id)); 
CREATE TABLE article_keyword (
	article_id INT NOT NULL, keyword_id INT NOT NULL, 
	FOREIGN KEY (article_id) REFERENCES article(article_id), 
	FOREIGN KEY (keyword_id) REFERENCES keyword(keyword_id)); 
CREATE TABLE Article_Type (
	articletype_id INT NOT NULL, 
	name VARCHAR(255)); 
CREATE TABLE Translation(
	translation_id INT NOT NULL, 
	translation_title VARCHAR(255), 
	REFERENCES author(author_id);