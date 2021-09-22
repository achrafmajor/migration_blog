<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'desciption',
        'content',
        'statut',
        'seo_titel',
        'seo_description',
        'seo_keyword',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        $image = $this->getFirstMediaUrl("cover");
        return  ( $image) ? $image : "https://image.shutterstock.com/image-vector/picture-vector-icon-no-image-260nw-1732584341.jpg";
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }
}
