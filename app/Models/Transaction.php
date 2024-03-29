<?php

namespace App\Models;

use App\Traits\Uuids;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory, Uuids;
    protected $table = "transaksi";
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;
    protected $fillable = [
        "kode_transaksi","id_pengguna","id_alamat","waktu_transaksi","waktu_expired","total_harga","total_ongkir","status_transaksi","bukti_transfer","no_resi","kurir","catatan","system_note","payment_status","alamat_lengkap"
    ];
        protected $guarded = [
            'id_transaksi',
             'kode_transaksi'
            ];
    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
                $digits = 2;
                $random = rand(pow(10, $digits-1), pow(10, $digits)-1);
                $model->kode_transaksi = IdGenerator::generate(['table' => $model->getTable(),'length' => '21','prefix' => "TK-".$random.date("YmdHi")."-",'field' => "kode_transaksi"]);
            }
        });
    }

    public function TransactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'id_transaksi');
    }

    public function UserAddress()
    {
        return $this->belongsTo(UserAddress::class, 'id_alamat');
    }


    public function user(){
        return $this->belongsTo(User::class,'id_pengguna','id_pengguna');
    }


}
