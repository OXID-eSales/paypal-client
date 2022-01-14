<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidSolutionCatalysts\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payment Directives for transaction.
 *
 * generated from: model-payment_directives.json
 */
class PaymentDirectives implements JsonSerializable
{
    use BaseModel;

    /** Instant Disbursement Type. */
    public const DISBURSEMENT_TYPE_INSTANT = 'INSTANT';

    /** Delayed Disbursement Type. */
    public const DISBURSEMENT_TYPE_DELAYED = 'DELAYED';

    /** Full liability for post payment events. The loss_account will be used for events including refunds, reversals, disputes etc. */
    public const LIABILITY_TYPE_FULL = 'FULL';

    /** Partial liability for post payment events. The loss_account will be used for limited cases like UNAUTH. */
    public const LIABILITY_TYPE_PARTIAL = 'PARTIAL';

    /** Accept payment after auto currency conversion. */
    public const CURRENCY_RECEIVING_DIRECTIVE_ACCEPT = 'ACCEPT';

    /** Deny payment. */
    public const CURRENCY_RECEIVING_DIRECTIVE_DENY = 'DENY';

    /** Pend payment for seller's approval. */
    public const CURRENCY_RECEIVING_DIRECTIVE_HOLD = 'HOLD';

    /** Accept payment after opening a new currency holding. */
    public const CURRENCY_RECEIVING_DIRECTIVE_ACCEPT_OPEN = 'ACCEPT_OPEN';

    /**
     * Disbursement type.
     *
     * use one of constants defined in this class to set the value:
     * @see DISBURSEMENT_TYPE_INSTANT
     * @see DISBURSEMENT_TYPE_DELAYED
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $disbursement_type;

    /**
     * Identifier that links the transactions to be treated as one atomic unit for payment processing. All-or-none
     * policy is enforced by this identifier.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 10
     */
    public $linked_group_id;

    /**
     * Settlement account number where the funds finally get settled to.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $settlement_account_number;

    /**
     * Loss account number used for recovery of loss.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 30
     */
    public $loss_account_number;

    /**
     * Liability type defined by PayPal Risk.
     *
     * use one of constants defined in this class to set the value:
     * @see LIABILITY_TYPE_FULL
     * @see LIABILITY_TYPE_PARTIAL
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $liability_type;

    /**
     * Special deny setting to force decline a (compliance) pending transaction.
     *
     * @var boolean | null
     */
    public $special_deny;

    /**
     * A directive to allow or deny transactions with duplicate invoice id (for the receiver account).
     *
     * @var boolean | null
     */
    public $allow_duplicate_invoice_id;

    /**
     * Policy directives indicating how to process the payment.
     *
     * @var PolicyDirective[]
     * maxItems: 1
     * maxItems: 30
     */
    public $policy_directives;

    /**
     * Directives for certain payment methods based on eligibility.
     *
     * @var PaymentMethodDirective[]
     * maxItems: 1
     * maxItems: 30
     */
    public $payment_method_directives;

    /**
     * Pricing directives for the transaction.
     *
     * @var PricingDirective[]
     * maxItems: 1
     * maxItems: 25
     */
    public $pricing_directives;

    /**
     * Auth directives for the transaction.
     *
     * @var AuthorizationDirectives | null
     */
    public $authorization_directives;

    /**
     * Currency receiving type defines the options when receiving payment in a currency not held by the reciver.
     *
     * use one of constants defined in this class to set the value:
     * @see CURRENCY_RECEIVING_DIRECTIVE_ACCEPT
     * @see CURRENCY_RECEIVING_DIRECTIVE_DENY
     * @see CURRENCY_RECEIVING_DIRECTIVE_HOLD
     * @see CURRENCY_RECEIVING_DIRECTIVE_ACCEPT_OPEN
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $currency_receiving_directive;

    /**
     * Flag to indicate if immediate payment is required. A directive to fail the transaction if the payment goes to
     * a pending state.
     *
     * @var boolean | null
     */
    public $immediate_payment_required;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->disbursement_type) || Assert::minLength(
            $this->disbursement_type,
            1,
            "disbursement_type in PaymentDirectives must have minlength of 1 $within"
        );
        !isset($this->disbursement_type) || Assert::maxLength(
            $this->disbursement_type,
            255,
            "disbursement_type in PaymentDirectives must have maxlength of 255 $within"
        );
        !isset($this->linked_group_id) || Assert::minLength(
            $this->linked_group_id,
            1,
            "linked_group_id in PaymentDirectives must have minlength of 1 $within"
        );
        !isset($this->linked_group_id) || Assert::maxLength(
            $this->linked_group_id,
            10,
            "linked_group_id in PaymentDirectives must have maxlength of 10 $within"
        );
        !isset($this->settlement_account_number) || Assert::minLength(
            $this->settlement_account_number,
            1,
            "settlement_account_number in PaymentDirectives must have minlength of 1 $within"
        );
        !isset($this->settlement_account_number) || Assert::maxLength(
            $this->settlement_account_number,
            30,
            "settlement_account_number in PaymentDirectives must have maxlength of 30 $within"
        );
        !isset($this->loss_account_number) || Assert::minLength(
            $this->loss_account_number,
            1,
            "loss_account_number in PaymentDirectives must have minlength of 1 $within"
        );
        !isset($this->loss_account_number) || Assert::maxLength(
            $this->loss_account_number,
            30,
            "loss_account_number in PaymentDirectives must have maxlength of 30 $within"
        );
        !isset($this->liability_type) || Assert::minLength(
            $this->liability_type,
            1,
            "liability_type in PaymentDirectives must have minlength of 1 $within"
        );
        !isset($this->liability_type) || Assert::maxLength(
            $this->liability_type,
            255,
            "liability_type in PaymentDirectives must have maxlength of 255 $within"
        );
        Assert::notNull($this->policy_directives, "policy_directives in PaymentDirectives must not be NULL $within");
        Assert::minCount(
            $this->policy_directives,
            1,
            "policy_directives in PaymentDirectives must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->policy_directives,
            30,
            "policy_directives in PaymentDirectives must have max. count of 30 $within"
        );
        Assert::isArray(
            $this->policy_directives,
            "policy_directives in PaymentDirectives must be array $within"
        );
        if (isset($this->policy_directives)) {
            foreach ($this->policy_directives as $item) {
                $item->validate(PaymentDirectives::class);
            }
        }
        Assert::notNull($this->payment_method_directives, "payment_method_directives in PaymentDirectives must not be NULL $within");
        Assert::minCount(
            $this->payment_method_directives,
            1,
            "payment_method_directives in PaymentDirectives must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->payment_method_directives,
            30,
            "payment_method_directives in PaymentDirectives must have max. count of 30 $within"
        );
        Assert::isArray(
            $this->payment_method_directives,
            "payment_method_directives in PaymentDirectives must be array $within"
        );
        if (isset($this->payment_method_directives)) {
            foreach ($this->payment_method_directives as $item) {
                $item->validate(PaymentDirectives::class);
            }
        }
        Assert::notNull($this->pricing_directives, "pricing_directives in PaymentDirectives must not be NULL $within");
        Assert::minCount(
            $this->pricing_directives,
            1,
            "pricing_directives in PaymentDirectives must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->pricing_directives,
            25,
            "pricing_directives in PaymentDirectives must have max. count of 25 $within"
        );
        Assert::isArray(
            $this->pricing_directives,
            "pricing_directives in PaymentDirectives must be array $within"
        );
        if (isset($this->pricing_directives)) {
            foreach ($this->pricing_directives as $item) {
                $item->validate(PaymentDirectives::class);
            }
        }
        !isset($this->authorization_directives) || Assert::isInstanceOf(
            $this->authorization_directives,
            AuthorizationDirectives::class,
            "authorization_directives in PaymentDirectives must be instance of AuthorizationDirectives $within"
        );
        !isset($this->authorization_directives) ||  $this->authorization_directives->validate(PaymentDirectives::class);
        !isset($this->currency_receiving_directive) || Assert::minLength(
            $this->currency_receiving_directive,
            1,
            "currency_receiving_directive in PaymentDirectives must have minlength of 1 $within"
        );
        !isset($this->currency_receiving_directive) || Assert::maxLength(
            $this->currency_receiving_directive,
            255,
            "currency_receiving_directive in PaymentDirectives must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['disbursement_type'])) {
            $this->disbursement_type = $data['disbursement_type'];
        }
        if (isset($data['linked_group_id'])) {
            $this->linked_group_id = $data['linked_group_id'];
        }
        if (isset($data['settlement_account_number'])) {
            $this->settlement_account_number = $data['settlement_account_number'];
        }
        if (isset($data['loss_account_number'])) {
            $this->loss_account_number = $data['loss_account_number'];
        }
        if (isset($data['liability_type'])) {
            $this->liability_type = $data['liability_type'];
        }
        if (isset($data['special_deny'])) {
            $this->special_deny = $data['special_deny'];
        }
        if (isset($data['allow_duplicate_invoice_id'])) {
            $this->allow_duplicate_invoice_id = $data['allow_duplicate_invoice_id'];
        }
        if (isset($data['policy_directives'])) {
            $this->policy_directives = [];
            foreach ($data['policy_directives'] as $item) {
                $this->policy_directives[] = new PolicyDirective($item);
            }
        }
        if (isset($data['payment_method_directives'])) {
            $this->payment_method_directives = [];
            foreach ($data['payment_method_directives'] as $item) {
                $this->payment_method_directives[] = new PaymentMethodDirective($item);
            }
        }
        if (isset($data['pricing_directives'])) {
            $this->pricing_directives = [];
            foreach ($data['pricing_directives'] as $item) {
                $this->pricing_directives[] = new PricingDirective($item);
            }
        }
        if (isset($data['authorization_directives'])) {
            $this->authorization_directives = new AuthorizationDirectives($data['authorization_directives']);
        }
        if (isset($data['currency_receiving_directive'])) {
            $this->currency_receiving_directive = $data['currency_receiving_directive'];
        }
        if (isset($data['immediate_payment_required'])) {
            $this->immediate_payment_required = $data['immediate_payment_required'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->policy_directives = [];
        $this->payment_method_directives = [];
        $this->pricing_directives = [];
        if (isset($data)) {
            $this->map($data);
        }
    }

    public function initAuthorizationDirectives(): AuthorizationDirectives
    {
        return $this->authorization_directives = new AuthorizationDirectives();
    }
}
