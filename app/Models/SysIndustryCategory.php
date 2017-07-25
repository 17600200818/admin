<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysIndustryCategory extends Model
{
    public $table = 'sys_industry_category';

    public function categoryList() {
        $category1 = $this->select('c1', 'n1', 'c2', 'n2')->get();
        $categoryList = array();
        foreach ($category1 as $v) {
            $categoryList['c1'][$v['c1']] = $v['n1'];
            if ($v['c1'] == $this->c1 ) {
                $categoryList['c2'][$v['c2']] = $v['n2'];
            }
        }
        return $categoryList;
    }
}
