<?php

namespace admin\modules\products\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\products\models\Category;

/**
 * CategorySearch represents the model behind the search form about `admin\products\models\Category`.
 */
class CategorySearch extends Category
{
    public $all;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->detachBehavior('slug');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'image_id', 'created_at', 'updated_at', 'position', 'enabled'], 'integer'],
            [['slug', 'name', 'title', 'name', 'keywords', 'description', 'text'], 'safe'],
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
        $query = Category::find();

        $query->joinWith('translation');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'position' => SORT_ASC,
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'image_id' => $this->image_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'position' => $this->position,
            'enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'keywords', $this->keywords]);
        $query->andFilterWhere(['like', 'description', $this->description]);
        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
