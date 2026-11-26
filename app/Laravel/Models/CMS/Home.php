<?php

namespace App\Laravel\Models\CMS;

use Illuminate\Database\Eloquent\Model;


class Home extends Model
{
    /**
     * Enable soft delete in table
     * @var boolean
     */
    protected $softDelete = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_home';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['section', 'title', 'content'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that created within the model.
     *
     * @var array
     */
    protected $appends = [];

    public function getDirectoryAttribute($value)
    {
        return str_replace(env("AWS_S3_URL"), env("AWS_S3_CDN"), $value);
    }

    public function user()
    {
        return $this->belongsTo('App\Laravel\Models\User', 'user_id', 'id');
    }
}
