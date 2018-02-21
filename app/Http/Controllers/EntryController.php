<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;
use GrahamCampbell\Markdown\Facades\Markdown;

class EntryController extends Controller
{
	/**
	* @var DeliveryClient
	*/
	private $client;

	public function __construct(DeliveryClient $client)
	{
		$this->client = $client;
	}

	/* All Entries from Contentful */
	public function getEntries()
	{
		$query = new \Contentful\Delivery\Query;
		//$query->where('sys.contentType.sys.id', 'highlight', 'ne');
		//$query->orderBy('sys.createdAt');

		$entries = $this->client->getEntries($query);

		$entriesArr = [];
		foreach($entries as $key => $entry) {
			$date = $entry->getDate();
			$thisEntry = [
				'contentType' => $entry->getContentType()->getName(),
				'contentTypeSlug' => str_slug( $entry->getContentType()->getName() ),
				'id' => $entry->getId(),
				'date' => $date->format('m/d/Y'),
				'timestamp' => $date->getTimestamp(),
				'title' => $entry->getTitle(),
				'previewText' => $entry->getPreviewText(),
				//'image' => $entry->getImageUrl()
			];
			array_push($entriesArr, $thisEntry);
		}

		$entriesSorted = collect($entriesArr)
			->sortByDesc('timestamp')
			->values();

		return response()->json($entriesSorted);
	}

	/* Single Entry from Contentful */
	public function getEntry($id)
	{
		$entry = $this->client->getEntry($id);

		$modelEntry = new Entry;
		//$modelEntry->id = $entry->getId();
		//$modelEntry->image = $entry->getImageUrl();
		$modelEntry->title = $entry->getTitle();
		$modelEntry->body = Markdown::convertToHtml( $entry->getBody() );
		//$modelEntry->imageFill = $entry->getImageFill();

		//return view('highlight')->with( [ 'highlight' => $highlight ] );
		return response()->json($modelEntry);
	}

	/* Entries of Type from Contentful */
	public function getEntriesOfType($type)
	{
		$query = new \Contentful\Delivery\Query;
		$query->setContentType($type);
		$entriesOfType = $this->client->getEntries($query);

		$entriesArr = [];
		foreach($entriesOfType as $key => $entry) {
			$date = $entry->getDate();
			$thisEntry = [
				'contentType' => $entry->getContentType()->getName(),
				'contentTypeSlug' => str_slug( $entry->getContentType()->getName() ),
				'id' => $entry->getId(),
				'date' => $date->format('m/d/Y'),
				'timestamp' => $date->getTimestamp(),
				'title' => $entry->getTitle(),
				'previewText' => $entry->getPreviewText(),
				//'image' => $entry->getImageUrl()
			];
			array_push($entriesArr, $thisEntry);
		}

		return response()->json($entriesArr);
	}
}