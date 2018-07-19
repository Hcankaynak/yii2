<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Advert;

/**
 * AdvertSearch represents the model behind the search form of `app\models\Advert`.
 */
class AdvertSearch extends Advert
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quota', 'grade'], 'integer'],
            [['type', 'person', 'status', 'description', 'department', 'advert_date', 'expired_date', 'company_name', 'company_website', 'comment', 'long_description'], 'safe'],
            [['gpa'], 'number'],
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
        $query = Advert::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
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
            'advert_date' => $this->advert_date,
            'expired_date' => $this->expired_date,
            'quota' => $this->quota,
            'grade' => $this->grade,
            'gpa' => $this->gpa,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'person', $this->person])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_website', $this->company_website])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'long_description', $this->long_description]);

        return $dataProvider;
    }
}
