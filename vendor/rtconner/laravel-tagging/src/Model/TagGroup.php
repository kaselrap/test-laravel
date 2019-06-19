<?php namespace Conner\Tagging\Model;

use Conner\Tagging\Contracts\TaggingUtility;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Copyright (C) 2014 Robert Conner
 * @package Conner\Tagging\Model
 * @property string id
 * @property string slug
 * @property string name
 * @property-read Collection|Tag[] tags
 */
class TagGroup extends Eloquent
{
    protected $table = 'tagging_tag_groups';
    public $timestamps = false;
    protected $softDelete = false;
    public $fillable = ['name'];

    /** @var TaggingUtility $taggingUtility */
    protected $taggingUtility;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (function_exists('config') && $connection = config('tagging.connection')) {
            $this->connection = $connection;
        }

        $this->taggingUtility = app(TaggingUtility::class);
    }

    /**
     * Get suggested tags
     */
    public function tags()
    {
        $model = $this->taggingUtility->tagModelString();

        return $this->hasMany($model, 'tag_group_id');
    }

    /**
     * sets the slug when setting the group name
     *
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
