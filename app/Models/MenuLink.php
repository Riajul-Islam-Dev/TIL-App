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
    ];

    public static function tree($menuLinks)
    {
        // Convert the array of menu links to a collection
        $menuLinksCollection = collect($menuLinks);

        // Now you can use the groupBy() method on the collection
        $menuLinksByParentId = $menuLinksCollection->groupBy('parent_id');

        $rootMenuLinks = $menuLinksByParentId[null] ?? collect();

        return self::buildTree($rootMenuLinks, $menuLinksByParentId);
    }


    private static function buildTree($menuLinks, $menuLinksByParentId)
    {
        return $menuLinks->map(function ($menuLink) use ($menuLinksByParentId) {
            $children = $menuLinksByParentId[$menuLink->menu_id] ?? collect();
            $menuLink->children = $children->count() > 0 ? self::buildTree($children, $menuLinksByParentId) : collect();
            return $menuLink;
        });
    }
}
