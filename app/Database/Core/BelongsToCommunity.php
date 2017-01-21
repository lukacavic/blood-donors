<?php namespace App\Database\Core;

use App\Database\Community\Community;

trait BelongsToCommunity
{
    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }
}