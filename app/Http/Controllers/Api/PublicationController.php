<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PublicationCollection;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        return new PublicationCollection(Publication::all());
    }

    public function top()
    {
        return new PublicationCollection(Publication::where('top', 1)->get());
    }
}
