<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reference;

/**
 * ReferenceSearch represents the model behind the search form about `app\models\Reference`.
 */
class ReferenceSearch extends Reference
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personalinfo_id'], 'integer'],
            [['name', 'designation', 'company', 'review', 'contact', 'url', 'email'], 'safe'],
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
        $query = Reference::find();

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
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'review', $this->review])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
