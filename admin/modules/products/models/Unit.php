<?php

namespace admin\modules\products\models;

use admin\modules\language\behaviors\LanguageBehavior;
use admin\modules\sortable\behaviors\SortableBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "unit".
 *
 * @property integer $id
 * @property integer $position
 * @property boolean $enabled
 *
 * @property string $name
 */
class Unit extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nxt_unit';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::class,
            SortableBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['position'], 'integer'],
            [['enabled'], 'boolean'],
            [['enabled'], 'default', 'value' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * @param boolean|null $enabled
     * @return array
     */
    public static function getList($enabled)
    {
        return ArrayHelper::map(self::find()->andFilterWhere(['enabled' => $enabled])->orderBy('position')->all(), 'id', 'name');
    }
}
