<?php

namespace App\Models;

use App\Models\Mobile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrderDetail extends Model
{
    use HasFactory;

    use Notifiable,
        SoftDeletes;// add soft delete
    public function mobile()
    {
        return $this->hasOne(Mobile::class,'id', 'mobileID');
    }

    public function order(){
        return $this->hasOne(Order::class, 'id', "orderID");
    }

    public function getFUnitPriceAttribute()
    {
        return number_format($this->unitPrice, 0, ',', ' ');
    }

    //Scope start here
    #pagination
    public function scopePagination($query, $request)
    {
        if ($request->has('pagination_limit')) {
            switch ($request->pagination_limit) {
                case 'limit_9':
                    return $query->paginate(9);
                case 'limit_18':
                    return $query->paginate(18);
                case 'limit_32':
                    return $query->paginate(32);
            }
        }
    }

    #sort by
    public function scopeSortBy($query, $request)
    {
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'created_at_desc':
                    return $query->orderBy('created_at', 'desc');
                case 'created_at_asc"':
                    return $query->orderBy('created_at', 'asc');
                case 'name_desc':
                    return $query->orderBy('name', 'desc');
                case 'name_asc':
                    return $query->orderBy('name', 'asc');
                case 'id_desc':
                    return $query->orderBy('id', 'desc');
                case 'id_asc':
                    return $query->orderBy('id', 'asc');
                default:
                    return $query->orderBy('created_at', 'asc');
            }
        }
    }

    #scopeName
    public function scopeName($query, $request)
    {
        if ($request->has('name')) {
            if (isset($request->name)) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
                return $query;
            }
        }
        return $query;
    }
}
