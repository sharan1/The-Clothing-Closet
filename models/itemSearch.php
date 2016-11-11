<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Allitem;

/**
 * itemSearch represents the model behind the search form about `app\models\Allitem`.
 */
class itemSearch extends Allitem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ItemID', 'DonationID', 'BrandID', 'IsPriceDec', 'IsActive', 'AddedBy', 'size'], 'integer'],
            [['Price'], 'number'],
            [['AddedOn'], 'safe'],
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
        $query = Allitem::find();

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
            'ItemID' => $this->ItemID,
            'DonationID' => $this->DonationID,
            'Price' => $this->Price,
            'BrandID' => $this->BrandID,
            'IsPriceDec' => $this->IsPriceDec,
            'IsActive' => $this->IsActive,
            'AddedOn' => $this->AddedOn,
            'AddedBy' => $this->AddedBy,
            'size' => $this->size,
        ]);

        return $dataProvider;
    }
}
