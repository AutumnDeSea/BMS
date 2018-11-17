<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bookId', 'price', 'borrowDuration', 'isBorrow'], 'integer'],
            [['bookName', 'author', 'borrowTime'], 'safe'],
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
        $query = Book::find();

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
            'bookId' => $this->bookId,
            'price' => $this->price,
            'borrowTime' => $this->borrowTime,
            'borrowDuration' => $this->borrowDuration,
            'isBorrow' => $this->isBorrow,
        ]);
        // 模糊查询
        $query->andFilterWhere(['like', 'bookName', $this->bookName])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
