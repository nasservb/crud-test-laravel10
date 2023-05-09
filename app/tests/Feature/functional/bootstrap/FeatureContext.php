<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

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
        throw new PendingException();
    }

    /**
     * @When I visit :arg1
     */
    public function iVisit($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I expect payment action :arg1 to be :arg2
     */
    public function iExpectPaymentActionToBe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given I am on stub product page
     */
    public function iAmOnStubProductPage()
    {
        throw new PendingException();
    }

    /**
     * @Given I switch to currency EUR
     */
    public function iSwitchToCurrencyEur()
    {
        throw new PendingException();
    }

    /**
     * @Given I select product quantity :arg1
     */
    public function iSelectProductQuantity($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I press :arg1
     */
    public function iPress($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I wait till element exists :arg1
     */
    public function iWaitTillElementExists($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I click on CSS locator :arg1
     */
    public function iClickOnCssLocator($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I select :arg1 from :arg2
     */
    public function iSelectFrom($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given I fill in the following:
     */
    public function iFillInTheFollowing(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Then I wait :arg1 seconds
     */
    public function iWaitSeconds($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I select payment option :arg1
     */
    public function iSelectPaymentOption($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I expect payment redirect url to be :arg1
     */
    public function iExpectPaymentRedirectUrlToBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I expect payment status to be :arg1
     */
    public function iExpectPaymentStatusToBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then new order should be created
     */
    public function newOrderShouldBeCreated()
    {
        throw new PendingException();
    }

    /**
     * @Given I log in into admin section
     */
    public function iLogInIntoAdminSection()
    {
        throw new PendingException();
    }

    /**
     * @Given I open order grid page
     */
    public function iOpenOrderGridPage()
    {
        throw new PendingException();
    }

    /**
     * @Then I set order totals :arg1 to :arg2
     */
    public function iSetOrderTotalsTo($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I scroll :arg1 into view
     */
    public function iScrollIntoView($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the requests sequence contains:
     */
    public function theRequestsSequenceContains(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Given I should not see a :arg1 element
     */
    public function iShouldNotSeeAElement($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I wait request stack exists and populated with size :arg1
     */
    public function iWaitRequestStackExistsAndPopulatedWithSize($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I select order status :arg1
     */
    public function iSelectOrderStatus($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I select delivery status :arg1
     */
    public function iSelectDeliveryStatus($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I fill refund amount
     */
    public function iFillRefundAmount()
    {
        throw new PendingException();
    }

    /**
     * @Then new order state must be :arg1
     */
    public function newOrderStateMustBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then new transaction state must be :arg1
     */
    public function newTransactionStateMustBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see a :arg1 element
     */
    public function iShouldSeeAElement($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given configure stub product reference
     */
    public function configureStubProductReference()
    {
        throw new PendingException();
    }

    /**
     * @Given I expect payment id to be :arg1
     */
    public function iExpectPaymentIdToBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I create payment with amount :arg1
     */
    public function iCreatePaymentWithAmount($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I send callback by url :arg1
     */
    public function iSendCallbackByUrl($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then new order should not be created
     */
    public function newOrderShouldNotBeCreated()
    {
        throw new PendingException();
    }

    /**
     * @Given I expect notice_url to be :arg1
     */
    public function iExpectNoticeUrlToBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I send payment notification for payment :arg1
     */
    public function iSendPaymentNotificationForPayment($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I wait till I see :arg1
     */
    public function iWaitTillISee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I should see the following:
     */
    public function iShouldSeeTheFollowing(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Given I should not see the following:
     */
    public function iShouldNotSeeTheFollowing(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When I remember redirect url :arg1
     */
    public function iRememberRedirectUrl($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I restart session
     */
    public function iRestartSession()
    {
        throw new PendingException();
    }

    /**
     * @When I visit redirect url :arg1
     */
    public function iVisitRedirectUrl($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the requests sequence similar to:
     */
    public function theRequestsSequenceSimilarTo(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When I send payment notification
     */
    public function iSendPaymentNotification()
    {
        throw new PendingException();
    }

    /**
     * @Then I am on the homepage
     */
    public function iAmOnTheHomepage()
    {
        throw new PendingException();
    }

    /**
     * @When I send stalled payment notification and expect it to fail
     */
    public function iSendStalledPaymentNotificationAndExpectItToFail()
    {
        throw new PendingException();
    }

    /**
     * @When I send payment notification with signature for :arg1 and :arg2
     */
    public function iSendPaymentNotificationWithSignatureForAnd($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I send payment notification with invalid signature
     */
    public function iSendPaymentNotificationWithInvalidSignature()
    {
        throw new PendingException();
    }

    /**
     * @Then I send stalled payment notification with signature for :arg1 and :arg2 and expect it to fail
     */
    public function iSendStalledPaymentNotificationWithSignatureForAndAndExpectItToFail($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given I configure payment gateway
     */
    public function iConfigurePaymentGateway()
    {
        throw new PendingException();
    }

    /**
     * @Given I expect payment gateway redirect url to be :arg1
     */
    public function iExpectPaymentGatewayRedirectUrlToBe($arg1)
    {
        throw new PendingException();
    }
}
