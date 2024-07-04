<?php

namespace App\Http\Controllers\Logo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Logo\LogoService;
use App\Models\LogoModel;

class LogoController extends Controller
{
    private $logoService;
    public function __construct()
    {
        $this->logoService = new LogoService();
    }
    public function getLogo()
    {
        try {
            $logo = $this->logoService->getLogo();
            if (!$logo->count() > 0) {
                return response()->json([
                    "status" => "success",
                    "msg" => "Data empty"
                ]);
            }
            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "logo" =>  $logo
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function uploadLogo(Request $request)
    {
        try {
            if (!$request->file("logo")) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.1 Something wrong"
                ]);
            }
            $logo = $this->logoService->uploadLogo($request);
            if (!$logo) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "0.2 Something wrong"
                ]);
            }
            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "logo" => $logo
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
