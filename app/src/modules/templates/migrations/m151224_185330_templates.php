<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_185330_templates extends Migration
{
    public function up()
    {
        /**
         * @property string $template_file
         * @property string $template_base_url
         * @property string $template_path
         * @property integer $template_size
         * @property string $template_upload_ip
         **/
        $this->addColumn('{{%template}}','template_file',Schema::TYPE_STRING);
        $this->addColumn('{{%template}}','template_base_url',Schema::TYPE_STRING);
        $this->addColumn('{{%template}}','template_path',Schema::TYPE_STRING);
        $this->addColumn('{{%template}}','template_upload_ip',Schema::TYPE_STRING);
        $this->addColumn('{{%template}}','template_size',Schema::TYPE_FLOAT);
    }

    public function down()
    {
        $this->dropColumn('{{%template}}','template_file');
        $this->dropColumn('{{%template}}','template_base_url');
        $this->dropColumn('{{%template}}','template_path');
        $this->dropColumn('{{%template}}','template_upload_ip');
        $this->dropColumn('{{%template}}','template_size');
        echo "Successfully removed columns from migrate m151224_185330_templates.";
        return true;
    }
}
