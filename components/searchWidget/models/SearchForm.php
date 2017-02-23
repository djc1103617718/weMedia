<?php

namespace app\components\searchWidget\models;

use yii\base\Model;

class SearchForm extends Model
{
    const CLASS_COLOR_RED = 'btn-danger';
    const CLASS_COLOR_BLUE = 'btn-primary';
    const CLASS_COLOR_DEFAULT = 'btn-default';
    const CLASS_COLOR_GREEN = 'btn-success';
    const CLASS_COLOR_OLIVE_GREEN = 'btn-info';
    const CLASS_COLOR_ORANGE = 'btn-warning';
    public $dropdownlistAttributes = [];
    public $searchModelName;
    public $searchAttribute;
    public $url;
    public $searchColor = 'btn-default';
    public $searchBoxLength = 4;
    public $float = 'right';

    public $options = [];
    public $css = '';
    public $js = '';

}