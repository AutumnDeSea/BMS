<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $bookId
 * @property string $bookName
 * @property string $author
 * @property int $price
 * @property string $borrowTime
 * @property int $borrowDuration
 * @property int $isBorrow
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bookId', 'bookName', 'author', 'price', 'borrowDuration'], 'required'],
            [['bookId', 'price', 'borrowDuration', 'isBorrow'], 'integer'],
            [['borrowTime'], 'safe'],
            [['bookName', 'author'], 'string', 'max' => 100],
            [['bookId'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bookId' => 'ID',
            'bookName' => '书名',
            'author' => '作者',
            'price' => '价格',
            'borrowTime' => '借出时长',
            'borrowDuration' => '借出时常',
            'isBorrow' => '状态',
        ];
    }
}
