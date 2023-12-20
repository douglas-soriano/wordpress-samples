<?php

$IS_TAXONOMY = true;
$taxonomy = get_queried_object();
$page_fields = get_fields($taxonomy->taxonomy.'_'.$taxonomy->term_id);
include("single-equipe.php");

?>