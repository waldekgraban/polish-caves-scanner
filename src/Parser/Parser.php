<?php

namespace Waldekgraban\Scanner\Parser;

use Waldekgraban\Scanner\Parser\Cave;
use Waldekgraban\Scanner\Parser\Logger;
use Waldekgraban\Scanner\Parser\PdfGenerator as Pdf;

class Parser
{
    protected $number;

    final public function __construct($number)
    {
        $this->number = $number;
    }

    public function scanCBDG($number)
    {
        $client   = new \GuzzleHttp\Client(['http_errors' => false]);
        $response = $client->request('GET', 'http://jaskiniepolski.pgi.gov.pl/Details/Information/' . $number);

        return $response->getBody();
    }

    public function toDOM($data)
    {
        $doc = new \DOMDocument();
        @$doc->loadHTML($data);

        return new \DOMXPath($doc);
    }

    public function processScannedData($data)
    {
        $xpath = $this->toDOM($data);

        $names  = $xpath->query("//table[@id='tableDetails1']/tr/td[1]");
        $values = $xpath->query("//table[@id='tableDetails1']/tr/td[2]");

        $cave = $this->createOrFailCave($values);

        if (!is_object($cave)) {
            return $this->errorMsg($this->number);
        } else {
            return $this->saveCave($cave);
            // return $this->showCave($cave);
        }
    }

    public function createOrFailCave($values)
    {
        if (is_object($values[0])) {
            if ($values[0]->nodeValue) {
                $name                  = $this->getName($values[0]->nodeValue);
                $other_names           = $this->getOtherNames($values[1]->nodeValue);
                $inventory_number      = $this->getInventoryNumber($values[2]->nodeValue);
                $region                = $this->getRegion($values[3]->nodeValue);
                $coordinates_wgs84     = $this->getCoordinatesWgs84($values[4]->nodeValue);
                $community             = $this->getCommunity($values[5]->nodeValue);
                $county                = $this->getCounty($values[6]->nodeValue);
                $voivodeship           = $this->getVoivodeship($values[7]->nodeValue);
                $owner                 = $this->getOwner($values[8]->nodeValue);
                $basis_of_protection   = $this->getBasisOfProtection($values[9]->nodeValue);
                $hole_exposure         = $this->getHoleExposure($values[10]->nodeValue);
                $other_holes           = $this->getOtherHoles($values[11]->nodeValue);
                $absolute_height       = $this->getAbsoluteHeight($values[12]->nodeValue);
                $relative_height       = $this->getRelativeHeight($values[13]->nodeValue);
                $depth                 = $this->getDepth($values[14]->nodeValue);
                $exceeds               = $this->getExceeds($values[15]->nodeValue);
                $drop                  = $this->getDrop($values[16]->nodeValue);
                $length                = $this->getLength($values[17]->nodeValue);
                $horizontal_extension  = $this->getHorizontalExtension($values[18]->nodeValue);
                $geographical_location = $this->getGeographicalLocation($values[19]->nodeValue);
                $description_of_access = $this->getDescriptionOfAccess($values[20]->nodeValue);
                $description           = $this->getDescription($values[21]->nodeValue);
                $research_history      = $this->getResearchHistory($values[22]->nodeValue);
                $exploration_history   = $this->getExplorationHistory($values[23]->nodeValue);
                $documentation_history = $this->getDocumentationHistory($values[24]->nodeValue);
                $status                = $this->getStatus($values[25]->nodeValue);
                $literature            = $this->getLiterature($values[26]->nodeValue);
                $study_authors         = $this->getStudyAuthors($values[28]->nodeValue);
                $editorial             = $this->getEditorial($values[29]->nodeValue);
                $editorial             = $this->getEditorial($values[29]->nodeValue);
                $state                 = $this->getStan($values[30]->nodeValue);
                $link_cbdg             = $this->getLinkCBDG($this->number);
                $cbdg_number           = $this->getCBDGNumber($this->number);

                $case = true;
                $log  = new Logger($this->number, $case);
                $log->save();

                return $cave = new Cave($name, $other_names, $inventory_number, $region, $coordinates_wgs84, $community, $county, $voivodeship, $owner, $basis_of_protection, $hole_exposure, $other_holes, $absolute_height, $relative_height, $depth, $exceeds, $drop, $length, $horizontal_extension, $geographical_location, $description_of_access, $description, $research_history, $exploration_history, $documentation_history, $status, $literature, $study_authors, $editorial, $state, $link_cbdg, $cbdg_number
                );
            } else {
                $case = false;
                $log  = new Logger($this->number, $case);
                $log->save();

                return false;
            }
        } else {
            $case = false;
            $log  = new Logger($this->number, $case);
            $log->save();
        }
    }

    public function errorMsg($number)
    {
        echo "Object number " . $number . " in CBDG not found <br>";
    }

    public function showCave($cave)
    {
        echo "<pre>";
        print_r($cave);
        echo "</pre>";
    }

    public function saveCave($cave)
    {
        $pdf = new Pdf($cave);

        return $pdf->create();
    }

    public function getName($value)
    {
        return (string) $name = trim($value) ?: 'brak info';
    }

    public function getOtherNames($value)
    {
        return (string) $other_names = trim($value) ?: 'brak info';
    }

    public function getInventoryNumber($value)
    {
        return (string) $inventory_number = trim($value) ?: 'brak info';
    }

    public function getRegion($value)
    {
        return (string) $region = trim($value) ?: 'brak info';
    }

    public function getCoordinatesWgs84($value)
    {
        return (string) $coordinates_wgs84 = trim($value) ?: 'brak info';
    }

    public function getCommunity($value)
    {
        return (string) $community = trim($value) ?: 'brak info';
    }

    public function getCounty($value)
    {
        return (string) $county = trim($value) ?: 'brak info';
    }

    public function getVoivodeship($value)
    {
        return (string) $voivodeship = trim($value) ?: 'brak info';
    }

    public function getOwner($value)
    {
        return (string) $owner = trim($value) ?: 'brak info';
    }

    public function getBasisOfProtection($value)
    {
        return (string) $basis_of_protection = trim($value) ?: 'brak info';
    }

    public function getHoleExposure($value)
    {
        return (string) $hole_exposure = trim($value) ?: 'brak info';
    }

    public function getOtherHoles($value)
    {
        return (string) $other_holes = trim($value) ?: 'brak info';
    }

    public function getAbsoluteHeight($value)
    {
        return (string) $absolute_height = trim($value) ?: 'brak info';
    }

    public function getRelativeHeight($value)
    {
        return (string) $relative_height = trim($value) ?: 'brak info';
    }

    public function getDepth($value)
    {
        return (string) $depth = trim($value) ?: 'brak info';
    }

    public function getExceeds($value)
    {
        return (string) $exceeds = trim($value) ?: 'brak info';
    }

    public function getDrop($value)
    {
        return (string) $drop = trim($value) ?: 'brak info';
    }

    public function getLength($value)
    {
        return (string) $length = trim($value) ?: 'brak info';
    }

    public function getHorizontalExtension($value)
    {
        return (string) $horizontal_extension = trim($value) ?: 'brak info';
    }

    public function getGeographicalLocation($value)
    {
        return (string) $geographical_location = trim($value) ?: 'brak info';
    }

    public function getDescriptionOfAccess($value)
    {
        return (string) $description_of_access = trim($value) ?: 'brak info';
    }

    public function getDescription($value)
    {
        return (string) $description = trim($value) ?: 'brak info';
    }

    public function getResearchHistory($value)
    {
        return (string) $research_history = trim($value) ?: 'brak info';
    }

    public function getExplorationHistory($value)
    {
        return (string) $exploration_history = trim($value) ?: 'brak info';
    }

    public function getDocumentationHistory($value)
    {
        return (string) $documentation_history = trim($value) ?: 'brak info';
    }

    public function getStatus($value)
    {
        return (string) $status = trim($value) ?: 'brak info';
    }

    public function getLiterature($value)
    {
        return (string) $literature = trim($value) ?: 'brak info';
    }

    public function getStudyAuthors($value)
    {
        return (string) $study_authors = trim($value) ?: 'brak info';
    }

    public function getEditorial($value)
    {
        return (string) $editorial = trim($value) ?: 'brak info';
    }

    public function getLinkCBDG($value)
    {
        $val = 'http://jaskiniepolski.pgi.gov.pl/Details/Information/' . $value;

        return (string) $link_cbdg = trim($val) ?: 'brak info';
    }

    public function getCBDGNumber($value)
    {
        return (string) $link_cbdg = trim($value) ?: 'brak info';
    }

    public function getStan($value)
    {
        return (string) $stan = trim($value) ?: 'brak info';
    }

    public function parse()
    {
        $data = $this->scanCBDG($this->number);

        return $splitData = $this->processScannedData($data);
    }
}
