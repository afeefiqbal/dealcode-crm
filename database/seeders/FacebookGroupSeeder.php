<?php

namespace Database\Seeders;

use App\Models\FacebookGroup;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class FacebookGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arr = [
            [
                "name" => "Appsumo",
                "link" => "https://www.facebook.com/groups/ltdplace",
            ],
            [
                "name" => "Kenmoo lifetime deals",
                "link" => "https://www.facebook.com/groups/softwarelifetimedealsappsumosaasltdkenmoo",
            ],
            [
                "name" => "SaasWarrior",
                "link" => "https://www.facebook.com/groups/SaasWarrior",
            ],
            [
                "name" => "Miss lifetime deals",
                "link" => "https://www.facebook.com/groups/missedltd"
            ],
            [
                "name" => "LTDee.com",
                "link" => "https://www.facebook.com/groups/ltdee"
            ],
            [
                "name" => "Lifetime software and courses LTD group",
                "link" => "https://www.facebook.com/groups/lifetimeoffers"
            ],
            [
                "name" => "Martech wise",
                "link" => "https://www.facebook.com/groups/martechwise"
            ],
            [
                "name" => "Saastribe.net",
                "link" => "https://www.facebook.com/groups/missltd"
            ],
            [
                "name" => "VoviLTD",
                "link" => "https://www.facebook.com/groups/VoviLTD"
            ],
            [
                "name" => "Saas Signal",
                "link" => "https://www.facebook.com/groups/saassignal"
            ],
            [
                "name" => "LTD hunt",
                "link" => "https://www.facebook.com/groups/ltdhunt"
            ],
            [
                "name" => "Lifetime tech deals community",
                "link" => "https://www.facebook.com/groups/Lifetimedeals247"
            ],
            [
                "name" => "Use Your LTDs Broz & Sisz - Buy/Sell/Trading Hub",
                "link" => "https://www.facebook.com/groups/useyourltdstrade"
            ],
            [
                "name" => "Official Appsumo",
                "link" => "https://www.facebook.com/groups/OfficialAppSumo"
            ],
            [
                "name" => "Software buy and sell",
                "link" => "https://www.facebook.com/groups/SoftwareLifetimeDeals"
            ],
            [
                "name" => "Bring Again Buy & Sell LifeTime",
                "link" => "https://www.facebook.com/groups/bringagainlifetimedeal"
            ],
            [
                "name" => "Appsumo Stack social",
                "link" => "https://www.facebook.com/groups/appsumo.lifetime.deals"
            ],
            [
                "name" => "Software shed",
                "link" => "https://www.facebook.com/groups/softwareshed"
            ],
            [
                "name" => "Saas Review club",
                "link" => "https://www.facebook.com/groups/saasreviewclub"
            ],
            [
                "name" => "Use Your LTDs Broz & Sisz- Appsumo/Saasmantra/Pitchground/Dealify",
                "link" => "https://www.facebook.com/groups/useyourappsumoltds"
            ],
            [
                "name" => "Saaszilla",
                "link" => "https://www.facebook.com/groups/saaszillalifetimedeals"
            ],
            [
                "name" => "Lifetime Deal (LTD) SAAS & Internet Marketing Software",
                "link" => "https://www.facebook.com/groups/378382549519424"
            ],
            [
                "name" => "Prime Lifetime Deals by Dev Hisaria",
                "link" => "https://www.facebook.com/groups/primelifetimedeals"
            ],
            [
                "name" => "Get Lifetime Deals Alerts - pitchground Appsumo, Stacksocial, SaasMantra !",
                "link" => "https://www.facebook.com/groups/GetLifetimedeals"
            ],
            [
                "name" => "Lifetime deal fans",
                "link" => "https://www.facebook.com/groups/getltd"
            ],
            [
                "name" => "Software topics",
                "link" => "https://www.facebook.com/groups/softwaretopics"
            ],
            [
                "name" => "Best lifetime deals",
                "link" => "https://www.facebook.com/groups/lifetimedealsforbusinessowners"
            ],
            [
                "name" => "LTD Spot",
                "link" => "https://www.facebook.com/groups/ltdspothq"
            ],
            [
                "name" => "Sumo deals",
                "link" => "https://www.facebook.com/groups/sumodeals"
            ],
            [
                "name" => "Ztech trendzone lifetime deals",
                "link" => "https://www.facebook.com/groups/saaslifetimedeal"
            ],
            [
                "name" => "SaasWiz",
                "link" => "https://www.facebook.com/groups/SaaSWiz"
            ],
            [
                "name" => "Saas launchpad",
                "link" => "https://www.facebook.com/groups/saaslaunchpadhq"
            ],
            [
                "name" => "Saas what",
                "link" => "https://www.facebook.com/groups/LifeTimeSubscriptions"
            ],
            [
                "name" => "Download silo",
                "link" => "https://www.facebook.com/groups/downloadsilo"
            ],
            [
                "name" => "Digital launchpad",
                "link" => "https://www.facebook.com/groups/145887813414237"
            ]
        ];

        FacebookGroup::insert($arr);
    }
}
