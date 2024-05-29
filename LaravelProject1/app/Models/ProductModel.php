<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tblproduct";
    protected $primarykey='pid';
    public $incrementing = false;
    protected $keytype = 'string';

    public function hasOrderDetail() {
        return $this->hasMany(OrderDetailModel::class, 'pid', 'odid');
    }
}
