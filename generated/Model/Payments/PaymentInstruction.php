<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Any additional payment instructions for PayPal Commerce Platform customers. Enables features for the PayPal
 * Commerce Platform, such as delayed disbursement and collection of a platform fee. Applies during order
 * creation for captured payments or during capture of authorized payments.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-payment_instruction.json
 */
class PaymentInstruction implements JsonSerializable
{
    use BaseModel;

    /** The funds are released to the merchant immediately. */
    public const DISBURSEMENT_MODE_INSTANT = 'INSTANT';

    /** The funds are held for a finite number of days. The actual duration depends on the region and type of integration. You can release the funds through a referenced payout. Otherwise, the funds disbursed automatically after the specified duration. */
    public const DISBURSEMENT_MODE_DELAYED = 'DELAYED';

    /**
     * An array of various fees, commissions, tips, or donations.
     *
     * @var PlatformFee[]
     * maxItems: 0
     * maxItems: 1
     */
    public $platform_fees;

    /**
     * The funds that are held on behalf of the merchant.
     *
     * use one of constants defined in this class to set the value:
     * @see DISBURSEMENT_MODE_INSTANT
     * @see DISBURSEMENT_MODE_DELAYED
     * @var string | null
     */
    public $disbursement_mode = 'INSTANT';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->platform_fees, "platform_fees in PaymentInstruction must not be NULL $within");
        Assert::minCount(
            $this->platform_fees,
            0,
            "platform_fees in PaymentInstruction must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->platform_fees,
            1,
            "platform_fees in PaymentInstruction must have max. count of 1 $within"
        );
        Assert::isArray(
            $this->platform_fees,
            "platform_fees in PaymentInstruction must be array $within"
        );
        if (isset($this->platform_fees)) {
            foreach ($this->platform_fees as $item) {
                $item->validate(PaymentInstruction::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['platform_fees'])) {
            $this->platform_fees = [];
            foreach ($data['platform_fees'] as $item) {
                $this->platform_fees[] = new PlatformFee($item);
            }
        }
        if (isset($data['disbursement_mode'])) {
            $this->disbursement_mode = $data['disbursement_mode'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->platform_fees = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
