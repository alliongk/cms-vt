<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use DataTables;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }

    public function data()
    {
        $forms = Form::with('type');
        return DataTables::eloquent($forms)->make(true);
    }

    public function create()
    {
        $tp = Type::all();
        
        return view('forms.create', compact('tp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_vt' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'link_vt' => 'required',
            'seo_tittle' => 'required',
            'seo_desc' => 'required',
            'logo' => [
                'required',
                File::types(['jpg','png','jpeg'])->max(1 * 1024),
            ],
        ]);
        
        $logo=$request->logo;
        $logoURL=$logo->storeAs("file/".date("Y/m/d"),md5(uniqid()).$logo->hashName());

        $attrclean['code_qr']=strtotime(date('YmdHis')).Str::random(15);
        $attrclean['path_qr'] = 'qrcode/' . $attrclean['code_qr'] . '.png';
        $pathin = storage_path('app/public/qrcode/' . $attrclean['code_qr'] . '.png');

        \QrCode::size(500)
            ->format('png')
            ->margin(5)
            ->generate($request->link_vt, $pathin);

        Form::create([
            'path_logo'=>$logoURL,
            'path_qr'=>$attrclean['path_qr'],
            'nama_vt' => $request->nama_vt,
            'slug'=>Str::random(5).'-'.Str::slug($request->nama_vt),
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'status' => $request->status,
            'type_id' => $request->type_id,
            'link_vt' => $request->link_vt,
            'seo_tittle' => $request->seo_tittle,
            'seo_desc' => $request->seo_desc,
        ]);

        return redirect('forms');
    }

    public function edit($id)
    {   
        $tp = Type::all();
        $form = Form::with('type')->findOrFail($id);
        return view('forms.edit', compact('form', 'tp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_vt' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'link_vt' => 'required',
            'seo_tittle' => 'required',
            'seo_desc' => 'required',
            'logo' => [
                File::types(['jpg','png','jpeg'])->max(1 * 1024),
            ],
        ]);

        $form = Form::findOrFail($id);

        if(isset($request->logo)){
            $logo=$request->logo;
            $form->path_logo=$logo->storeAs("file/".date("Y/m/d"),md5(uniqid()).$logo->hashName());
        }
        if($request->link_vt!=$form->link_vt){
            $attrclean['code_qr']=strtotime(date('YmdHis')).Str::random(15);
            $attrclean['path_qr'] = 'qrcode/' . $attrclean['code_qr'] . '.png';
            $pathin = storage_path('app/public/qrcode/' . $attrclean['code_qr'] . '.png');

            \QrCode::size(500)
                ->format('png')
                ->margin(5)
                ->generate($request->link_vt, $pathin);
            
                $form->path_qr=$attrclean['path_qr'];
        
        }

        $form->nama_vt=$request->nama_vt;
        $form->excerpt=$request->excerpt;
        $form->description=$request->description;
        $form->status=$request->status;
        $form->type_id=$request->type_id;
        $form->link_vt=$request->link_vt;
        $form->seo_tittle=$request->seo_tittle;
        $form->seo_desc=$request->seo_desc;
        $form->save();

        return redirect('forms');
    }

    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
        return response()->json(['status'=>true,'data'=>$form], 200);
    }

}