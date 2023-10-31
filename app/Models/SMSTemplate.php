<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSTemplate extends Model
{
    use HasFactory;
    protected $table = 'sms_template';
    protected $fillable = [
        'sms_desc',
        'sms_message',
        'sms_query',
    ];
}
