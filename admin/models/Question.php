<?php

namespace app\admin\models;

use admin\modules\sortable\behaviors\SortableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $name
 * @property string $question
 * @property string $answer
 * @property string $email
 * @property integer $created_at
 * @property integer $position
 * @property integer $status
 */
class Question extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_NEW = 1;
    const STATUS_UNPUBLISHED = 2;
    const STATUS_PUBLISHED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nxt_question';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
            SortableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['question', 'answer'], 'string'],
            [['created_at', 'position', 'status'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            ['email', 'email'],
            ['status', 'default', 'value' => self::STATUS_NEW],
            ['status', 'in', 'range' => [self::STATUS_DELETED, self::STATUS_NEW, self::STATUS_UNPUBLISHED, self::STATUS_PUBLISHED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'question' => 'Question',
            'answer' => 'Answer',
            'email' => 'E-mail',
            'created_at' => 'created',
            'position' => 'updated',
            'status' => 'Status',
        ];
    }

    public static function unread()
    {
        return self::find()->where(['status' => self::STATUS_NEW])->count();
    }

    public static function read($id = null)
    {
        /** @var $temp Question[] */
        $temp = self::find()->where(['status' => self::STATUS_NEW])->andFilterWhere(['id' => $id])->all();

        foreach ($temp as $t) {
            $t->status = self::STATUS_UNPUBLISHED;
            $t->save();
        }
    }

    public static function statusList()
    {
        return [
            self::STATUS_DELETED => 'Deleted',
            self::STATUS_NEW => 'New',
            self::STATUS_UNPUBLISHED => 'Pending Approval',
            self::STATUS_PUBLISHED => 'Published',
        ];
    }
}
