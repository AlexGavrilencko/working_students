<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacancy;

/**
 * VacancySearch represents the model behind the search form of `app\models\Vacancy`.
 */
class VacancySearch extends Vacancy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'organization_id', 'city_id', 'experience_id', 'employment_id', 'schedule_id', 'salary', 'position_id', 'category_id', 'WorkOrPractice', 'ShowOrHide'], 'integer'],
            [['name', 'duties', 'requirement', 'conditions', 'dateAdd', 'dateChanges', 'response'], 'safe'],
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
        $query = Vacancy::find();

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
            'organization_id' => $this->organization_id,
            'city_id' => $this->city_id,
            'experience_id' => $this->experience_id,
            'employment_id' => $this->employment_id,
            'schedule_id' => $this->schedule_id,
            'salary' => $this->salary,
            'position_id' => $this->position_id,
            'category_id' => $this->category_id,
            'dateAdd' => $this->dateAdd,
            'dateChanges' => $this->dateChanges,
            'WorkOrPractice' => $this->WorkOrPractice,
            'ShowOrHide' => $this->ShowOrHide,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'duties', $this->duties])
            ->andFilterWhere(['like', 'requirement', $this->requirement])
            ->andFilterWhere(['like', 'conditions', $this->conditions])
            ->andFilterWhere(['like', 'response', $this->response]);

        return $dataProvider;
    }
}
