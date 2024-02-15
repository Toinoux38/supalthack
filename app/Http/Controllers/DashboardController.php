<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function View()
    {
        $top10 = GraphControlleur::DisplayTop10ApplicationsParClient();
        $evolutiontop5 = GraphControlleur::evolutionMontantsTop5Clients();
        $evolutionVolumesProduits = GraphControlleur::evolutionVolumesProduits();
        return view("dashboard",
        [
            "top10" => $top10,
            "evolutiontop5" => $evolutiontop5,
            "evolutionVolumesProduits" => $evolutionVolumesProduits,
        ]
        );
    }
}
