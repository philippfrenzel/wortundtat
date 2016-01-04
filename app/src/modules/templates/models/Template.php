<?php

namespace app\modules\templates\models;

use Yii;
use \app\modules\templates\models\base\Template as BaseTemplate;
use \app\modules\event\models\TemplateEvent;
use \app\modules\templates\models\query\TemplateQuery;
use yii\behaviors\TimestampBehavior;
use PhpOffice\PhpWord\Settings AS PhpWordSettings;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use \ForceUTF8\Encoding AS UTF8encoding;

/**
 * This is the model class for table "app_template".
 */
class Template extends BaseTemplate
{
    /**
     * @inheritdoc
     * @return TemplateQuery
     */
    public static function find()
    {
        return new TemplateQuery(get_called_class());
    }

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
        Yii::$app->user->identity = \app\models\User::findIdentityByAccessToken($params['template']['key']);

        header("Content-Description: File Transfer");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        switch ($params['template']['format'])
        {
            case 'PDF':
                $file = Yii::$app->user->id . '_temp.pdf';
                $writeFormat = 'PDF';
                PhpWordSettings::setPdfRendererPath(dirname(__DIR__).'/../../../vendor/tecnickcom/tcpdf');
                PhpWordSettings::setPdfRendererName('TCPDF');
                header('Content-Type: application/pdf');
                break;
            case 'Word2013':
                $file = Yii::$app->user->id . '_temp.docx';
                $writeFormat = 'Word2013';
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                break;
            default:
                $file = Yii::$app->user->id . '_temp.doc';
                $writeFormat = 'Word2007';
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                break;
        }

        header('Content-Disposition: attachment; filename="' . $file . '"');

        $document = new TemplateProcessor(dirname(__DIR__). '/../../../files/' . $this->id .'/'. $this->template_file);

        /**
         * process the fields, that have been send through the rest interface
         */
        foreach($params['template']['fields'] AS $field)
        {
            foreach($field AS $key => $value)
            {
                $document->setValue($key, UTF8encoding::fixUTF8($value));
            }
        }

        /**
         * process the tables, that have been send through the rest interface
         */
        foreach($params['template']['tables'] AS $tables)
        {
            foreach($tables AS $name => $rows)
            {
                //first we create a clone for the master row
                $document->cloneRow($name,count($rows));

                //our walking variable for the table
                $ii=1;
                foreach($rows AS $row)
                {
                    foreach($row AS $cell)
                    {
                        $document->setValue(key($cell).'#'.$ii, current($cell));
                    }
                    $ii++;
                }
            }
        }

        // save as a random file in temp file
        $temp_file = tempnam(sys_get_temp_dir(), $file);
        $document->saveAs($temp_file);

        switch ($params['template']['format'])
        {
            case 'PDF':
                $phpWord = IOFactory::load($temp_file);
                $xmlWriter = IOFactory::createWriter($phpWord, $writeFormat);
                $xmlWriter->save("php://output");
                break;
            default:
                readfile($temp_file);
                break;
        }

        unlink($temp_file);

        $LogEvent = new TemplateEvent();
        $LogEvent->aTemplateCreated(Yii::$app->user->identity->username,$this->id);

        \Yii::$app->end();
    }
}
