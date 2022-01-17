<?php

namespace OxidSolutionCatalysts\PayPalApi\Service;

use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\Order;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\OrderAuthorizeRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\OrderCaptureRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\OrderRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\OrderValidateRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\PaymentContextData;
use OxidSolutionCatalysts\PayPalApi\Model\Orders\PaymentDetailsRequest;

class Orders extends BaseService
{
    protected $basePath = '/v2/checkout';

    /**
     * Creates an order. Supports orders with only one purchase unit.
     *
     * @param $order mixed
     *
     * @param $payPalPartnerAttributionId string
     *
     * @param $payPalClientMetadataId string
     *
     * @param $prefer string The preferred server response upon successful completion of the request. Value
     * is:<ul><li><code>return=minimal</code>. The server returns a minimal response to optimize communication
     * between the API caller and the server. A minimal response includes the <code>id</code>, <code>status</code>
     * and HATEOAS links.</li><li><code>return=representation</code>. The server returns a complete resource
     * representation, including the current state of the resource.</li></ul>
     *
     * @throws ApiException
     * @return Order
     */
    public function createOrder(OrderRequest $order, $payPalPartnerAttributionId, $payPalClientMetadataId, $prefer = 'return=minimal'): Order
    {
        $path = "/orders";

        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Partner-Attribution-Id'] = $payPalPartnerAttributionId;
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;


        $body = json_encode($order, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new Order($jsonData);
    }

    /**
     * Shows details for an order, by ID.
     *
     * @param $id string The ID of the order for which to show details.
     *
     * @throws ApiException
     * @return Order
     */
    public function showOrderDetails($id): Order
    {
        $path = "/orders/{$id}";



        $body = null;
        $response = $this->send('GET', $path, [], [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new Order($jsonData);
    }

    /**
     * Updates an order with the `CREATED` or `APPROVED` status.<br/>You cannot update an order with the `COMPLETED`
     * status.<br/>To make an update, you must provide a `reference_id`.<br/>If you omit a `reference_id` for an
     * order with one purchase unit, PayPal defaults to a `reference_id` of `default`, which enables you to use a
     * path:<pre>"path": "/purchase_units/@reference_id=='default'/{attribute-or-object}"</pre>.<br/>You can patch
     * these attributes and objects to complete these operations:<ul><li><code>intent</code> &mdash;
     * replace.</li><li><code>purchase_units</code> &mdash; replace,
     * add.</li><li><code>purchase_units[].custom_id</code> &mdash; replace, add,
     * remove.</li><li><code>purchase_units[].description</code> &mdash; replace, add,
     * remove.</li><li><code>purchase_units[].payee.email</code> &mdash;
     * replace.</li><li><code>purchase_units[].shipping.name</code> &mdash; replace,
     * add.</li><li><code>purchase_units[].shipping.address</code> &mdash; replace,
     * add.</li><li><code>purchase_units[].soft_descriptor</code> &mdash; replace,
     * remove.</li><li><code>purchase_units[].amount</code> &mdash;
     * replace.</li><li><code>purchase_units[].invoice_id</code> &mdash; replace, add,
     * remove.</li><li><code>purchase_units[].payment_instruction</code> &mdash;
     * replace.</li><li><code>purchase_units[].payment_instruction.disbursement_mode</code> &mdash;
     * replace.<blockquote><strong>Note:</strong> By default, <code>disbursement_mode</code> is
     * <code>INSTANT</code>.</blockquote></li><li><code>purchase_units[].payment_instruction.platform_fees</code>
     * &mdash; replace, add, remove.</li></ul>
     *
     * @param $id string The ID of the order to update.
     *
     * @param $patchRequest mixed
     *
     * @throws ApiException
     * @return void
     */
    public function updateOrder($id, array $patchRequest): void
    {
        $path = "/orders/{$id}";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', $path, [], $headers, $body);
    }

    /**
     * Validates a payment method and checks it for contingencies.
     *
     * @param $payPalClientMetadataId string
     *
     * @param $id string The ID of the order for which to validate the payment method.
     *
     * @param $orderValidateRequest mixed
     *
     * @throws ApiException
     * @return Order
     */
    public function validatePaymentMethod($payPalClientMetadataId, $id, OrderValidateRequest $orderValidateRequest): Order
    {
        $path = "/orders/{$id}/validate-payment-method";

        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($orderValidateRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new Order($jsonData);
    }

    /**
     * Authorizes payment for an order. To successfully authorize payment for an order, the buyer must first approve
     * the order or a valid payment_source must be provided in the request. A buyer can approve the order upon being
     * redirected to the rel:approve URL that was returned in the HATEOAS links in the create order response.
     *
     * @param $payPalClientMetadataId string
     *
     * @param $id string The ID of the order for which to authorize.
     *
     * @param $authorizeRequest mixed
     *
     * @param $payPalAuthAssertion string An API-caller-provided JSON Web Token (JWT) assertion that identifies the
     * merchant. For details, see <a
     * href="/docs/api/reference/api-requests/#paypal-auth-assertion">PayPal-Auth-Assertion</a>.
     *
     * @param $prefer string The preferred server response upon successful completion of the request. Value
     * is:<ul><li><code>return=minimal</code>. The server returns a minimal response to optimize communication
     * between the API caller and the server. A minimal response includes the <code>id</code>, <code>status</code>
     * and HATEOAS links.</li><li><code>return=representation</code>. The server returns a complete resource
     * representation, including the current state of the resource.</li></ul>
     *
     * @throws ApiException
     * @return Order
     */
    public function authorizePaymentForOrder($payPalClientMetadataId, $id, OrderAuthorizeRequest $authorizeRequest, $payPalAuthAssertion, $prefer = 'return=minimal'): Order
    {
        $path = "/orders/{$id}/authorize";

        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;
        $headers['Prefer'] = $prefer;


        $body = json_encode($authorizeRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new Order($jsonData);
    }

    /**
     * Captures payment for an order. To successfully capture payment for an order, the buyer must first approve the
     * order or a valid payment_source must be provided in the request. A buyer can approve the order upon being
     * redirected to the rel:approve URL that was returned in the HATEOAS links in the create order response.
     *
     * @param $payPalClientMetadataId string
     *
     * @param $id string The ID of the order for which to capture a payment.
     *
     * @param $orderCaptureRequest mixed
     *
     * @param $payPalAuthAssertion string An API-caller-provided JSON Web Token (JWT) assertion that identifies the
     * merchant. For details, see <a
     * href="/docs/api/reference/api-requests/#paypal-auth-assertion">PayPal-Auth-Assertion</a>.
     *
     * @param $prefer string The preferred server response upon successful completion of the request. Value
     * is:<ul><li><code>return=minimal</code>. The server returns a minimal response to optimize communication
     * between the API caller and the server. A minimal response includes the <code>id</code>, <code>status</code>
     * and HATEOAS links.</li><li><code>return=representation</code>. The server returns a complete resource
     * representation, including the current state of the resource.</li></ul>
     *
     * @throws ApiException
     * @return Order
     */
    public function capturePaymentForOrder($payPalClientMetadataId, $id, OrderCaptureRequest $orderCaptureRequest, $payPalAuthAssertion, $prefer = 'return=minimal'): Order
    {
        $path = "/orders/{$id}/capture";

        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;
        $headers['Prefer'] = $prefer;


        $body = json_encode($orderCaptureRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new Order($jsonData);
    }

    /**
     * Saves an order. Supports multiple authorize and capture.
     *
     * @param $payPalClientMetadataId string
     *
     * @param $id string The ID of the order to save.
     *
     * @param $prefer string The preferred server response upon successful completion of the request. Value
     * is:<ul><li><code>return=minimal</code>. The server returns a minimal response to optimize communication
     * between the API caller and the server. A minimal response includes the <code>id</code>, <code>status</code>
     * and HATEOAS links.</li><li><code>return=representation</code>. The server returns a complete resource
     * representation, including the current state of the resource.</li></ul>
     *
     * @throws ApiException
     * @return Order
     */
    public function saveOrder($payPalClientMetadataId, $id, $prefer = 'return=minimal'): Order
    {
        $path = "/orders/{$id}/save";

        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;


        $body = null;
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new Order($jsonData);
    }

    /**
     * Voids an order, by ID.
     *
     * @param $payPalClientMetadataId string
     *
     * @param $id string The ID of the order which to void.
     *
     * @param $prefer string The preferred server response upon successful completion of the request. Value
     * is:<ul><li><code>return=minimal</code>. The server returns a minimal response to optimize communication
     * between the API caller and the server. A minimal response includes the <code>id</code>, <code>status</code>
     * and HATEOAS links.</li><li><code>return=representation</code>. The server returns a complete resource
     * representation, including the current state of the resource.</li></ul>
     *
     * @throws ApiException
     * @return void
     */
    public function voidOrder($payPalClientMetadataId, $id, $prefer = 'return=minimal'): void
    {
        $path = "/orders/{$id}/void";

        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;


        $body = null;
        $response = $this->send('POST', $path, [], $headers, $body);
    }

    /**
     * Get the payment context data required for processing payments for an order.
     *
     * @param $orderId string The order id for which payment context data is requested.
     *
     * @throws ApiException
     * @return PaymentContextData
     */
    public function getPaymentContextForAnOrder($orderId): PaymentContextData
    {
        $path = "/payment-context";


        $params = [];
        $params['order_id'] = $orderId;

        $body = null;
        $response = $this->send('GET', $path, $params, [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new PaymentContextData($jsonData);
    }

    /**
     * Update the details of payment(s) processed for an order.
     *
     * @param $id string The ID of the order for which to update payment details.
     *
     * @param $paymentDetails mixed
     *
     * @throws ApiException
     * @return void
     */
    public function updatePaymentDetailsForTheOrder($id, PaymentDetailsRequest $paymentDetails): void
    {
        $path = "/orders/{$id}/update-paymentDetails";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($paymentDetails, true);
        $response = $this->send('POST', $path, [], $headers, $body);
    }
}
