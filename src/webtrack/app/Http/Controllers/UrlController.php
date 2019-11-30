<?php

namespace App\Http\Controllers;
use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::latest()->paginate(5);
        return view('urls.index',compact('urls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'detail' => 'required',
        ]);
        $url = new Url();
        $url->user_id = Auth::id();
        $url->url = $request->url;
        $url->detail = $request->detail ;
        $url->is_crawled = false;
        $url->save();

        //Url::create($request->all());

        return redirect()->route('url.index')
            ->with('success','urls created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Url $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        return view('urls.show',compact('urls'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Url $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        return view('urls.edit',compact('url'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Url $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        $request->validate([
            'url' => 'required',
            'detail' => 'required',
        ]);
        //$url->user_id = Auth::id();
        $url->url = $request->url;
        $url->detail = $request->detail ;
        $url->is_crawled = false;
        $url->update();

        return redirect()->route('url.index')
            ->with('success','Url updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Url $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        $url->delete();

        return redirect()->route('url.index')
            ->with('success','Url deleted successfully');
    }
}
