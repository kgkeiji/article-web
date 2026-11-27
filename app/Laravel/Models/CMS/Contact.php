<?php

namespace App\Laravel\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'cms_contact';

    protected $fillable = ['section', 'title', 'content'];
}
