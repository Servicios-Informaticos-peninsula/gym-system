<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberShipMembershipPay extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'memberships_id',
        'membership_pays_id',

    ];
    protected $table = "membership_membership_pays";


}
