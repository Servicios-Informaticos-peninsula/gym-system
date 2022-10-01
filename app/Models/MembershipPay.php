<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPay extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_line',
        'estatus',

    ];
    public function Membership()
    {
        return $this->belongsToMany(Membership::class, 'membership_membership_pays', )->withPivot();
    }
}
