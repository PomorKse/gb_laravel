<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;
use App\Models\News;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
   protected string $url;

   public function setUrl(string $url): self
   {
	   $this->url = $url;
	   return $this;
   }

   public function getUrl(): string
   {
	   return $this->url;
   }

	 public function start(): void
   {
	   $xml = XmlParser::load($this->getUrl());

	   $data = $xml->parse([
		   'title' => [
			   'uses' => 'channel.title'
		   ],
		   'link' => [
			   'uses' => 'channel.link'
		   ],
		   'description' => [
			   'uses' => 'channel.description'
		   ],
		   'image' => [
			   'uses' => 'channel.image.url'
		   ],
			 'news_title' => [
				'uses' => 'channel.item[title]'
				],
				'news_description' => [
					'uses' => 'channel.item[description]'
				],
	   ]);

		 for ($i=0; $i < count($data); $i++) { 
			 $news = News::create([
				'source_id' => 3,
				'category_id' => 1,
				'title' => Arr::get($data, 'news_title.' . $i . '.title'),
				'description' => mb_strimwidth(Arr::get($data, 'news_description.' . $i . '.description'),0,255),
				]);
		 }

   }
}