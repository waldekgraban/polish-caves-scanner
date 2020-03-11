<?php

namespace Waldekgraban\Scanner\Tests\Unit;

use Waldekgraban\Scanner\Parser\Cave;
use Waldekgraban\Scanner\Tests\TestCase;

class CaveTest extends TestCase
{
    protected $cave;

    protected function setUp(): void
    {
        $name                  = 'Grota w Mechowej';
        $other_names           = 'Mechauer Höhle, Grota w Mechowej, Jaskinia w Mechowej koło Pucka, "Groty Mechowskie", "Grota Mechowska". ';
        $inventory_number      = 'NP-01 ';
        $region                = 'Niż Polski';
        $coordinates_wgs84     = 'λ: 18°17′04,80″, φ: 54°42′48,65″';
        $community             = 'Puck (gm. wiejska)';
        $county                = 'pucki ';
        $voivodeship           = 'pomorskie';
        $owner                 = 'Komunalny | Pomnik przyrody ';
        $basis_of_protection   = 'Dz. Urz. WRN nr 1, poz. 4, 1955 r. ';
        $hole_exposure         = 'S';
        $other_holes           = '';
        $absolute_height       = '56';
        $relative_height       = '';
        $depth                 = '0';
        $exceeds               = '0';
        $drop                  = '0';
        $length                = '61';
        $horizontal_extension  = '';
        $geographical_location = 'Jaskinia jest usytuowana we wschodniej części miejscowości Mechowo';
        $description_of_access = 'Dojazd i dojście do jaskini są oznakowane';
        $description           = 'Jaskinia posiada kilka otworów.';
        $research_history      = '';
        $exploration_history   = 'askinia została po raz pierwszy opisana i skartowana przez Radcę Miasta Gdańska Kleefelda w 1818 r.';
        $documentation_history = 'Dokładną inwentaryzację jaskini, łącznie ze sporządzeniem jej planu, wykonał K. Kowalski w lipcu 1949 r.';
        $status                = 'Nie';
        $literature            = 'Nie';
        $study_authors         = 'Jan Urban, Janusz Baryła ';
        $editorial             = 'Jerzy Grodzicki ';
        $condition_by_year     = '2013 ';
        $link_cbdg             = 'http://jaskiniepolski.pgi.gov.pl/Details/Information/390';
        $cbdg_number           = '390';

        $this->cave = new Cave($name, $other_names, $inventory_number, $region, $coordinates_wgs84, $community, $county, $voivodeship, $owner, $basis_of_protection, $hole_exposure, $other_holes, $absolute_height, $relative_height, $depth, $exceeds, $drop, $length, $horizontal_extension, $geographical_location, $description_of_access, $description, $research_history, $exploration_history, $documentation_history, $status, $literature, $study_authors, $editorial, $condition_by_year, $link_cbdg, $cbdg_number);
    }

    protected function tearDown(): void
    {
        unset($this->cave);
    }
}
