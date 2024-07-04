<?php

namespace App\Http\Service\Logo;

use App\Models\LogoModel;
use Illuminate\Http\Request;

class LogoService
{
    public function getLogo()
    {
        try {
            $logo = LogoModel::select(['logo_image'])->limit(1)->orderByDesc('id')->get();
            $record = $logo->map(function ($row) {
                return [
                    "logo" => url("images/$row->logo_image")
                ];
            });
            return $record;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function uploadLogo(Request $request)
    {
        try {
            $file = $request->logo;
            $fileName = rand(1, 999999) . '-' . $file->getClientOriginalName();
            $file->move("images", $fileName);
            $logo =  LogoModel::create([
                "logo_image" => $fileName
            ]);
            if ($logo) {
                return $fileName;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
