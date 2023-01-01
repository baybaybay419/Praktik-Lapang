<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function firstParty()
    {
        return $this->hasOne(FirstParty::class, 'first_party_id');
    }

    public function secondParty()
    {
        return $this->hasOne(SecondParty::class, 'second_party_id');
    }

    public function newsletterLogs()
    {
        return $this->hasMany(NewsletterLog::class);
    }
}
