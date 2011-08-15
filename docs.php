<?php header('Content-type: application/rdf+xml'); ?>

<?php

include 'vars.php';
include 'namespaces.php';
include 'functions.php';

mysql_connect("localhost", $user, $pwd) or die(mysql_error());
# echo "<!-- Connection to the server was successful! -->\n";

mysql_select_db($db) or die(mysql_error());
# echo "<!-- Database was selected! -->\n";

$allIDs = mysql_query("SELECT DISTINCT journal FROM docs" . $limit);

$num = mysql_numrows($allIDs);

while ($row = mysql_fetch_assoc($allIDs)) {
  if (strlen($row['journal']) > 0) {
    echo triple($JRN . "j" . md5($row['journal']), $RDF . "type", $BIBO . "Journal");
    echo datatriple($JRN . "j" . md5($row['journal']), $DC . "title", $row['journal']);
  }
}
echo "\n";

$allIDs = mysql_query("SELECT DISTINCT * FROM docs WHERE doc_id > 0" . $limit);

$num = mysql_numrows($allIDs);

while ($row = mysql_fetch_assoc($allIDs)) {
  $resource = $RES . "r" . $row['doc_id'];
  echo triple( $resource, $RDF . "type", $BIBO . ":Article" );
  if ($row['doi']) {
    echo dataTriple( $resource, $BIBO . "doi", $row['doi'] );
    echo triple( $resource, $OWL . "sameAs",  "http://dx.doi.org/" . $row['doi'] );
  }
  if ($row['pubmed_id']) {
    echo triple( $resource, $BIBO . "pmid", "http://bio2rdf.org/pubmed:" . $row['pubmed_id'] );
  }
  echo dataTriple( $resource, $DC . "date", $row['year'] );
  echo dataTriple( $resource, $BIBO . "volume", $row['volume'] );
  echo dataTriple( $resource, $BIBO . "issue", $row['issue'] );
  echo dataTriple( $resource, $BIBO . "pageStart", $row['first_page'] );
  echo dataTriple( $resource, $BIBO . "pageEnd", $row['last_page'] );
  echo triple( $resource, $DC . "isPartOf", $JRN . "j" . md5($row['journal']) );
}

?>
