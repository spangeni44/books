<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded =[];

    public function submenus()
    {
        return $this->hasMany(Menu::class,'menu_id');
    }

    public function parent_menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
