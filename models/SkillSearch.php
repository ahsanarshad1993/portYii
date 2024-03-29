<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skill;

/**
 * SkillSearch represents the model behind the search form about `app\models\Skill`.
 */
class SkillSearch extends Skill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personalinfo_id'], 'integer'],
            [['name', 'percent', 'description'], 'safe'],
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
        $query = Skill::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'personalinfo_id' => $this->personalinfo_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'percent', $this->percent])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
