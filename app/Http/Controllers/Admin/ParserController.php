<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Parser;
use App\Jobs\NewsJob;
use App\Models\Source;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request, Source $source, Parser $parser)
    {
        foreach ($source->where('is_parsed', 0)->get() as $link) {
            dispatch(new NewsJob($link->domain));
        }

        echo "Спасибо, парсинг начался";

    }

}
