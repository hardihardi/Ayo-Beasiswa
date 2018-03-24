<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facilitator;

class Category extends Model
{
     public function scholarships(){
        return $this->belongsToMany('App\Models\Scholarship', 'beasiswa_kategori', 'category_id','scholarship_id');
    }

    // public function facilitators(){
    // 	return Facilitator::join()


    // }
}

// public function metrics()
// {
//     return Metric

//     ::join('metric_product', 'metric.id', '=', 'metric_product.metric_id')

//     ->join('products', 'metric_product.product_id', '=', 'products.id')

//     ->join('deal_product', 'products.id', '=', 'deal_product.product_id')

//     ->join('deals', 'deal_product.deal_id', '=', 'deal.id')

//     ->where('deal.id', $this->id);

// }


// // you can access to $deal->metrics and use eager loading
// public function getMetricsAttribute()
// {
//     if (!$this->relationLoaded('products') || !$this->products->first()->relationLoaded('metrics')) {
//         $this->load('products.metrics');
//     }

//     return collect($this->products->lists('metrics'))->collapse()->unique();
// }