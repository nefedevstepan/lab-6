<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 *
 * @property Items[] $items
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'integer'],
        ];
    }
    public function getCat()
    {
        return Server::find()->asArray()->all();
    }
    public function getIt($id)
    {
        return Server::findOne(['id'=>$id]);
    }
    public function getItNot($id)
    {
        return Server::find()->where(['<>','id', $id])->asArray()->all();
    }
    public function Hello()
    {
        return 'привет';
    }
    public static function server()
    {
        $server = new \SoapServer(null, array('uri' => "http://lab-six/web/index.php?r=soap/index"));
        $server->setObject(new Server());
        ob_start();
        $server->handle();
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'created_by',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Asd::className(), ['category_id' => 'id']);
    }
}
