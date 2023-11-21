<?php
function get_file_format($document_name){
    $split = explode(".", $document_name);
    return end($split);
}
?>