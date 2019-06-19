<?php
$created_at = $article->created_at->diff(\Carbon\Carbon::now());
if($created_at->h != 0) {
    if( $created_at->d != 0 ) {
        if( $created_at->m !== 0 ) {
            echo $created_at->format("%m месяцев назад");
        } else {
            echo $created_at->format("%d дней назад");
        }
    } else {
        echo $created_at->format("%h часов назад");
    }
} else {
    echo $created_at->format("%i минут назад");
}
?>