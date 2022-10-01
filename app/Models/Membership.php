<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'users_id',
        'membership_types_id',
        'init_date',
        'expiration_date',
        'asigned_by',
        'estatus_membresia'
    ];
    public function Membership_pay()
    {
        return $this->belongsToMany(MembershipPay::class, 'memberships_id', 'membership_pays_id')->withPivot('membership_membership_pays');
    }
}
