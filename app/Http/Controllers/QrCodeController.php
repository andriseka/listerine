<?php

namespace App\Http\Controllers;

use App\Models\QrGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {
        $qr = QrGenerate::select('name', 'slug', 'qrcode')->get();
        return view('qrcode.index', compact('qr'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {

            $qrName = $request->name;

            // Validation
            $this->validate($request,
                [
                    'name' => 'required|string|max:255|unique:qr_generates,name,'
                ],
                [
                    'name.unique' => 'Nama QRCODE sudah digunakan'
                ]
            );

            $qr = $qrName.'.'.'png';
            QrCode::format('png')->size(500)->merge(public_path('assets/logo/logo-listerine.jpg'), .3, true)
                        ->generate(route('qrcode.get-scan', Str::slug($qrName)), public_path('uploads/qrgenerate/'. $qr));

            $data = [
                'name' => $qrName,
                'slug' => Str::slug($qrName),
                'qrcode' => $qr,
            ];


            QrGenerate::create($data);

            return back();
        }
    }


    public function get_scan($param)
    {

        $qr = QrGenerate::where('slug', $param)->first();

        if ($qr->slug == 'mrt' || $qr->slug == 'lift') {

            $count = $qr->count + 1;

            $qr->update(['count' => $count]);

            return redirect()->to('https://listerinejagamulut.com');
        } else {
            return redirect()->to('https://beta.listerinejagamulut.com');
        }


    }

    public function destroy($slug)
    {
        $qr = QrGenerate::where('slug', $slug)->first();

        File::delete(public_path('uploads/qrgenerate/'. $qr->qrcode));

        $qr->delete();

        return back();
    }
}
