<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\RawMinkContext;
use CustomIntranet\Domain\Model\Highlight;
use CustomIntranet\Domain\Model\HighlightRepository;
use Behat\Behat\Hook\Scope\AfterScenarioScope;


/**
 * Defines application features from the specific context.
 */
class WebContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
    private $highlightRepository;

    public function __construct(HighlightRepository $highlightRepository)
    {
        $this->highlightRepository = $highlightRepository;
    }

    /**
     * @Given there is a highlight with title :title and a description :description
     */
    public function thereIsAHighlightWithTitleAndADescription($title, $description)
    {
        $this->highlightRepository->save(
            new Highlight($title, $description)
        );
    }

    /**
     * @When I open the homepage
     */
    public function iOpenTheHomepage()
    {
        $this->visitPath('/');
    }

    /**
     * @Then I should see the highlight title :title
     */
    public function iShouldSeeTheHighlightTitle($title)
    {
        $this->assertSession()->pageTextContains($title);
    }

    /**
     * @AfterScenario
     */
    public function cleanDB(AfterScenarioScope $scope)
    {
        $this->highlightRepository->removeAll();
    }
}
