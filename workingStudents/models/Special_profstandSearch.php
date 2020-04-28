<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\specialProfstand;

/**
 * Special_profstandSearch represents the model behind the search form of `app\models\specialProfstand`.
 */
class Special_profstandSearch extends specialProfstand
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categProfstand_id', 'bigspeciality_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = specialProfstand::find();

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
            'categProfstand_id' => $this->categProfstand_id,
            'bigspeciality_id' => $this->bigspeciality_id,
        ]);

        return $dataProvider;
    }
}
