<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class Supplier extends Model
{
    use HasFactory;
    protected $visible = ['id','nama_supplier','nama_barang','alamat','no_wa'];

    protected $fillable = ['id','nama_supplier','nama_barang','alamat','no_wa'];
    public $timestamps = true;

    //membuat relasi one to many

    public function barang()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
       return $this->hasMany('App\Models\Barang','id_supplier');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($supplier) {
            if ($supplier->barang->count() > 0) {
                Alert::error('Ups', 'Data tidak bisa dihapus');
                return false;
            }
        });
    }

   
}
