<?php

use yii\db\Schema;
use yii\db\Migration;

class m141025_121811_events extends Migration
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

	    $this->createTable('{{%event}}',array(
	    	'id'                	=> Schema::TYPE_PK,
	        'user'		   		    => Schema::TYPE_TEXT .' NOT NULL',
	        
	        //general fields
	        'action'			    => Schema::TYPE_STRING . '(50)', //this will alwayse be the "mail" of the user
	        'paramint'				=> Schema::TYPE_INTEGER,
	        'paramfloat'			=> Schema::TYPE_FLOAT,
	        'paramstring'			=> Schema::TYPE_STRING,
	        'paramtext'				=> Schema::TYPE_TEXT,
	        'paramdate'				=> Schema::TYPE_DATE . ' DEFAULT NULL',
	        'paramdatetwo'			=> Schema::TYPE_DATE . ' DEFAULT NULL',
	        'paramdatethree'		=> Schema::TYPE_DATE . ' DEFAULT NULL',
	        'paramdateint'			=> Schema::TYPE_INTEGER, //this will be the storage for the date when the event is valid
	        
	        //module fields
		    'mod_table'         	=> Schema::TYPE_STRING .'(100)',
		    'mod_id'            	=> Schema::TYPE_INTEGER.' NULL',
		    
		    // timestamps
	        'created_at'        	=> Schema::TYPE_INTEGER . ' NOT NULL',
	        'updated_at'        	=> Schema::TYPE_INTEGER . ' NOT NULL',
	        'deleted_at'        	=> Schema::TYPE_INTEGER . ' DEFAULT NULL',
	        //foreign keys
	    ),$tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%event}}');
    }
}
