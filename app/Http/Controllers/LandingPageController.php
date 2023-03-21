<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    protected $metaTag=array();

    public function __construct()
    {
        $this->metaTag['title']='Harma Digital VT';
        $this->metaTag['description']='Virtual Tour by Harma-Digital';
        $this->metaTag['tag']='Vitual Tour, 360, Harma-Digital, Semarang, Indonesia, VT';
        $this->metaTag['url']=url('/');
        $this->metaTag['time']=date('Y-m-d H:i:s');
        $this->metaTag['image']= asset('front/img/logo-green.png');
        $this->metaTag['image_logo_horizontal']=asset('front/img/logo-green.png');
        $this->metaTag['favicon']=asset('front/img/favicon.ico');
        $this->metaTag['apple_touch']=asset('front/img/apple-touch-icon.png');
        $this->metaTag['g_analytics']='G-GZZS0CSHNN';
    }

    public function index(Request $request)
    {
        $this->metaTag['section']='Home';
        $metaTag=$this->metaTag;

        $keyword = $request->keyword;
        
        $forms = Form::with('type')
                    ->orderBy('id','DESC')
                    ->where('nama_vt', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('excerpt', 'LIKE', '%'.$keyword.'%')
                    ->paginate(6);
        return view('welcome', compact('metaTag','forms','keyword'));
    }

    public function detail_vt($slug)
    {
        $form = Form::with('type')->where('slug',$slug)->firstOrFail();
        $this->metaTag['section']='Virtual Tour '.$form->nama_vt;
        $this->metaTag['title']= $this->metaTag['title'].' | '.$form->seo_tittle;
        $this->metaTag['time']=Carbon::parse($form->created_at);
        $this->metaTag['description']='Virtual Tour '.$form->nama_vt.' by Harma-Digital';
        
        $metaTag=$this->metaTag;

        return view('details-vt', compact('metaTag','form'));
    }

    public function search(Request $request){

        $this->metaTag['section']='Home';
        $metaTag=$this->metaTag;

        $keyword = $request->keyword;
        
        $forms = Form::with('type')
                    ->orderBy('id','DESC')
                    ->where('nama_vt', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('excerpt', 'LIKE', '%'.$keyword.'%')
                    ->paginate(6);
        return view('search', compact('metaTag','forms','keyword'));
    }
}
