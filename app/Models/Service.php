<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'icon',
        'title',
        'desciption',
        'content',
        'position',
        'statut',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
    ];
    protected $appends = [ 'image_url'];
    public function getImageUrlAttribute()
    {
        $image = $this->getFirstMediaUrl("image");
        return  ( $image) ? $image : "https://image.shutterstock.com/image-vector/picture-vector-icon-no-image-260nw-1732584341.jpg";
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }
}
