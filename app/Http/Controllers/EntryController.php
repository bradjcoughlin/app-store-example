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
		//$query->where('sys.contentType.sys.id', 'platformSoftware', 'eq');
		//$query->orderBy('sys.createdAt');

		$query->setContentType('platformSoftware')
			->orderBy('fields.name');

		$entries = $this->client->getEntries($query);

		$entriesArr = [];
		foreach($entries as $key => $entry) {
			//$date = $entry->getDate();
			$thisEntry = [
				'id' => $entry->getId(),
				'name' => $entry->getName(),
				'type' => $entry->getType(),
				'typeSlug' => str_slug($entry->getType()),
				'description' => $entry->getDescription(),
				'iconUrl' => $entry->getIconUrl(),
				'creator' => $entry->getCreator()
			];
			array_push($entriesArr, $thisEntry);
		}

		/*$entriesSorted = collect($entriesArr)
			->sortByDesc('timestamp')
			->values();*/

		//return response()->json($entriesSorted);
		return response()->json($entriesArr);
	}

	/* Single Entry from Contentful */
	public function getEntry($id)
	{
		$entry = $this->client->getEntry($id);

		$modelEntry = new Entry;
		$modelEntry->iconUrl = $entry->getIconUrl();
		$modelEntry->name = $entry->getName();
		$modelEntry->creator = $entry->getCreator();
		$modelEntry->creatorWebsiteUrl = $entry->getCreatorWebsiteUrl();
		$modelEntry->description = Markdown::convertToHtml( $entry->getDescription() );
		$modelEntry->screenshots = $entry->getScreenshots();
		$modelEntry->video = $entry->getVideo();


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