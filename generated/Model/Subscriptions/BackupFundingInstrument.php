<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The backup funding instrument to use for payment when the primary instrument fails.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-backup_funding_instrument.json
 */
class BackupFundingInstrument implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     *
     * @var CardResponse
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->card, "card in BackupFundingInstrument must not be NULL $within");
        Assert::isInstanceOf(
            $this->card,
            CardResponse::class,
            "card in BackupFundingInstrument must be instance of CardResponse $within"
        );
         $this->card->validate(BackupFundingInstrument::class);
    }

    private function map(array $data)
    {
        if (isset($data['card'])) {
            $this->card = new CardResponse($data['card']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->card = new CardResponse();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
