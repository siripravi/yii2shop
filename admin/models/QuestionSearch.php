<?php

namespace app\admin\models;

use app\admin\models\Question;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\admin\models\Question as QuestionModel;

/**
 * Question represents the model behind the search form about `app\admin\models\Question`.
 */
class QuestionSearch extends QuestionModel
{
    public $all;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'position', 'status'], 'integer'],
            [['name', 'question', 'answer', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = QuestionModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'position' => SORT_DESC
                ],
            ],
        ]);

        if ($this->all) {
            $dataProvider->pagination = false;
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (!$this->status) {
            $query->where(['!=', 'status', Question::STATUS_DELETED]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'position' => $this->position,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'email', $this->email]);

        if ($this->answer == 1) {
            $query->andWhere(['answer' => null]);
        } else if ($this->answer == 2) {
            $query->andWhere(['not', ['answer' => null]]);
        }

        return $dataProvider;
    }
}
