<?php

namespace Modules\VineetAgarwalaFandu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intrests extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\VineetAgarwalaFandu\Database\factories\IntrestsFactory::new();
    }
}