<?php
$created_at = $article->created_at->diff(\Carbon\Carbon::now());
if($created_at->h != 0) {
    if( $created_at->d != 0 ) {
        if( $created_at->m !== 0 ) {
            echo $created_at->format("%m months ago");
        } else {
            echo $created_at->format("%d days ago");
        }
    } else {
        echo $created_at->format("%h hours ago");
    }
} else {
    echo $created_at->format("%i minutes ago");
}
?>