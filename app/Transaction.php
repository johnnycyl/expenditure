<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
    protected $fillable = ['name', 'price', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function total($transactions)
    {
        if ($transactions)
        {
            return $transactions->where('user_id', '=', auth()->id())->sum('price');
        }

        return static::where('user_id', '=', auth()->id())->sum('price');
    }

    public static function typeBreakdown($month, $year)
    {
        if ($month)
        {
            return static::selectRaw('type, sum(price) as total_spent, sum(price) / (select sum(price) from transactions) * 100 as percentage')
                ->where('user_id', '=', auth()->id())
                ->whereMonth('created_at', Carbon::parse($month)->month)
                ->whereYear('created_at', $year)
                ->groupBy('type')
                ->orderBy('type', 'asc')
                ->get();
        }

        return static::selectRaw('type, sum(price) as total_spent, sum(price) / (select sum(price) from transactions) * 100 as percentage')
            ->where('user_id', '=', auth()->id())
            ->groupBy('type')
            ->orderBy('type', 'asc')
            ->get();
    }

    public static function largestTransactions($transactions)
    {
        if ($transactions)
        {
            return $transactions->where('user_id', '=', auth()->id())
                ->orderBy('price', 'desc')
                ->get();
        }

        return static::where('user_id', '=', auth()->id())
            ->orderBy('price', 'desc')
            ->get();
    }

    public static function transactionsCount($transactions)
    {
        if ($transactions)
        {
            return $transactions->where('user_id', '=', auth()->id())
                ->count();
        }

        return static::where('user_id', '=', auth()->id())
            ->count();
    }

    public static function mostTransactionTypes($month, $year)
    {
        if ($month)
        {
            return static::selectRaw('type, count(type) as count')
                ->where('user_id', '=', auth()->id())
                ->whereMonth('created_at', Carbon::parse($month)->month)
                ->whereYear('created_at', $year)
                ->groupBy('type')
                ->orderBy('count', 'desc')
                ->get();
        }

        return static::selectRaw('type, count(type) as count')
            ->where('user_id', '=', auth()->id())
            ->groupBy('type')
            ->orderBy('count', 'desc')
            ->get();
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw("extract(year from created_at) as year, trim(to_char(created_at, 'Month')) as month")
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }
}
