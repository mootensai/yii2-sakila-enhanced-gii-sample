<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\SalesByFilmCategory as BaseSalesByFilmCategory;

/**
 * This is the model class for table "sales_by_film_category".
 */
class SalesByFilmCategory extends BaseSalesByFilmCategory
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['total_sales'], 'number'],
            [['category'], 'string', 'max' => 25]
        ];
    }
	
}
