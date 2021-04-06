<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressData extends Model {
    use SoftDeletes;

    protected $table = 'address_data';

    protected $fillable = [
        'family_name',
        'first_name',
        'kana_family',
        'kana_name',
        'post_num',
        'address1',
        'address2',
        'mail_address',
        'phone_num',
        'memo'
    ];

    protected function rules() {
        return [
        'family_name' => 'required',
        'first_name' => 'required',
        'kana_family' => 'required',
        'kana_name' => 'required',
        'post_num' => 'required',
        'address1' => 'required',
        ];
    }
}
