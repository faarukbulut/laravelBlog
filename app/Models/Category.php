<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];


    public function scopeName($query, $name)
    {
        if(!is_null($name))
            return $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeSlug($query, $slug)
    {
        if(!is_null($slug))
            return $query->where('slug', 'LIKE', '%' . $slug . '%');
    }

    public function scopeDescription($query, $description)
    {
        if(!is_null($description))
            return $query->where('description', 'LIKE', '%' . $description . '%');
    }

    public function scopeOrder($query, $order)
    {
        if(!is_null($order))
            return $query->where('order', 'LIKE', '%' . $order . '%');
    }

    public function scopeParentId($query, $parentId)
    {
        if(!is_null($parentId))
        return $query->where('parent_id', 'LIKE', '%' . $parentId . '%');
    }

    public function scopeStatus($query, $status)
    {
        if(!is_null($status))
        return $query->where('status', 'LIKE', '%' . $status . '%');
    }

    public function scopeFeatureStatus($query, $featureStatus)
    {
        if(!is_null($featureStatus))
        return $query->where('feature_status', 'LIKE', '%' . $featureStatus . '%');
    }





    public function parentCategory() : HasOne
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
