<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Experience;

/**
 * ExperienceSearch represents the model behind the search form of `app\models\Experience`.
 */
class ExperienceSearch extends Experience
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'resume_id', 'StudyOrWork', 'nameOrganiz_id', 'speciality_id'], 'integer'],
            [['dateStart', 'dateEnd', 'description'], 'safe'],
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
        $query = Experience::find();

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
            'resume_id' => $this->resume_id,
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd,
            'StudyOrWork' => $this->StudyOrWork,
            'nameOrganiz_id' => $this->nameOrganiz_id,
            'speciality_id' => $this->speciality_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
