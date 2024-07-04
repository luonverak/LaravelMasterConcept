<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;

class MenuController extends Controller
{
    private $menuService;
    public function __construct()
    {
        $this->menuService = new MenuService();
    }
    public function getMenu()
    {
        try {
            $menu = $this->menuService->getMenu();

            if (!$menu->count() > 0) {
                return response()->json([
                    "status" => "success",
                    "msg" => "Data empty"
                ]);
            }

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "menus" => $menu
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function addMenu(Request $request)
    {
        try {
            if (!$request->has("title")) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.1 Something wrong"
                ]);
            }
            $menu = $this->menuService->addMenu($request);
            if (!$menu) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.2 Something wrong"
                ]);
            }
            return response()->json([
                "status" => "success",
                "msg" => "Success"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function deleteMenu(Request $request)
    {
        try {
            if (!$request->has("menu_id")) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.1 Something wrong"
                ]);
            }
            $menu = $this->menuService->deleteMenu($request);
            if (!$menu) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.2 Something wrong"
                ]);
            }
            return response()->json([
                "status" => "success",
                "msg" => "Delete success"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function updateMenu(Request $request)
    {
        try {
            if (!$request->has("menu_id")) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.1 Something wrong"
                ]);
            }
            $menu = $this->menuService->updateMenu($request);
            if (!$menu) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.2 Something wrong"
                ]);
            }
            return response()->json([
                "status" => "success",
                "msg" => "Update success",
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
