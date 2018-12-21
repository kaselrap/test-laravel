<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerCountComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER add_count_comment AFTER INSERT ON `comments` FOR EACH ROW
            BEGIN
                UPDATE articles SET count_comments = count_comments + 1
                WHERE id = NEW.article_id;
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_count_comment`');
    }
}
