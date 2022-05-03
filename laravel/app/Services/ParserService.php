<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser as Contract;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as Parser;
use App\Models\ParsedNews;

class ParserService implements Contract
{
    protected string $url;

	/**
	 * @param string $url
	 * @return ParserService
	 */
	public function setUrl(string $url): self
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return void
	 */
	public function saveNews()
	{
		$xml = Parser::load($this->url);
		$data =  $xml->parse([
			'news' => [
				'uses' => 'channel.item[title,link,guid,description,pubDate]'
			]
		]);
        // dd($data);
        foreach ($data as $items) {
            foreach ($items as $item) {
                ParsedNews::create($item);
            }
        }

    }
}
