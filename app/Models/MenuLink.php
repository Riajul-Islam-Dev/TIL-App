<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'menu_name', // Add any additional attributes you want to mass-assign
        'url',
        'parent_id',
        'menu_type',
        'order',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'parent_id' => 'integer',
        'order' => 'integer',
    ];

    public static function tree()
    {
        $allMenuLinks = MenuLink::get();

        $rootMenus = $allMenuLinks->whereNull('parent_id');

        self::formatTree($rootMenus, $allMenuLinks);

        return $rootMenus;
    }

    private static function formatTree($rootMenuLinks, $allMenuLinks)
    {
        foreach ($rootMenuLinks as $rootMenuLink) {
            $rootMenuLink->children = $allMenuLinks->where('parent_id', $rootMenuLink->menu_id)->values();

            if ($rootMenuLink->children->isNotEmpty()) {
                self::formatTree($rootMenuLink->children, $allMenuLinks);
            }
        }
    }
}
