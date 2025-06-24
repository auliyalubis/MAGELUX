<?php

namespace App\Http\Controllers;

use view;
use App\Models\PointsModel;
use Illuminate\Http\Request;
use App\Models\PolygonsModel;
use App\Models\PolylinesModel;
use App\Models\SaranDestinasi;

class TableController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Table',
            'points' => $this->points->paginate(5),
        ];
        return view ('table', $data);
    }
}
