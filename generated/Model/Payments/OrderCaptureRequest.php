<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Payments;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Captures either a portion or the full order amount of an approved and saved order.
 *
 * generated from: order_capture_request.json
 */
class OrderCaptureRequest extends CaptureRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The identifier of the order for this capture.
     *
     * @var string | null
     * maxLength: 19
     */
    public $order_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->order_id) || Assert::maxLength(
            $this->order_id,
            19,
            "order_id in OrderCaptureRequest must have maxlength of 19 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['order_id'])) {
            $this->order_id = $data['order_id'];
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
