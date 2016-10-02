<?php

use yii\db\Migration;

class m160929_061153_todo extends Migration
{
    public $todoTable = 'todo';

    public function up()
    {
        $this->createTable($this->todoTable, [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string(),
            'completed' => $this->boolean()->defaultValue(0)
        ]);
    }

    public function down()
    {
        $this->dropTable($this->todoTable);
    }
}
