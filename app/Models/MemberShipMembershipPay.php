<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShipMembershipPay extends Model
{
    use HasFactory;
    protected $fillable = [
        'memberships_id',
        'membership_pays_id',

    ];
    protected $table = "membership_membership_pays";
//    // protected $dates = ['deleted_at'];

}
