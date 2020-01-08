<?php

namespace Waldekgraban\Scanner\Parser;

use Fpdf\Fpdf;
use Waldekgraban\Scanner\Parser\Cave;

class Parser
{
    protected $number;

    final public function __construct($number)
    {
        $this->number = $number;
    }

    public static function make($content)
    {
        return new static($content);
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
        $doc->loadHTML($data);

        return new \DOMXPath($doc);
    }

    public function splitScannedData($data)
    {
        $xpath = $this->toDOM($data);

        $names  = $xpath->query("//table[@id='tableDetails1']/tr/td[1]");
        $values = $xpath->query("//table[@id='tableDetails1']/tr/td[2]");

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

            $cave = new Cave($name, $other_names, $inventory_number, $region, $coordinates_wgs84, $community, $county, $voivodeship, $owner, $basis_of_protection, $hole_exposure, $other_holes, $absolute_height, $relative_height, $depth, $exceeds, $drop, $length, $horizontal_extension, $geographical_location, $description_of_access, $description, $research_history, $exploration_history, $documentation_history, $status, $literature, $study_authors, $editorial, $state, $link_cbdg, $cbdg_number
            );

            return $this->saveCave($cave);
        } else {
            echo "http://jaskiniepolski.pgi.gov.pl/Details/Information/<b>" . $this->number . "</b> - puste<br>";
        }
    }

    public function camelCase($str)
    {
        $i   = ["-", "_"];
        $str = preg_replace('/([a-z])([A-Z])/', "\\1 \\2", $str);
        $str = preg_replace('@[^a-zA-Z0-9\-_ ]+@', '', $str);
        $str = str_replace($i, ' ', $str);
        $str = str_replace(' ', '', ucwords(strtolower($str)));
        $str = strtolower(substr($str, 0, 1)) . substr($str, 1);

        return $str;
    }

    public function saveCave($cave)
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetAuthor('https://github.com/waldekgraban/polish_caves_scanner');
        $pdf->SetTitle($cave->getName());
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(10, 10, 'Nazwa: ' . $cave->getName());
        $pdf->Text(10, 20, 'Inne nazwy : ' . $cave->getOtherNames());
        // $pdf->Text(10,20,' : ' . $cave->getInventoryNumber());
        // $pdf->Text(10,30,' : ' . $cave->getRegion());
        // $pdf->Text(10,40,' : ' . $cave->getCoordinatesWgs84());
        // $pdf->Text(10,50,' : ' . $cave->getCommunity());
        // $pdf->Text(10,60,' : ' . $cave->getCounty());
        // $pdf->Text(10,70,' : ' . $cave->getVoivodeship());
        // $pdf->Text(10,80,' : ' . $cave->getOwner());
        // $pdf->Text(10,90,' : ' . $cave->getBasisOfProtection());
        // $pdf->Text(10,100,' : ' . $cave->getHoleExposure());
        // $pdf->Text(10,110,' : ' . $cave->getOtherHoles());
        // $pdf->Text(10,120,' : ' . $cave->getAbsoluteHeight());
        // $pdf->Text(10,130,' : ' . $cave->getRelativeHeight());
        // $pdf->Text(10,140,' : ' . $cave->getDepth());
        // $pdf->Text(10,150,' : ' . $cave->getExceeds());
        // $pdf->Text(10,160,' : ' . $cave->getDrop());
        // $pdf->Text(10,170,' : ' . $cave->getLength());
        // $pdf->Text(10,180,' : ' . $cave->getHorizontalExtension());
        // $pdf->Text(10,190,' : ' . $cave->getGeographicalLocation());
        // $pdf->Text(10,200,' : ' . $cave->getDescriptionOfAccess());
        // $pdf->Text(10,210,' : ' . $cave->getDescription());
        // $pdf->Text(10,220,' : ' . $cave->getResearch_history());
        // $pdf->Text(10,230,' : ' . $cave->getDocumentationHistory());
        // $pdf->Text(10,240,' : ' . $cave->getStatus());
        // $pdf->Text(10,250,' : ' . $cave->getLiterature());
        // $pdf->Text(10,260,' : ' . $cave->getStudyAuthors());
        // $pdf->Text(10,270,' : ' . $cave->getEditorial());
        // $pdf->Text(10,280,' : ' . $cave->getConditionByYear());
        // $pdf->Text(10,290,' : ' . $cave->getLinkCbdg());
        // $pdf->Text(10,300,' : ' . $cave->getCBDGNumber());
        $content = $pdf->Output('caves/' . $this->camelCase($cave->getName()) . '.pdf', 'F');
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

        return $splitData = $this->splitScannedData($data);
    }
}
