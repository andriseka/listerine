<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Illuminate\Http\Request;

class QrGeneratorController extends Controller
{
    public function get_scan($params)
    {
        $getQr = QrGenerate::where('slug', $params)->first();

        if ($getQr) {

            $count = $getQr->count_scan + 1;

            $getQr->update(['count_scan' => $count]);

            $response = [
                'message' => 'Successfully'
            ];

            return response($response);
        }
    }
}
