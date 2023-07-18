<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use PHPUnit_Framework_Assert as PHPUnit;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
    * @Given I am logged in
    */
    public function iAmLoggedIn()
    {
        $user = new User();
        $this->be($user);
    }

    /**
     * @Given I am not logged in
     */
    public function iAmNotLoggedIn()
    {
        $this->be(null);
    }


    /**
     * @When I visit :uri
     */
    public function iVisit($uri)
    {
        $this->call('GET', $uri);
    }


    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        return require __DIR__.'/../../bootstrap/start.php';
    }

    /**
     * @Then I should see :text
     */
    public function iShouldSee($text)
    {
        $crawler = new Crawler($this->client->getResponse()->getContent());
        PHPUnit::assertCount(1, $crawler->filterXpath("//text()[. = '{$text}']"));
    }


    /**
     * @Given I click on :arg1 button
     */
    public function iClickOnButton($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I fill in the following:
     */
    public function iFillInTheFollowing(TableNode $table)
    {
        foreach ($table->getRowsHash() as $field => $value) {
            $this->assertProductVariantOptionValue($sku, $field, $value);
        }
    }

    /**
     * @Given I click on first :arg1 button id
     */
    public function iClickOnFirstButtonId($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I click on :arg1 alert
     */
    public function iClickOnAlert($arg1)
    {
        throw new PendingException();
    }
}
