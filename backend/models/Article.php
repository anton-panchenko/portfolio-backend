<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $meta_title
 * @property string|null $meta_description
 * @property string $url
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        parent::behaviors();
        return [
            TimestampBehavior::className()
        ];
    }

    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_title', 'url'], 'required'],
            [['meta_description', 'description', 'content'], 'string'],
            [['status', 'created_at', 'updated_at', 'viewed', 'user_id', 'category_id'], 'integer'],
            [['meta_title', 'url', 'title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'url' => 'Url',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[ArticleTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }
}
