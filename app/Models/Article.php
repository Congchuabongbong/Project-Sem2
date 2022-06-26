<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    use HasFactory;

    use Notifiable,
        SoftDeletes;// add soft delete
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandID');
    }

    #sort by
    public function scopeSortBy($query, $request)
    {
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'created_at_desc':
                    return $query->orderBy('created_at', 'desc');
                case 'created_at_asc':
                    return $query->orderBy('created_at', 'asc');
                case 'title_desc':
                    return $query->orderBy('title', 'desc');
                case 'title_asc':
                    return $query->orderBy('title', 'asc');
                case 'author_desc':
                    return $query->orderBy('author', 'desc');
                case 'author_asc':
                    return $query->orderBy('author', 'asc');
                case 'id_desc':
                    return $query->orderBy('id', 'desc');
                case 'id_asc':
                    return $query->orderBy('id', 'asc');
                default:
                    return $query->orderBy('created_at', 'asc');
            }
        }
    }

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

    public function scopeTitle($query, $request)
    {
        if ($request->has('title')) {
            if (isset($request->title)) {
                $query->where('title', 'LIKE', '%' . $request->title . '%');
                return $query;
            }
        }
        return $query;
    }

    public function scopeAuthor($query, $request)
    {
        if ($request->has('author')) {
            if (isset($request->author)) {
                $query->where('author', 'LIKE', '%' . $request->author . '%');
                return $query;
            }
        }
        return $query;
    }

    public function scopeBrand($query, $request)
    {
        if ($request->has('brandID')) {
            if (isset($request->brandID) && ($request->brandID) != 99) {
                $query->where('brandID', $request->brandID);
                return $query;
            }
        }
        return $query;
    }

    public function scopeDateFilter($query, $request)
    {
        if ($request->has('start_date') && $request->has('end_date')) {
            if (isset($request->start_date) && isset($request->end_date)) {
                $query->whereBetween('updated_at', [$request->start_date, $request->end_date]);
            }
        }
        return $query;
    }

    public function getStrBrandAttribute()
    {
        $strBrand = '';
        if ($this->brandID == 1) {
            $strBrand = 'Apple';
        }
        if ($this->brandID == 2) {
            $strBrand = 'Samsung';
        }
        if ($this->brandID == 3) {
            $strBrand = 'Xiaomi';
        }
        if ($this->brandID == 4) {
            $strBrand = 'Nokia';
        }
        if ($this->brandID == 5) {
            $strBrand = 'Realme';
        }
        if ($this->brandID == 6) {
            $strBrand = 'Asus';
        }
        if ($this->brandID == 7) {
            $strBrand = 'Vsmart';
        }
        if ($this->brandID == 8) {
            $strBrand = 'Vivo';
        }
        if ($this->brandID == 9) {
            $strBrand = 'OPPO';
        }

        return $strBrand;
    }

    public function getMainThumbnailAttribute()
    {
        $defaultThumbnail = 'https://res.cloudinary.com/tanvnth2012002/image/upload/v1639043350/gx7zeg8riqt3rzqco7je.jpg';
        if ($this->thumbnail != null && strlen($this->thumbnail) > 0) {
            $this->thumbnail = substr($this->thumbnail, 0, -1);
            $arrayThumbnail = explode(',', $this->thumbnail);
            if (sizeof($arrayThumbnail) > 0) {
                return $arrayThumbnail[0];
            }
        }
        return $defaultThumbnail;
    }
}
