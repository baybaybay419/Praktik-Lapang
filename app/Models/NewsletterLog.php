<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class, 'news_id');
    }
}
