<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_194430_templates extends Migration
{
    public function up()
    {
        switch (Yii::$app->db->driverName) {
            case 'mysql':
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
                break;
            case 'pgsql':
                $tableOptions = null;
                break;
            case 'mssql':
                $tableOptions = null;
                break;
            default:
                throw new RuntimeException('Your database is not supported!');
        }

        $this->createTable('{{%template}}',array(
            'id'                    => Schema::TYPE_PK,

            //normal fields within this table
            'template_name'         => Schema::TYPE_STRING,
            'template_type'         => Schema::TYPE_STRING,
            'is_active'             => Schema::TYPE_SMALLINT . ' DEFAULT 0',

            //foreign keys
            'user_id'               => Schema::TYPE_INTEGER . ' NOT NULL',

            // timestamps
            'created_at'            => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'            => Schema::TYPE_INTEGER . ' NOT NULL',
            'deleted_at'            => Schema::TYPE_INTEGER . ' DEFAULT NULL'
        ),$tableOptions);

        $this->addForeignKey('FK_template_user','{{%template}}','user_id','{{%user}}','id');
    }

    public function down()
    {
        echo "m151223_194430_templates cannot be reverted.\n";

        return false;
    }
}
