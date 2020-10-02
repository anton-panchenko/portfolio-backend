<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m201002_171242_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'meta_title' => $this->string(255)->notNull(),
            'meta_description' => $this->text()->defaultValue(null),
            'url' => $this->string(255)->notNull(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'content'=>$this->text(),
            'status' => $this->integer(11)->defaultValue(null),
            'created_at' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->integer(11)->defaultValue(null),
            'image'=>$this->string(),
            'viewed'=>$this->integer(),
            'user_id'=>$this->integer(),
            'category_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
