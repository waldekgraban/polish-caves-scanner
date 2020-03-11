<?php
/*
 *
 * Created by Waldemar Graban 2020
 *
 */

namespace Waldekgraban\Scanner\Parser;

class Cave
{
    protected $name;
    protected $other_names;
    protected $inventory_number;
    protected $region;
    protected $coordinates_wgs84;
    protected $community;
    protected $county;
    protected $voivodeship;
    protected $owner;
    protected $basis_of_protection;
    protected $hole_exposure;
    protected $other_holes;
    protected $absolute_height;
    protected $relative_height;
    protected $depth;
    protected $exceeds;
    protected $drop;
    protected $length;
    protected $horizontal_extension;
    protected $geographical_location;
    protected $description_of_access;
    protected $description;
    protected $research_history;
    protected $exploration_history;
    protected $documentation_history;
    protected $status;
    protected $literature;
    protected $study_authors;
    protected $editorial;
    protected $lat;
    protected $lon;
    protected $condition_by_year;
    protected $link_cbdg;
    protected $cbdg_number;

    final public function __construct
    (
        $name,
        $other_names,
        $inventory_number,
        $region,
        $coordinates_wgs84,
        $community,
        $county,
        $voivodeship,
        $owner,
        $basis_of_protection,
        $hole_exposure,
        $other_holes,
        $absolute_height,
        $relative_height,
        $depth,
        $exceeds,
        $drop,
        $length,
        $horizontal_extension,
        $geographical_location,
        $description_of_access,
        $description,
        $research_history,
        $exploration_history,
        $documentation_history,
        $status,
        $literature,
        $study_authors,
        $editorial,
        $condition_by_year,
        $link_cbdg,
        $cbdg_number
    ) {
        $this->name                  = $name;
        $this->other_names           = $other_names;
        $this->inventory_number      = $inventory_number;
        $this->region                = $region;
        $this->coordinates_wgs84     = $coordinates_wgs84;
        $this->community             = $community;
        $this->county                = $county;
        $this->voivodeship           = $voivodeship;
        $this->owner                 = $owner;
        $this->basis_of_protection   = $basis_of_protection;
        $this->hole_exposure         = $hole_exposure;
        $this->other_holes           = $other_holes;
        $this->absolute_height       = $absolute_height;
        $this->relative_height       = $relative_height;
        $this->depth                 = $depth;
        $this->exceeds               = $exceeds;
        $this->drop                  = $drop;
        $this->length                = $length;
        $this->horizontal_extension  = $horizontal_extension;
        $this->geographical_location = $geographical_location;
        $this->description_of_access = $description_of_access;
        $this->description           = $description;
        $this->research_history      = $research_history;
        $this->exploration_history   = $exploration_history;
        $this->documentation_history = $documentation_history;
        $this->status                = $status;
        $this->literature            = $literature;
        $this->study_authors         = $study_authors;
        $this->editorial             = $editorial;
        $this->condition_by_year     = $condition_by_year;
        $this->link_cbdg             = $link_cbdg;
        $this->cbdg_number           = $cbdg_number;
    }

    public function setName($name)
    {
        $this->name = trim($name);

        return $this;
    }

    public function setOtherNames($other_names)
    {
        $this->other_names = trim($other_names);

        return $this;
    }

    public function setInventoryNumber($inventory_number)
    {
        $this->inventory_number = trim($inventory_number);

        return $this;
    }

    public function setRegion($region)
    {
        $this->region = trim($region);

        return $this;
    }

    public function setCoordinatesWgs84($coordinates_wgs84)
    {
        $this->coordinates_wgs84 = trim($coordinates_wgs84);

        return $this;
    }

    public function setCommunity($community)
    {
        $this->community = trim($community);

        return $this;
    }

    public function setCounty($county)
    {
        $this->county = trim($county);

        return $this;
    }

    public function setVoivodeship($voivodeship)
    {
        $this->voivodeship = trim($voivodeship);

        return $this;
    }

    public function setOwner($owner)
    {
        $this->owner = trim($owner);

        return $this;
    }

    public function setBasisOfProtection($basis_of_protection)
    {
        $this->basis_of_protection = trim($basis_of_protection);

        return $this;
    }

    public function setHoleExposure($hole_exposure)
    {
        $this->hole_exposure = trim($hole_exposure);

        return $this;
    }

    public function setOtherHoles($other_holes)
    {
        $this->other_holes = trim($other_holes);

        return $this;
    }

    public function setAbsoluteHeight($absolute_height)
    {
        $this->absolute_height = trim($absolute_height);

        return $this;
    }

    public function setRelativeHeight($relative_height)
    {
        $this->relative_height = trim($relative_height);

        return $this;
    }

    public function setDepth($depth)
    {
        $this->depth = trim($depth);

        return $this;
    }

    public function setExceeds($exceeds)
    {
        $this->exceeds = trim($exceeds);

        return $this;
    }

    public function setDrop($drop)
    {
        $this->drop = trim($drop);

        return $this;
    }

    public function setLength($length)
    {
        $this->length = trim($length);

        return $this;
    }

    public function setHorizontalExtension($horizontal_extension)
    {
        $this->horizontal_extension = trim($horizontal_extension);

        return $this;
    }

    public function setGeographicalLocation($geographical_location)
    {
        $this->geographical_location = trim($geographical_location);

        return $this;
    }

    public function setDescriptionOfAccess($description_of_access)
    {
        $this->description_of_access = trim($description_of_access);

        return $this;
    }

    public function setDescription($description)
    {
        $this->description = trim($description);

        return $this;
    }

    public function setResearchHistory($research_history)
    {
        $this->research_history = trim($research_history);

        return $this;
    }

    public function setDocumentationHistory($documentation_history)
    {
        $this->documentation_history = trim($documentation_history);

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = trim($status);

        return $this;
    }

    public function setLiterature($literature)
    {
        $this->literature = trim($literature);

        return $this;
    }

    public function setStudyAuthors($study_authors)
    {
        $this->study_authors = trim($study_authors);

        return $this;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = trim($editorial);

        return $this;
    }

    public function setLat($lat)
    {
        $this->lat = trim($lat);

        return $this;
    }

    public function setLon($lon)
    {
        $this->lon = trim($lon);

        return $this;
    }

    public function setConditionByYear($condition_by_year)
    {
        $this->condition_by_year = trim($condition_by_year);

        return $this;
    }

    public function setLinkCbdg($link_cbdg)
    {
        $this->link_cbdg = trim($link_cbdg);

        return $this;
    }

    public function setCBDGNumber($cbdg_number)
    {
        $this->cbdg_number = trim($cbdg_number);

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOtherNames()
    {
        return $this->other_names;
    }

    public function getInventoryNumber()
    {
        return $this->inventory_number;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getCoordinatesWgs84()
    {
        return $this->coordinates_wgs84;
    }

    public function getCommunity()
    {
        return $this->community;
    }

    public function getCounty()
    {
        return $this->county;
    }

    public function getVoivodeship()
    {
        return $this->voivodeship;

    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getBasisOfProtection()
    {
        return $this->basis_of_protection;
    }

    public function getHoleExposure()
    {
        return $this->hole_exposure;
    }

    public function getOtherHoles()
    {
        return $this->other_holes;
    }

    public function getAbsoluteHeight()
    {
        return $this->absolute_height;
    }

    public function getRelativeHeight()
    {
        return $this->relative_height;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    public function getExceeds()
    {
        return $this->exceeds;
    }

    public function getDrop()
    {
        return $this->drop;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getHorizontalExtension()
    {
        return $this->horizontal_extension;
    }

    public function getGeographicalLocation()
    {
        return $this->geographical_location;
    }

    public function getDescriptionOfAccess()
    {
        return $this->description_of_access;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getResearchHistory()
    {
        return $this->research_history;
    }

    public function getDocumentationHistory()
    {
        return $this->documentation_history;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLiterature()
    {
        return $this->literature;
    }

    public function getStudyAuthors()
    {
        return $this->study_authors;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    // public function getLat()
    // {
    //     return $this->lat;
    // }

    // public function getLon()
    // {
    //     return $this->lon;
    // }

    public function getConditionByYear()
    {
        return $this->condition_by_year;
    }

    public function getLinkCbdg()
    {
        return $this->link_cbdg;
    }

    public function getCBDGNumber()
    {
        return $this->cbdg_number;
    }
}
