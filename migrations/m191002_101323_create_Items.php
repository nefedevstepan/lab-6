<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m191002_101323_create_Items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Items}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'Description' => $this->text(),
            'author' => $this->text(),
            'Count' => $this->integer(11),
            'category_id' => $this->integer()->defaultValue(1),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-Items-category_id}}',
            '{{%Items}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-Items-category_id}}',
            '{{%Items}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-Items-category_id}}',
            '{{%Items}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-Items-category_id}}',
            '{{%Items}}'
        );

        $this->dropTable('{{%Items}}');
    }
}
