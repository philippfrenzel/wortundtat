<?php

namespace app\modules\templates\models;

use Yii;
use \app\modules\templates\models\base\Template as BaseTemplate;
use yii\behaviors\TimestampBehavior;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PHPWord\IOFactory;
use \ForceUTF8\Encoding AS UTF8encoding;

/**
 * This is the model class for table "app_template".
 */
class Template extends BaseTemplate
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * generate doc
     * @var array $params
     */
    public function generateDoc($params){

        $file = Yii::$app->user->id . '_temp.doc';

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        //header('Content-Type: application/vnd.pdf');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        $document = new TemplateProcessor(dirname(__DIR__). '/../../../files/' . $this->id .'/'. $this->template_file);

        foreach($params['template']['fields'] AS $field)
        {
            foreach($field AS $key => $value)
            {
                $document->setValue($key, UTF8encoding::fixUTF8($value));
            }
        }

        // save as a random file in temp file
        $temp_file = tempnam(sys_get_temp_dir(), $file);
        $document->saveAs($temp_file);

        readfile($temp_file);
        unlink($temp_file);

        //var_dump($params);

        \Yii::$app->end();
    }
}
