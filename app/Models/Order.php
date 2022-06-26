<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;

    use Notifiable,
        SoftDeletes;// add soft delete
    //Scope start here
    #pagination
    public function getFPriceAttribute()
    {
        return number_format($this->totalPrice, 0, ',', ' ');
    }

    public function getStrStatusAttribute(){
        $strStatus = '';
        if($this->status == 1){
            $strStatus = 'Đang xử lý';
        }
        if($this->status == 2){
            $strStatus = 'Hoàn tất';
        }
        if($this->status == 3){
            $strStatus = 'Đã hủy';
        }
        if($this->status == 4){
            $strStatus = 'Đang vận chuyển';
        }
        if($this->status == 0){
            $strStatus = 'Đã nhận hàng';
        }
         return $strStatus;
    }

    public function getStrCheckoutAttribute(){
        $strCheckout = '';
        if($this->checkOut == 0){
            $strCheckout = 'Chưa thanh toán';
        }
        if($this->checkOut == 1){
            $strCheckout = 'Đã thanh toán';
        }

        return $strCheckout;
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
    #province
    public function scopeProvince($query, $request)
    {
        if ($request->has('province')) {
            if (isset($request->province)) {
                $query->where('province',$request->province);
                return $query;
            }
        }
        return $query;
    }

    #phone
    public function scopePhone($query, $request)
    {
        if ($request->has('phone')) {
            if (isset($request->phone)) {
                $query->where('phone',$request->phone);
                return $query;
            }
        }
        return $query;
    }

    #email
    public function scopeEmail($query, $request)
    {
        if ($request->has('email')) {
            if (isset($request->email)) {
                $query->where('email',$request->email);
                return $query;
            }
        }
        return $query;
    }
    #checkOut
    public function scopeCheckOut($query, $request)
    {
        if ($request->has('checkOut')) {
            if (isset($request->checkOut) && ($request->checkOut) != 99) {
                $query->where('checkOut',$request->checkOut);
                return $query;
            }
        }
        return $query;
    }

    #scope created_at
    public function scopeDateFilter($query, $request)
    {
        if ($request->has('start_date') && $request->has('end_date')) {
            if (isset($request->start_date) && isset($request->end_date)) {
                $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }
        }
        return $query;
    }

    public function scopeFromDate($query, $request)
    {
        if ($request->has('start_date')) {
            if (isset($request->start_date) && ($request->start_date) != 99) {
                $query->where('created_at', '>=', $request->start_date);
                return $query;
            }
        }
        return $query;
    }

    public function scopeToDate($query, $request)
    {
        if ($request->has('end_date')) {
            if (isset($request->end_date) && ($request->end_date) != 99) {
                $query->where('created_at', '<=', $request->end_date);
                return $query;
            }
        }
        return $query;
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class,'orderID', 'id');
    }
}
