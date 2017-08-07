<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ConversionResult extends Model
{
    protected $fillable = [
        'subject',
        'result'
    ];

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'DESC')
            ->limit(50)
            ->get();
    }

    public function scopeTopTen($query)
    {
        return $query->select('*', DB::raw('COUNT(subject) AS occurrences'))
            ->groupBy('subject')
            ->orderBy('occurrences', 'DESC')
            ->limit(10)
            ->get();
    }
}
