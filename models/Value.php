<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
//use common\modules\sortable\behaviors\SortableBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "value".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $feature_id
 *
 * @property Feature $feature
 * @property Variant[] $variants
 */
class Value extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nxt_value';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => LanguageBehavior::class,
                'attributes' => [
                    'name',
                ],
                'languages' => Language::nameList(),
                'languageField' => 'lang_id',
                'tableName' => "nxt_value_lang",
                'langForeignKey' => 'value_id',
            ],    
          //  SortableBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feature_id', 'name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['feature_id', 'position'], 'integer'],
            [['feature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feature::class, 'targetAttribute' => ['feature_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature_id' => Yii::t('app', 'Feature'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Feature::class, ['id' => 'feature_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariants()
    {
        return $this->hasMany(Variant::class, ['id' => 'variant_id'])->viaTable('nxt_variant_value', ['value_id' => 'id']);
    }

    /**
     * @param integer|null $feature_id
     * @return array
     */
    public static function getList($feature_id)
    {
        return ArrayHelper::map(self::find()->andFilterWhere(['feature_id' => $feature_id])->orderBy('position')->all(), 'id', 'name');
    }

    public static function getListEx($feature_id, $category_id)
    {
        $query = self::find();
        $query->joinWith(['feature']);
        $query->joinWith(['variants.product.categories']);
        $query->andWhere(['feature_id' => $feature_id]);
        $query->andWhere(['category_id' => $category_id]);
        $query->andWhere(['nxt_variant.enabled' => true]);
        $query->andWhere(['nxt_product.enabled' => true]);
        $ids = $query->select('nxt_value.id')->groupBy(['nxt_value.id'])->column();

        return ArrayHelper::map(self::find()->andFilterWhere(['feature_id' => $feature_id])->where(['id' => $ids])->orderBy('position')->all(), 'id', 'name');
    }
}
