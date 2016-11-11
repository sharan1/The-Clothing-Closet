<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brand;

/**
 * BrandSearch represents the model behind the search form about `app\models\Brand`.
 */
class BrandSearch extends Brand
{
    public $AddedByName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BrandID', 'IsActive', 'AddedBy'], 'integer'],
            [['BrandName', 'AddedOn', 'AddedByName'], 'safe'],
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
        $query = Brand::find()->where([Brand::tableName().'.IsActive' => 1]);
        $query->joinWith(['addedBy']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'AddedByName', 'BrandName','AddedOn'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->filterWhere(['or',
            ['like','FirstName',$this->AddedByName],
            ['like','LastName', $this->AddedByName]
        ]);
        // grid filtering conditions
        $query->andFilterWhere([
            'BrandID' => $this->BrandID,
            'AddedOn' => $this->AddedOn,
        ]);

        $query->andFilterWhere(['like', 'BrandName', $this->BrandName]);
        //$query->andFilterWhere(['like', 'AddedBy', $this->AddedByName]);

        return $dataProvider;
    }
}
