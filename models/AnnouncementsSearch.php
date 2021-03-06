<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Announcements;

/**
 * AnnouncementsSearch represents the model behind the search form of `app\models\Announcements`.
 */
class AnnouncementsSearch extends Announcements
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['header', 'summary', 'Description', 'person', 'date', 'type', 'related_user_type'], 'safe'],
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
        $query = Announcements::find();

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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'person', $this->person])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'related_user_type', $this->related_user_type]);

        return $dataProvider;
    }
}
