<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id','users_id', 'membership_types_id', 'init_date', 'expiration_date', 'asigned_by'];

    /**
     * Get the MembershipType associated with the Membership
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function MembershipType()
    {
        return $this->hasOne(MembershipType::class, 'id', 'membership_types_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
}
