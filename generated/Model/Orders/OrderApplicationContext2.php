<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Customizes the payer experience during the approval process for the payment with
 * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
 * and <code>shipping_preference</code> during partner account setup, which overrides the request
 * values.</blockquote>
 *
 * generated from: customized_x_unsupported_8990_order_application_context.json
 */
class OrderApplicationContext2 implements JsonSerializable
{
    use BaseModel;

    /**
     * Provides additional details to process a payment using a `payment_source` that has been stored or is intended
     * to be stored (also referred to as stored_credential or card-on-file).<br/>Parameter
     * compatibility:<br/><ul><li>`payment_type=ONE_TIME` is compatible only with
     * `payment_initiator=CUSTOMER`.</li><li>`usage=FIRST` is compatible only with
     * `payment_initiator=CUSTOMER`.</li><li>`previous_transaction_reference` or
     * `previous_network_transaction_reference` is compatible only with `payment_initiator=MERCHANT`.</li><li>Only
     * one of the parameters - `previous_transaction_reference` and `previous_network_transaction_reference` - can be
     * present in the request.</li></ul>
     *
     * @var StoredPaymentSource | null
     */
    public $stored_payment_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->stored_payment_source) || Assert::isInstanceOf(
            $this->stored_payment_source,
            StoredPaymentSource::class,
            "stored_payment_source in OrderApplicationContext2 must be instance of StoredPaymentSource $within"
        );
        !isset($this->stored_payment_source) ||  $this->stored_payment_source->validate(OrderApplicationContext2::class);
    }

    private function map(array $data)
    {
        if (isset($data['stored_payment_source'])) {
            $this->stored_payment_source = new StoredPaymentSource($data['stored_payment_source']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initStoredPaymentSource(): StoredPaymentSource
    {
        return $this->stored_payment_source = new StoredPaymentSource();
    }
}
