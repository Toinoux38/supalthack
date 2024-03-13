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

    public function ViewTopDix(){
        $top10 = GraphControlleur::DisplayTop10ApplicationsParClient();
        return view("topdix",
            [
                "top10" => $top10,
            ]
        );
    }

    public function ViewTopCinq(){
        $evolutiontop5 = GraphControlleur::evolutionMontantsTop5Clients();
        return view("topcinq",
            [
                "evolutiontop5" => $evolutiontop5,
            ]
        );
    }

    public function ViewVolume(){
        $evolutionVolumesProduits = GraphControlleur::evolutionVolumesProduits();
        $evolutionVolumesProduits2 = GraphControlleur::evolutionVolumesProduits2();

        return view("volume",
            [
                "evolutionVolumesProduits" => $evolutionVolumesProduits,
                "evolutionVolumesProduits2" => $evolutionVolumesProduits2,

            ]
        );
    }
}
