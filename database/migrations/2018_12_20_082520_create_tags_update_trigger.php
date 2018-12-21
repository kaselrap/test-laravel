<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsUpdateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER split_and_update_trigger AFTER UPDATE ON articles FOR EACH ROW
                        BEGIN
                          DECLARE n int; DECLARE word VARCHAR(64)
                          ;SET n=cntparts(NEW.tag)
                          ;WHILE n>0 DO
                          SET word=part(new.tag,n)
                          ;IF NOT EXISTS (SELECT * FROM tags WHERE name=word) THEN
                            INSERT INTO tags (name) VALUES (word);
                            INSERT INTO tags_article (article_id, tag_id) VALUES (NEW.id, (SELECT id FROM tags WHERE tags.name = word))
                            ;ELSE
                              IF (SELECT count(*) as count FROM tags_article
                                  INNER JOIN tags ON name = 'new' AND tag_id = tags.id
                                  WHERE article_id = 2
                                  GROUP BY tag_id) = 1 THEN
                                UPDATE tags SET tags.count = tags.count + 1 WHERE tags.name = word;
                                INSERT INTO tags_article (article_id, tag_id) VALUES (NEW.id, (SELECT id FROM tags WHERE tags.name = word));
                              END IF;
                          END IF;
                          SET n=n-1
                          ;END WHILE
                          ;END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER split_and_update_trigger;');
    }
}
