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

    public function testCanInitializeByConstructor()
    {
        $this->assertInstanceOf(Cave::class, $this->cave);
    }

    public function testSetName()
    {
        $data = " new name";
        $this->cave->setName($data);
        $this->assertSame($this->cave->getName($data), trim($data));
    }

    public function testSetOtherNames()
    {
        $data = " new other name";
        $this->cave->setOtherNames($data);
        $this->assertSame($this->cave->getOtherNames($data), trim($data));
    }

    public function testSetInventoryNumber()
    {
        $data = " 0010";
        $this->cave->setInventoryNumber($data);
        $this->assertSame($this->cave->getInventoryNumber($data), trim($data));
    }

    public function testSetRegion()
    {
        $data = " Pomorskie";
        $this->cave->setRegion($data);
        $this->assertSame($this->cave->getRegion($data), trim($data));
    }

    public function testSetCoordinatesWgs84()
    {
        $data = " λ: 18°27′04,80″, φ: 54°42′48,55″ ";
        $this->cave->setCoordinatesWgs84($data);
        $this->assertSame($this->cave->getCoordinatesWgs84($data), trim($data));
    }

    public function testSetCommunity()
    {
        $data = " Pomorskie ";
        $this->cave->setCommunity($data);
        $this->assertSame($this->cave->getCommunity($data), trim($data));
    }

    public function testSetCounty()
    {
        $data = " Czechy ";
        $this->cave->setCounty($data);
        $this->assertSame($this->cave->getCounty($data), trim($data));
    }

    public function testVoivodeship()
    {
        $data = " Małopolskie";
        $this->cave->setVoivodeship($data);
        $this->assertSame($this->cave->getVoivodeship($data), trim($data));
    }

    public function testSetOwner()
    {
        $data = " Nowy";
        $this->cave->setOwner($data);
        $this->assertSame($this->cave->getOwner($data), trim($data));
    }

    public function testSetBasisOfProtection()
    {
        $data = " Nowy";
        $this->cave->setBasisOfProtection($data);
        $this->assertSame($this->cave->getBasisOfProtection($data), trim($data));
    }

    public function testSetHoleExposure()
    {
        $data = " N";
        $this->cave->setHoleExposure($data);
        $this->assertSame($this->cave->getHoleExposure($data), trim($data));
    }

    public function testSetOtherHoles()
    {
        $data = " E";
        $this->cave->setOtherHoles($data);
        $this->assertSame($this->cave->getOtherHoles($data), trim($data));
    }

    public function testSetAbsoluteHeight()
    {
        $data = " 13";
        $this->cave->setAbsoluteHeight($data);
        $this->assertSame($this->cave->getAbsoluteHeight($data), trim($data));
    }

    public function testSetRelativeHeight()
    {
        $data = " 21";
        $this->cave->setRelativeHeight($data);
        $this->assertSame($this->cave->getRelativeHeight($data), trim($data));
    }

    public function testSetDepth()
    {
        $data = " 5";
        $this->cave->setDepth($data);
        $this->assertSame($this->cave->getDepth($data), trim($data));
    }

    public function testSetExceeds()
    {
        $data = " 4  ";
        $this->cave->setExceeds($data);
        $this->assertSame($this->cave->getExceeds($data), trim($data));
    }

    public function testSetDrop()
    {
        $data = " 42  ";
        $this->cave->setDrop($data);
        $this->assertSame($this->cave->getDrop($data), trim($data));
    }

    public function testSetLength()
    {
        $data = " 22";
        $this->cave->setLength($data);
        $this->assertSame($this->cave->getLength($data), trim($data));
    }

    public function testSetHorizontalExtension()
    {
        $data = " 41";
        $this->cave->setHorizontalExtension($data);
        $this->assertSame($this->cave->getHorizontalExtension($data), trim($data));
    }

    public function testSetGeographicalLocation()
    {
        $data = " Jaskinia jest usytuowana we wschodniej części miejscowości Puck";
        $this->cave->setGeographicalLocation($data);
        $this->assertSame($this->cave->getGeographicalLocation($data), trim($data));
    }

    public function testSetDescriptionOfAccess()
    {
        $data = " Jaskinia jest pod drogą wojewódzką S6";
        $this->cave->setDescriptionOfAccess($data);
        $this->assertSame($this->cave->getDescriptionOfAccess($data), trim($data));
    }

    public function testSetDescription()
    {
        $data = " Nowy opis tej jaskini    ";
        $this->cave->setDescription($data);
        $this->assertSame($this->cave->getDescription($data), trim($data));
    }

    public function testSetResearchHistory()
    {
        $data = " Nowy opis historii odkrycia tej jaskini ";
        $this->cave->setResearchHistory($data);
        $this->assertSame($this->cave->getResearchHistory($data), trim($data));
    }

    public function testSetDocumentationHistory()
    {
        $data = " Nowy opis historii badań i dokumentacji tej jaskini ";
        $this->cave->setDocumentationHistory($data);
        $this->assertSame($this->cave->getDocumentationHistory($data), trim($data));
    }

    public function testSetStatus()
    {
        $data = " Nie";
        $this->cave->setStatus($data);
        $this->assertSame($this->cave->getStatus($data), trim($data));
    }

    public function testSetLiterature()
    {
        $data = " Brak";
        $this->cave->setLiterature($data);
        $this->assertSame($this->cave->getLiterature($data), trim($data));
    }

    public function testSetStudyAuthors()
    {
        $data = " Jan Nowak, Stefek Nowak i Nowak Nowak";
        $this->cave->setStudyAuthors($data);
        $this->assertSame($this->cave->getStudyAuthors($data), trim($data));
    }

    public function testSetEditorial()
    {
        $data = " Zły brak bliźniak Jana Nowaka";
        $this->cave->setEditorial($data);
        $this->assertSame($this->cave->getEditorial($data), trim($data));
    }

    protected function tearDown(): void
    {
        unset($this->cave);
    }
}
