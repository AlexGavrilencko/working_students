<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resume;

/**
 * ResumeSearch represents the model behind the search form of `app\models\Resume`.
 */
class ResumeSearch extends Resume
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'CareerObjective_id', 'ShowOrHide'], 'integer'],
            [['name', 'surname', 'patronymic', 'dateBirth', 'image', 'skills', 'personalQualities_id', 'dateAdd', 'dateChanges', 'response'], 'safe'],
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
        $query = Resume::find();

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
            'dateBirth' => $this->dateBirth,
            'CareerObjective_id' => $this->CareerObjective_id,
            'dateAdd' => $this->dateAdd,
            'dateChanges' => $this->dateChanges,
            'ShowOrHide' => $this->ShowOrHide,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'skills', $this->skills])
            ->andFilterWhere(['like', 'personalQualities_id', $this->personalQualities_id])
            ->andFilterWhere(['like', 'response', $this->response]);

        return $dataProvider;
    }
}
