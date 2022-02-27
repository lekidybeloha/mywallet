<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Helpers\ModelHelper;
use App\Helpers\RelationPaginator;
use Illuminate\Http\Request;

class ApprovisionnementController extends Controller
{
    private $relationPaginator;
    private $modelHelper;
    private $redirector;

    public function __construct()
    {
        $this->relationPaginator    = new RelationPaginator();
        $this->modelHelper          = new ModelHelper();
        $this->redirector           = new RedirectHandler();
    }

    /**
     * Show approvisionnement section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $approvisionnements = $this->relationPaginator->getUserRelationWithPagination('approvisionnements');;
        return view('dashboard.approvisionnements', compact('approvisionnements'));
    }
}
