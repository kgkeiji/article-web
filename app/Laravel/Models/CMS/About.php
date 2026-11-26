<?php

namespace App\Laravel\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'cms_about';

    protected $fillable = ['section', 'title', 'content'];
}
