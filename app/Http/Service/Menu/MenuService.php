<?php

namespace App\Http\Service\Menu;

use App\Models\MenuModel;
use Illuminate\Http\Request;


class MenuService
{
    public function getMenu()
    {
        try {
            $menu = MenuModel::select('id', 'title')->get();
            return $menu;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addMenu(Request $request)
    {
        try {
            $menu = MenuModel::create([
                "title" => $request->title
            ]);
            return $menu;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function deleteMenu(Request $request)
    {
        try {
            $menu = MenuModel::where("id", $request->menu_id)->delete();
            return $menu;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function updateMenu(Request $request)
    {
        try {
            $menu = MenuModel::where("id", $request->menu_id)->first();
            $menuUpdate = MenuModel::where("id", $request->menu_id)->update([
                "title" => $request->title ?? $menu->title
            ]);
            return $menuUpdate;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
