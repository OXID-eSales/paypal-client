<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Partner;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 *
 * generated from: customized_x_unsupported_5103_customer_common_overrides-person_phone_detail.json
 */
class PersonPhoneDetail2 extends Phone implements JsonSerializable
{
    use BaseModel;

    /** A fax machine. */
    const TYPE_FAX = 'FAX';

    /** A home phone. */
    const TYPE_HOME = 'HOME';

    /** A mobile phone. */
    const TYPE_MOBILE = 'MOBILE';

    /** Other. */
    const TYPE_OTHER = 'OTHER';

    /** A pager. */
    const TYPE_PAGER = 'PAGER';

    /**
     * The phone type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_FAX
     * @see TYPE_HOME
     * @see TYPE_MOBILE
     * @see TYPE_OTHER
     * @see TYPE_PAGER
     * @var string
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in PersonPhoneDetail2 must not be NULL $within");
    }

    private function map(array $data)
    {
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) {
            $this->map($data);
        }
    }
}
