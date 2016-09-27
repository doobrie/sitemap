<?php

use Doobrie\Sitemap\Page;
use Doobrie\Sitemap\Sitemap;
use PHPUnit\Framework\TestCase;

class SitemapTest extends TestCase
{
    private $sitemap;

    /**
     * @before
     */
    public function setup()
    {
        $this->sitemap = new Sitemap();
    }

    /**
     * @test
     */
    public function shouldHaveValidXmlHeader()
    {
        $sitemap = new Sitemap();
        $this->assertStringStartsWith("<?xml version=\"1.0\" encoding=\"UTF-8\"?>", $sitemap->render());
    }

    /**
     * @test
     */
    public function shouldHaveValidXmlHeaderUrlSet()
    {
        $sitemap = new Sitemap();
        $this->assertContains("<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">", $sitemap->render());
        $this->assertStringEndsWith("</urlset>", $sitemap->render());
    }

    /**
     * @test
     */
    public function shouldContainNoPagesWhenNoneAdded()
    {
        $page = new Page("http://localhost", "2016-10-01", "monthly", 0.5);

        $xml = simplexml_load_string($this->sitemap->render());
    }

    /**
     * @test
     */
    public function shouldContainOnePageWhenOneAdded()
    {
        $page = new Page("http://localhost", "2016-10-01", "monthly", 0.5);
        $this->sitemap->addPage($page);

        $xml = simplexml_load_string($this->sitemap->render());

        $this->assertEquals(1, count($xml->url));
    }

    /**
     * @test
     */
    public function shouldContainTwoPagsWhenOneAdded()
    {

        $this->sitemap->addPage(new Page("http://localhost/1", "2016-10-01", "monthly", 0.5));
        $this->sitemap->addPage(new Page("http://localhost/2", "2016-10-01", "monthly", 0.5));

        $xml = simplexml_load_string($this->sitemap->render());

        $this->assertEquals(2, count($xml->url));
    }
}