<?php

namespace App\Transformers;

use App\Incident;
use League\Fractal;

class IncidentTransformer extends Fractal\TransformerAbstract {

	protected $defaultIncludes = ['updates'];

	public function transform(Incident $incident)
	{
		return [
			'service_id' => $incident->service_id,
			'url' => $incident->url(),
			'title' => $incident->title,
			'state' => $incident->state,
			'day' => $incident->created_at->format('m-d-Y'),
			'resolved_at' => $incident->resolved_at,
			'day_url' => $incident->dayUrl()
		];
	}

	public function includeUpdates(Incident $incident)
	{
		return $this->collection($incident->updates()->orderByDesc('id')->get(), new IncidentUpdateTransformer);
	}

}