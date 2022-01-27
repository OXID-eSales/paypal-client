<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An email address at which the person or business can be contacted.
 *
 * generated from: customized_x_unsupported_8605_customer_common_overrides-email.json
 */
class Email implements JsonSerializable
{
    use BaseModel;

    /** The email ID to be used to contact the customer service of the business. */
    public const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /**
     * The role of the email address.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CUSTOMER_SERVICE
     * @var string
     * minLength: 1
     * maxLength: 50
     */
    public $type;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in Email must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in Email must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            50,
            "type in Email must have maxlength of 50 $within"
        );
        Assert::notNull($this->email, "email in Email must not be NULL $within");
        Assert::minLength(
            $this->email,
            3,
            "email in Email must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->email,
            254,
            "email in Email must have maxlength of 254 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
