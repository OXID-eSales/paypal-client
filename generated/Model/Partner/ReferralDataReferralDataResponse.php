<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The share referral data response.
 *
 * generated from: referral_data-referral_data_response.json
 */
class ReferralDataReferralDataResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The ID to access the customer's data shared by the partner with PayPal.
     *
     * @var string | null
     */
    public $partner_referral_id;

    /**
     * The payer ID of the partner who shared the referral data.
     *
     * @var string | null
     */
    public $submitter_payer_id;

    /**
     * The customer's referral data that partners share with PayPal.
     *
     * @var ReferralDataReferralData | null
     */
    public $referral_data;

    /**
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var array
     * maxItems: 0
     * maxItems: 2
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->referral_data) || Assert::isInstanceOf(
            $this->referral_data,
            ReferralDataReferralData::class,
            "referral_data in ReferralDataReferralDataResponse must be instance of ReferralDataReferralData $within"
        );
        !isset($this->referral_data) ||  $this->referral_data->validate(ReferralDataReferralDataResponse::class);
        Assert::notNull($this->links, "links in ReferralDataReferralDataResponse must not be NULL $within");
        Assert::minCount(
            $this->links,
            0,
            "links in ReferralDataReferralDataResponse must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->links,
            2,
            "links in ReferralDataReferralDataResponse must have max. count of 2 $within"
        );
        Assert::isArray(
            $this->links,
            "links in ReferralDataReferralDataResponse must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['partner_referral_id'])) {
            $this->partner_referral_id = $data['partner_referral_id'];
        }
        if (isset($data['submitter_payer_id'])) {
            $this->submitter_payer_id = $data['submitter_payer_id'];
        }
        if (isset($data['referral_data'])) {
            $this->referral_data = new ReferralDataReferralData($data['referral_data']);
        }
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->links = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initReferralData(): ReferralDataReferralData
    {
        return $this->referral_data = new ReferralDataReferralData();
    }
}
