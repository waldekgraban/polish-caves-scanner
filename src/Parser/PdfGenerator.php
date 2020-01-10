<?php

namespace Waldekgraban\Scanner\Parser;

use Fpdf\Fpdf;
use Waldekgraban\Scanner\Parser\Cave;

class PdfGenerator
{
    protected $cave;

    final public function __construct(Cave $cave)
    {
        $this->cave = $cave;
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

    public function create()
    {
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetAuthor('https://github.com/waldekgraban/');
        $pdf->SetTitle($this->cave->getName());
        $pdf->SetFont('arial', '', 10);

        $pdf->Cell(80, 7, 'Nazwa', 0);
        $pdf->Cell(80, 7, $this->cave->getName(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Inne nazwy', 0);
        $pdf->Cell(80, 7, $this->cave->getOtherNames(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Nr. inwentarzowy', 0);
        $pdf->Cell(80, 7, $this->cave->getInventoryNumber(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Region', 0);
        $pdf->Cell(80, 7, $this->cave->getRegion(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Współrzędne WGS84', 0);
        $pdf->Cell(80, 7, $this->cave->getCoordinatesWgs84(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Gmina', 0);
        $pdf->Cell(80, 7, $this->cave->getCommunity(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Powiat', 0);
        $pdf->Cell(80, 7, $this->cave->getCounty(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Województwo', 0);
        $pdf->Cell(80, 7, $this->cave->getVoivodeship(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Właściciel terenu', 0);
        $pdf->Cell(80, 7, $this->cave->getOwner(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Podstawa ochrony', 0);
        $pdf->Cell(80, 7, $this->cave->getBasisOfProtection(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Ekspozycja otworu', 0);
        $pdf->Cell(80, 7, $this->cave->getHoleExposure(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Pozostałe otwory', 0);
        $pdf->Cell(80, 7, $this->cave->getOtherHoles(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Wysokość bezwzględna [m n.p.m.]', 0);
        $pdf->Cell(80, 7, $this->cave->getAbsoluteHeight(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Wysokość względna [m] ', 0);
        $pdf->Cell(80, 7, $this->cave->getRelativeHeight(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Głębokość [m]', 0);
        $pdf->Cell(80, 7, $this->cave->getDepth(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Przewyższenie [m]', 0);
        $pdf->Cell(80, 7, $this->cave->getExceeds(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Deniwelacja [m]', 0);
        $pdf->Cell(80, 7, $this->cave->getDrop(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Długość [m] w tym szacowane [m]', 0);
        $pdf->Cell(80, 7, $this->cave->getLength(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Rozciągłość horyzontalna [m] ', 0);
        $pdf->Cell(80, 7, $this->cave->getHorizontalExtension(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Położenie geograficzne', 0);
        $pdf->Cell(80, 7, $this->cave->getGeographicalLocation(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Opis drogi dojścia do otworu', 0);
        $pdf->Cell(80, 7, $this->cave->getDescriptionOfAccess(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Opis jaskini', 0);
        $pdf->Cell(80, 7, $this->cave->getDescription(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Historia badań', 0);
        $pdf->Cell(80, 7, $this->cave->getResearch_history(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Historia dokumentacji', 0);
        $pdf->Cell(80, 7, $this->cave->getDocumentationHistory(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Zniszczona, niedostępna lub nieodnaleziona', 0);
        $pdf->Cell(80, 7, $this->cave->getStatus(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, ' Literatura', 0);
        $pdf->Cell(80, 7, $this->cave->getLiterature(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Autorzy opracowania', 0);
        $pdf->Cell(80, 7, $this->cave->getStudyAuthors(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Redakcja', 0);
        $pdf->Cell(80, 7, $this->cave->getEditorial(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Stan na rok', 0);
        $pdf->Cell(80, 7, $this->cave->getConditionByYear(), 0);
        $pdf->Ln();
        $pdf->Cell(80, 7, 'Link', 0);
        $pdf->Cell(80, 7, $this->cave->getLinkCbdg(), 0);

        $content = $pdf->Output('caves/' . $this->camelCase($this->cave->getName()) . '.pdf', 'F');

        return true;
    }
}
