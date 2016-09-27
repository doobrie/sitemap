<?php

namespace Doobrie\Sitemap;

/**
 * Class responsible for creating XML sitemaps.
 * 
 * @author David Salter <david.salter@outlook.com>
 */
class Sitemap
{
    private $xml;
    private $pages = array();

    public function __construct()
    {
        
    }

    public function render()
    {
        $this->xml = $this->header();

        $this->xml = $this->xml . $this->startXml();

        foreach ($this->pages as $page) {
            $this->xml = $this->xml . $page->toXml();
        }

        $this->xml = $this->xml . $this->endXml();

        return $this->xml;
    }

    public function addPage($page)
    {
        array_push($this->pages, $page);
    }

    private function header()
    {
        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
    }

    private function startXml()
    {
        return "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
    }

    private function endXml()
    {
        return "</urlset>";
    }
}