
# About

ChEMBL is medicinal chemistry database by the team of dr. J. Overington at the EBI.

  http://www.ebi.ac.uk/chembl/

It is detailed in this paper (doi:10.1093/nar/gkr777):

  http://nar.oxfordjournals.org/content/early/2011/09/22/nar.gkr777.short

This project develops, releases, and hosts a RDF version of ChEMBL. The main SPARQL
end point is available from Uppsala University at:

  http://rdf.farmbio.uu.se/chembl/sparql

Or as SNORQL at:

  http://rdf.farmbio.uu.se/chembl/snorql

Additionally, the data is available as Linked Data via Kasabi:

  http://kasabi.com/dataset/chembl-rdf

# Download

Alternatively, you can download the full set of triples as n3 from:

  http://semantics.bigcat.unimaas.nl/chembl12/

# Copyright / License

The ChEMBL database is copyrighted by John Overington et al., and licensed CC-BY-SA:

  http://creativecommons.org/licenses/by-sa/3.0/

as explained on:

  http://www.ebi.ac.uk/chembldb/
  ftp://ftp.ebi.ac.uk/pub/databases/chembl/ChEMBLdb/releases/chembl_13/LICENSE

The ChEMBL FAQ explains how you can fullfil the attribution part of the license:

  https://www.ebi.ac.uk/chembldb/index.php/faq#faq29

If you use this RDF version of ChEMBL, you should cite this paper, pending
a more dedicated paper, where the RDF version of ChEMBL has been used and
demonstrated:

  http://www.jbiomedsem.com/content/2/S1/S6

Authors that contributed (see also the Git commit history) are:

  Egon Willighagen, Peter Ansell

These scripts were tested against version 13 of ChEMBL, as downloaded from:

  ftp://ftp.ebi.ac.uk/pub/databases/chembl/releases/chembl_13/

# Requirements

ChEMBL 13, OpenRDF (aka Sesame), SLF4J, and the MySQL JDBC plugin.

# Installation

The scripts expect a script only readble by the server software called vars.php, with content like:

    <?php

    $version = '13';
    $rooturi = 'http://data.kasabi.com/dataset/chembl-rdf/' . $version . '/';

    $db = 'chembl_' . $version;
    $user = 'user';
    $pwd = 'secret';

    // use the next line to limit the output 
    // $limit = ' LIMIT 5';
    $limit = '';

    ?>

to access the MySQL database with the ChEMBL content.
