<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSourceRequest;
use App\Http\Requests\EditSourceRequest;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::/*with('news')->*/paginate(10);
        
        return view('admin.sources.index',[
            'sources' => $sources
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSourceRequest $request)
    {
        $source = Source::create($request->validated());

        if($source) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.store.success'));
        }

        return back()->with('error', __('messages.admin.sources.store.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source' => $source
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(EditSourceRequest $request, Source $source)
    {
        $source = $source->fill($request->validated())->save();

        if($source){
            return redirect()->route('admin.sources.index')
            ->with('success', __('messages.admin.sources.update.success'));
        }

        return back()->with('error', __('messages.admin.sources.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        try{
			$source->delete();

			return response()->json(['success' => true]);
		}catch (\Exception $e) {
			\Log::error($e->getMessage() . PHP_EOL, $e->getTrace());

			return response()->json(['success' => false]);
		}
    }
}
