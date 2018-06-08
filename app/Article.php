<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //
    protected $table = 'data';
    protected $fillable = [
        'name', 'description', 'price','category_id','created_at','updated_at',
    ];
    public function setPublishedAtAttribute(){
        // 未来日期的当前时间
        //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $now = Carbon::now()->timezone('Asia/Taipei');
        return $now->toDateTimeString();
        // 未来日期的0点
        //$this->attributes['create_at'] = Carbon::parse($date);
    }
}
