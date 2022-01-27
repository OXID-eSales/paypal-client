<?php

namespace OxidSolutionCatalysts\PayPalApi\Model\Disputes;

use JsonSerializable;
use OxidSolutionCatalysts\PayPalApi\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Cloudevent envelope as specified in https://cloudevents.io/.
 *
 * generated from: event-dispute_cloud_event.json
 */
class EventDisputeCloudEvent implements JsonSerializable
{
    use BaseModel;

    /** The supported content type of the dispute event. */
    public const DATACONTENTTYPE_APPLICATION_JSON = 'application/json';

    /**
     * The CloudEvent specification version that this event uses, as defined in the [CloudEvents
     * Specification](https://github.com/cloudevents/spec/blob/v1.0/spec.md#specversion).
     *
     * @var string
     * minLength: 1
     * maxLength: 10
     */
    public $specversion;

    /**
     * The Content type of the data attribute value, as defined in the [CloudEvents
     * Specification](https://github.com/cloudevents/spec/blob/v1.0/spec.md#datacontenttype).
     *
     * use one of constants defined in this class to set the value:
     * @see DATACONTENTTYPE_APPLICATION_JSON
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $datacontenttype;

    /**
     * The dispute event details.
     *
     * @var EventDisputeEvent
     */
    public $data;

    /**
     * The identifier of the event, as defined in the [CloudEvents
     * Specification](https://github.com/cloudevents/spec/blob/v1.0/spec.md#id).
     *
     * @var string
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    /**
     * The schema that data adheres to, as defined in the [CloudEvents
     * Specification](https://github.com/cloudevents/spec/blob/v1.0/spec.md#dataschema).
     *
     * @var string | null
     * minLength: 1
     * maxLength: 512
     */
    public $dataschema;

    /**
     * The subject of the event, as defined in the [CloudEvents
     * Specification](https://github.com/cloudevents/spec/blob/v1.0/spec.md#subject).
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $subject;

    /**
     * The value describing the type of event related to the originating occurrence, as defined in the [CloudEvents
     * Specification](https://github.com/cloudevents/spec/blob/v1.0/spec.md#type). Supported type : <br>
     * `com.paypal.customer.disputes.created` - The dispute with the specified `dispute_id` has been created. <br>
     * `com.paypal.customer.disputes.reason-changed` - The `reason` of the dispute has been changed <br>
     * `com.paypal.customer.disputes.cancelled` - The dispute has been cancelled. <br>
     * `com.paypal.customer.disputes.claim-accepted` - The merchant has accepted the claim. <br>
     * `com.paypal.customer.disputes.offer-made` - The merchant has made an offer. <br>
     * `com.paypal.customer.disputes.offer-accepted` - The customer has accepted the offer. <br>
     * `com.paypal.customer.disputes.offer-denied` - The customer / merchant has provided a supporting info. <br>
     * `com.paypal.customer.disputes.escalated` - The dispute has been escalated. <br>
     * `com.paypal.customer.disputes.message-sent` - The customer / merchant has posted a message. <br>
     * `com.paypal.customer.disputes.item-return-acknowledged` - The merchant has acknowledged the item returned.
     * <br> `com.paypal.customer.disputes.evidence-provided` - The customer / merchant has provided an evidence. <br>
     * `com.paypal.customer.disputes.supporting-info-provided` - The customer / merchant has provided supporting
     * information. <br> `com.paypal.customer.disputes.appealed` - The customer / merchant has appealed the
     * adjudication. <br> `com.paypal.customer.disputes.evidence-requested` - The customer / merchant has been
     * requested the evidence. <br>  `com.paypal.customer.disputes.adjudicated` - The dispute has been adjudicated.
     * <br> `com.paypal.customer.disputes.resolved` - The dispute has been resolved.
     *
     * @var string
     * minLength: 1
     * maxLength: 512
     */
    public $type;

    /**
     * The event source, as defined in https://github.com/cloudevents/spec/blob/v1.0/spec.md#source-1.
     *
     * @var string
     * minLength: 1
     * maxLength: 512
     */
    public $source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->specversion, "specversion in EventDisputeCloudEvent must not be NULL $within");
        Assert::minLength(
            $this->specversion,
            1,
            "specversion in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->specversion,
            10,
            "specversion in EventDisputeCloudEvent must have maxlength of 10 $within"
        );
        Assert::notNull($this->datacontenttype, "datacontenttype in EventDisputeCloudEvent must not be NULL $within");
        Assert::minLength(
            $this->datacontenttype,
            1,
            "datacontenttype in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->datacontenttype,
            255,
            "datacontenttype in EventDisputeCloudEvent must have maxlength of 255 $within"
        );
        Assert::notNull($this->data, "data in EventDisputeCloudEvent must not be NULL $within");
        Assert::isInstanceOf(
            $this->data,
            EventDisputeEvent::class,
            "data in EventDisputeCloudEvent must be instance of EventDisputeEvent $within"
        );
         $this->data->validate(EventDisputeCloudEvent::class);
        Assert::notNull($this->id, "id in EventDisputeCloudEvent must not be NULL $within");
        Assert::minLength(
            $this->id,
            1,
            "id in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->id,
            255,
            "id in EventDisputeCloudEvent must have maxlength of 255 $within"
        );
        !isset($this->time) || Assert::minLength(
            $this->time,
            20,
            "time in EventDisputeCloudEvent must have minlength of 20 $within"
        );
        !isset($this->time) || Assert::maxLength(
            $this->time,
            64,
            "time in EventDisputeCloudEvent must have maxlength of 64 $within"
        );
        !isset($this->dataschema) || Assert::minLength(
            $this->dataschema,
            1,
            "dataschema in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        !isset($this->dataschema) || Assert::maxLength(
            $this->dataschema,
            512,
            "dataschema in EventDisputeCloudEvent must have maxlength of 512 $within"
        );
        !isset($this->subject) || Assert::minLength(
            $this->subject,
            1,
            "subject in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        !isset($this->subject) || Assert::maxLength(
            $this->subject,
            255,
            "subject in EventDisputeCloudEvent must have maxlength of 255 $within"
        );
        Assert::notNull($this->type, "type in EventDisputeCloudEvent must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            512,
            "type in EventDisputeCloudEvent must have maxlength of 512 $within"
        );
        Assert::notNull($this->source, "source in EventDisputeCloudEvent must not be NULL $within");
        Assert::minLength(
            $this->source,
            1,
            "source in EventDisputeCloudEvent must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->source,
            512,
            "source in EventDisputeCloudEvent must have maxlength of 512 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['specversion'])) {
            $this->specversion = $data['specversion'];
        }
        if (isset($data['datacontenttype'])) {
            $this->datacontenttype = $data['datacontenttype'];
        }
        if (isset($data['data'])) {
            $this->data = new EventDisputeEvent($data['data']);
        }
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['time'])) {
            $this->time = $data['time'];
        }
        if (isset($data['dataschema'])) {
            $this->dataschema = $data['dataschema'];
        }
        if (isset($data['subject'])) {
            $this->subject = $data['subject'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }
        if (isset($data['source'])) {
            $this->source = $data['source'];
        }
    }

    public function __construct(array $data = null)
    {
        $this->data = new EventDisputeEvent();
        if (isset($data)) {
            $this->map($data);
        }
    }
}
