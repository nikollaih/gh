<?php

function getInitials($fullName) {
    // Split the full name into words
    $words = explode(' ', $fullName);

    // Number of words in the name
    $numWords = count($words);

    // Initialize a string to store the initials
    $initials = '';

    // Determine the number of initials to obtain
    $numInitials = ($numWords == 1) ? 1 : min(2, $numWords);

    // Iterate through the words and append the initials to the result
    for ($i = 0; $i < $numInitials; $i++) {
        $initials .= strtoupper(substr($words[$i], 0, 1));
    }

    return $initials;
}

?>