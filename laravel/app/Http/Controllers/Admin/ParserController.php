<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Jobs\NewsParser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resource;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
		$urls = Resource::all();

         foreach ($urls as $url) {
             dispatch(new NewsParser($url->site_url));
         }

         return response("Works");

     }
}
