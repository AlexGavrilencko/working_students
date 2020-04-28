<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\organization;

/**
 * OrganizationSearch represents the model behind the search form of `app\models\organization`.
 */
class OrganizationSearch extends organization
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'correctOrg'], 'integer'],
            [['name', 'adres', 'inn', 'ogrn', 'image'], 'safe'],
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
        $query = organization::find();

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
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'correctOrg' => $this->correctOrg,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'adres', $this->adres])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'ogrn', $this->ogrn])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
