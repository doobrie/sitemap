<?php

use Doobrie\Sitemap\Page;
use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    private $page;

    /**
     * @before
     */
    public function setup()
    {
        $this->page = new Page("http://localhost", "2016-10-01", "monthly", 0.5);
    }

    /**
     * @test
     */
    public function shouldBeAbleToAccessLocation()
    {
        $this->assertEquals("http://localhost", $this->page->getLocation());
    }

    /**
     * @test
     */
    public function shouldBeAbleToAccessLastModifiedDate()
    {
        $this->assertEquals("2016-10-01", $this->page->getLastModifiedDate());
    }

    /**
     * @test
     */
    public function shouldBeAbleToAccessChangeFrequency()
    {
        $this->assertEquals("monthly", $this->page->getChangeFrequency());
    }

    /**
     * @test
     */
    public function shouldBeAbleToAccessPriority()
    {
        $this->assertEquals(0.5, $this->page->getPriority());
    }
    
        /**
     * @test
     */
    public function shouldBeAbleToRenderPageAsXml()
    {
        $xml = "<url><loc>http://localhost</loc><lastmod>2016-10-01</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>";
        $this->assertEquals($xml, $this->page->toXml());
    }
}