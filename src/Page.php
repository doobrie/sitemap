<?php

namespace Doobrie\Sitemap;

/**
 * Representation of a page in a sitemap
 * 
 * @author David Salter <david.salter@outlook.com>
 */
class Page
{
    private $location;
    private $lastModifiedDate;
    private $changeFrequency;
    private $priority;

    public function __construct($location, $lastModifiedDate, $changeFrequency, $priority)
    {
        $this->location = $location;
        $this->lastModifiedDate = $lastModifiedDate;
        $this->changeFrequency = $changeFrequency;
        $this->priority = $priority;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getLastModifiedDate()
    {
        return $this->lastModifiedDate;
    }

    public function getChangeFrequency()
    {
        return $this->changeFrequency;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function toXml()
    {
        return "<url>" .
                "<loc>" . $this->getLocation() . "</loc>" .
                "<lastmod>" . $this->getLastModifiedDate() . "</lastmod>" .
                "<changefreq>" . $this->getChangeFrequency() . "</changefreq>" .
                "<priority>" . $this->getPriority() . "</priority>" .
                "</url>";
    }
}