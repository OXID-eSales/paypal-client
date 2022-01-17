<?php

namespace OxidSolutionCatalysts\PayPalApi\Service;

use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredAdjudicationInfo;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredDispute;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredDisputeCreateRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredDisputeCreateResponse;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredEligibilityRequest;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredEligibilityResponse;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredReferredDisputes;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredRefundInfo;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ReferredSubsequentAction;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestAcceptClaim;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestAcceptOffer;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestAcknowledgeReturnItem;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestAdjudicate;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestCancel;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestChangeReason;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestDenyOffer;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestEligibility;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestEscalate;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestEvidences;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestMakeOffer;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestMetrics;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestProvideSupportingInfo;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestRequireEvidence;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\RequestSendMessage;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseDispute;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseDisputeCreate;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseDisputeEligibility;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseDisputeSearch;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseDisputesChangeReason;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseMetrics;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponsePartnerAction;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseSubsequentAction;
use OxidSolutionCatalysts\PayPalApi\Model\Disputes\ResponseSuggestionResponse;

class Disputes extends BaseService
{
    protected $basePath = '/v1/customer';

    /**
     * Notifies PayPal about adjudication updates for a referred dispute, by ID.
     *
     * @param $disputeId string The ID of the dispute to settle.
     *
     * @param $adjudicationInfo mixed
     *
     * @throws ApiException
     * @return ReferredSubsequentAction
     */
    public function notifyPayPalAboutReferredDisputeAdjudicationUpdates($disputeId, ReferredAdjudicationInfo $adjudicationInfo): ReferredSubsequentAction
    {
        $path = "/referred-disputes/{$disputeId}/process-adjudication-event";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($adjudicationInfo, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferredSubsequentAction($jsonData);
    }

    /**
     * <blockquote><strong>Important:</strong> This method is for sandbox use only.</blockquote> Updates the status
     * of a dispute, by ID, from <code>UNDER_REVIEW</code> to
     * either:<ul><li><code>WAITING_FOR_BUYER_RESPONSE</code></li><li><code>WAITING_FOR_SELLER_RESPONSE</code></li></ul>This
     * status change enables either the customer or merchant to submit evidence for the dispute. To make this call,
     * the dispute <code>status</code> must be <code>UNDER_REVIEW</code>. Specify an <code>action</code> value in the
     * JSON request body to indicate whether the status change enables the customer or merchant to submit
     * evidence:<table><thead><tr align="left"><th>If <code>action</code> is</th><th>The <code>status</code> updates
     * to</th></tr></thead><tbody><tr><td><code>BUYER_EVIDENCE</code></td><td>
     * <code>WAITING_FOR_BUYER_RESPONSE</code></td></tr><tr><td><code>SELLER_EVIDENCE</code></td><td>
     * <code>WAITING_FOR_SELLER_RESPONSE</code></td></tr></tbody></table>
     *
     * @param $disputeId string The ID of the dispute that requires evidence.
     *
     * @param $requireEvidenceRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function updateDisputeStatus($disputeId, RequestRequireEvidence $requireEvidenceRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/require-evidence";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($requireEvidenceRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Notifies PayPal about a refund for a referred dispute, by ID.
     *
     * @param $disputeId string The ID of the dispute to settle.
     *
     * @param $refundInfo mixed
     *
     * @throws ApiException
     * @return ReferredSubsequentAction
     */
    public function notifyPayPalAboutRefundForReferredDispute($disputeId, ReferredRefundInfo $refundInfo): ReferredSubsequentAction
    {
        $path = "/referred-disputes/{$disputeId}/process-refund-event";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($refundInfo, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferredSubsequentAction($jsonData);
    }

    /**
     * Determines whether you can create a case for a transaction, by encrypted transaction ID. For an already
     * created dispute, lists which reasons the customer can use to update a dispute, by ID.
     * <blockquote><strong>Note:</strong> To call the determine dispute eligibility method in your sandbox, ask your
     * PayPal account manager to add the required scopes.</blockquote>
     *
     * @param $eligibilityRequest mixed
     *
     * @throws ApiException
     * @return ResponseDisputeEligibility
     */
    public function determineDisputeEligibility(RequestEligibility $eligibilityRequest): ResponseDisputeEligibility
    {
        $path = "/disputes/validate-eligibility";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($eligibilityRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseDisputeEligibility($jsonData);
    }

    /**
     * Lists disputes with a full or summary set of details. Default is a summary set of details, which shows the
     * <code>dispute_id</code>, <code>reason</code>, <code>status</code>, <code>dispute_amount</code>,
     * <code>create_time</code>, and <code>update_time</code> fields.<br/><br/>To filter the disputes in the
     * response, specify one or more optional query parameters. To limit the number of disputes in the response,
     * specify the <code>page_size</code> query parameter.<br/><br/>To list multiple disputes, set these query
     * parameters in the request:<ul><li><code>page_size=2</code></li><li><code>start_time</code> instead of
     * <code>disputed_transaction_id</code></li></ul><br/>If the response contains more than two disputes, it lists
     * two disputes and includes a HATEOAS link to the next page of results.
     *
     * @param $accountNumber string Filters the disputes in the response by a PayPal user account with this payer
     * ID.<blockquote><strong>Note:</strong> By default, the list shows the disputes for the logged-in user who calls
     * the API. The user invokes the API through an access token and the API fetches the disputes of the logged-in
     * user based on this token. So, the user does not explicitly send his or her account number to the API. For
     * partner accounts, shows details for all disputes that are related to merchants who are associated with the
     * partner. For a MAM account, it can list disputes for a child account by account number.</blockquote>
     *
     * @param $createTimeBefore string The date and time when the dispute was created, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.
     *
     * @param $disputeChannel array Filters the disputes in the response by a channel. Separate multiple values with
     * a comma (`,`). When you specify more than one dispute_channel, the response lists disputes that belong to any
     * of the specified dispute_channel.
     *
     * @param $sortOrder string Sorts the disputes in the response in ascending or descending order.
     *
     * @param $sortBy string Sorts the disputes in the response by create time, update time, or response due date.
     *
     * @param $searchText string Filters the disputes by counter party's - name or email, transaction_id, invoice_id
     * or dispute_id for the given search text.
     *
     * @param $disputeAmountLte string Filters the disputes in the response by a dispute amount.
     *
     * @param $disputeAmountGte string Filters the disputes in the response by a dispute amount.
     *
     * @param $disputeCurrency string Filters the disputes in the response by one or more currency codes. Separate
     * multiple values with a comma (`,`). When you specify more than one currency code, the response lists disputes
     * with any of the specified currency codes.
     *
     * @param $responseDueDateAfter string The date and time after which the dispute is due for response, in
     * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.
     *
     * @param $responseDueDateBefore string The date and time before which the dispute is due for response, in
     * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.
     *
     * @param $updateTimeAfter string The date and time when the dispute was last updated, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.
     *
     * @param $updateTimeBefore string The date and time when the dispute was last updated, in [Internet date and
     * time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.
     *
     * @param $createTimeAfter string The date and time when the dispute was created, in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.
     *
     * @param $disputeFlows string Filters the disputes in the response by one or more dispute flows. Separate
     * multiple values with a comma (`,`). When you specify more than one dispute flow, the response lists disputes
     * with any of the specified dispute flows.
     *
     * @param $statuses string Filters the disputes in the response by one or more statuses. Separate multiple values
     * with a comma (`,`). When you specify more than one status, the response lists disputes with any of the
     * specified statuses.
     *
     * @param $reasons string Filters the disputes in the response by one or more reasons. Separate multiple values
     * with a comma (`,`). When you specify more than one reason, the response lists disputes that belong to any of
     * the specified reasons.
     *
     * @param $name string Filters the disputes in the response by a counter party's full name. Also supports partial
     * name search.
     *
     * @param $email string Filters the disputes in the response by a counter party's primary email.
     *
     * @param $invoiceNumber string Filters the disputes in the response by a https:\/\/developer.paypal.com\/docs\/api\/customer-disputes\/v1\/#errors, by ID.
     *
     * @param $disputeState string Filters the disputes in the response by a state. Separate multiple values with a
     * comma (`,`). When you specify more than one dispute_state, the response lists disputes that belong to any of
     * the specified dispute_state.
     *
     * @param $disputedTransactionId string Filters the disputes in the response by a transaction, by
     * ID.<br/><br/>You can specify either but not both the `start_time` and `disputed_transaction_id` query
     * parameter.
     *
     * @param $disputeLifeCycleStage array Filters the disputes in the response by a life_cycle_stage. Separate
     * multiple values with a comma (`,`). When you specify more than one dispute_life_cycle_stage, the response
     * lists disputes that belong to any of the specified dispute_life_cycle_stage.
     *
     * @param $page integer The page number of the results, as a non-zero integer. Enables you to search by page
     * number. Use in combination with the `page_size`.
     *
     * @param $pageSize integer Limits the number of disputes in the response to this value.
     *
     * @param $nextPageToken string The token that describes the next page of results to fetch. The <a
     * href="/docs/api/customer-disputes/v1/#disputes_list">list disputes</a> call returns this token in the HATEOAS
     * links in the response.
     *
     * @param $totalRequired boolean Indicates whether to include the total number of items in the response.
     *
     * @param $fields string Filters the fields returned for each dispute in the response to a set of summary fields
     * or all fields. Value is `summary` or `all`. The `all` value is supported for transaction ID queries but not
     * supported for time-range queries. The set of summary fields are `dispute_id`, `reason`, `status`,
     * `dispute_amount`, `create_time`, and `update_time`.
     *
     * @param $startTime string Filters the disputes in the response by a creation date and time. The start time must
     * be within the last 180 days. Value is in [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6). For example,
     * *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.<br/><br/>You can specify either but not both the
     * `start_time` and `disputed_transaction_id` query parameters.
     *
     * @throws ApiException
     * @return ResponseDisputeSearch
     */
    public function listDisputes(
        $accountNumber,
        $createTimeBefore,
        $disputeChannel,
        $sortOrder,
        $sortBy,
        $searchText,
        $disputeAmountLte,
        $disputeAmountGte,
        $disputeCurrency,
        $responseDueDateAfter,
        $responseDueDateBefore,
        $updateTimeAfter,
        $updateTimeBefore,
        $createTimeAfter,
        $disputeFlows,
        $statuses,
        $reasons,
        $name,
        $email,
        $invoiceNumber,
        $disputeState,
        $disputedTransactionId,
        $disputeLifeCycleStage,
        $page = 1,
        $pageSize = 10,
        $nextPageToken = 'The first page of data',
        $totalRequired = false,
        $fields = 'summary',
        $startTime = 'Current date and time'
    ): ResponseDisputeSearch {
        $path = "/disputes";


        $params = [];
        $params['account_number'] = $accountNumber;
        $params['create_time_before'] = $createTimeBefore;
        $params['dispute_channel'] = $disputeChannel;
        $params['sort_order'] = $sortOrder;
        $params['sort_by'] = $sortBy;
        $params['search_text'] = $searchText;
        $params['dispute_amount_lte'] = $disputeAmountLte;
        $params['dispute_amount_gte'] = $disputeAmountGte;
        $params['dispute_currency'] = $disputeCurrency;
        $params['response_due_date_after'] = $responseDueDateAfter;
        $params['response_due_date_before'] = $responseDueDateBefore;
        $params['update_time_after'] = $updateTimeAfter;
        $params['update_time_before'] = $updateTimeBefore;
        $params['create_time_after'] = $createTimeAfter;
        $params['dispute_flows'] = $disputeFlows;
        $params['statuses'] = $statuses;
        $params['reasons'] = $reasons;
        $params['name'] = $name;
        $params['email'] = $email;
        $params['invoice_number'] = $invoiceNumber;
        $params['dispute_state'] = $disputeState;
        $params['disputed_transaction_id'] = $disputedTransactionId;
        $params['dispute_life_cycle_stage'] = $disputeLifeCycleStage;
        $params['page'] = $page;
        $params['page_size'] = $pageSize;
        $params['next_page_token'] = $nextPageToken;
        $params['total_required'] = var_export($totalRequired, true);
        $params['fields'] = $fields;
        $params['start_time'] = $startTime;

        $body = null;
        $response = $this->send('GET', $path, $params, [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseDisputeSearch($jsonData);
    }

    /**
     * Sandbox only. Creates a dispute. <blockquote><strong>Note:</strong> To call the create dispute method, ask
     * your PayPal account manager to add the required scopes.</blockquote>
     *
     * @param $dispute mixed
     *
     * @throws ApiException
     * @return ResponseDisputeCreate
     */
    public function createDispute(ResponseDispute $dispute): ResponseDisputeCreate
    {
        $path = "/disputes";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($dispute, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseDisputeCreate($jsonData);
    }

    /**
     * Appeals a dispute, by ID. To appeal a dispute, use the <code>appeal</code> link in the <a
     * href="/docs/api/hateoas-links/">HATEOAS links</a> from the show dispute details response. If this link does
     * not appear, you cannot appeal the dispute. Submit new evidence as a document or notes in the JSON request
     * body. The following rules apply to document file types and sizes:<ul><li>The merchant can upload up to 50 MB
     * of files for a case.</li><li>Individual files must be smaller than 10 MB.</li><li>The supported file formats
     * are JPG, GIF, PNG, and PDF.</li></ul><br/>To make this request, specify the dispute ID in the URI and specify
     * the evidence in the JSON request body. For information about dispute reasons, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * @param $disputeId string The PayPal dispute ID.
     *
     * @param $evidence mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function appealDispute($disputeId, RequestEvidences $evidence): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/appeal";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($evidence, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Creates a dispute for a partner- or marketplace-created referred case.
     *
     * @param $disputeCreateRequest mixed
     *
     * @throws ApiException
     * @return ReferredDisputeCreateResponse
     */
    public function createReferredDispute(ReferredDisputeCreateRequest $disputeCreateRequest): ReferredDisputeCreateResponse
    {
        $path = "/referred-disputes";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($disputeCreateRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferredDisputeCreateResponse($jsonData);
    }

    /**
     * Lists referred disputes with a summary of dispute details. Default is a summary set of details, which shows
     * the <code>dispute_id</code>, <code>reason</code>, <code>status</code>, <code>dispute_amount</code>,
     * <code>create_time</code>, and <code>update_time</code> fields.<br/><br/>To filter the disputes in the
     * response, specify one or more optional query parameters. To limit the number of disputes in the response,
     * specify the <code>page_size</code> query parameter.<br/><br/>To list multiple disputes, set these query
     * parameters in the
     * request:<ul><li><code>page_size=2</code></li><li><code>create_time_after</code><code>create_time_before</code></li></ul><br/>If
     * the response contains more than two disputes, it lists two disputes and includes a HATEOAS link to the next
     * page of results.
     *
     * @param $createTimeBefore string The date and time when the dispute was created before, in [Internet date and
     * time format](https://tools.ietf.org/html/rfc3339#section-5.6). Seconds are required while fractional seconds
     * are optional.<blockquote><strong>Note:</strong> The regular expression provides guidance but does not reject
     * all invalid dates.</blockquote>
     *
     * @param $createTimeAfter string The date and time when the dispute was created after, in [Internet date and
     * time format](https://tools.ietf.org/html/rfc3339#section-5.6). Seconds are required while fractional seconds
     * are optional.<blockquote><strong>Note:</strong> The regular expression provides guidance but does not reject
     * all invalid dates.</blockquote>
     *
     * @param $pageToken string The token that describes the next page of results to fetch. The <a
     * href="/docs/api/customer-disputes/v1/#disputes_list">list disputes</a> call returns this token in the HATEOAS
     * links in the response. If you omit this parameter, the API returns the first page of data.
     *
     * @param $status string Filters the disputes in the response by a state.
     *
     * @param $disputeFlows array Filters the disputes in the response by one or more dispute flows. Separate
     * multiple values with a comma (`,`). When you specify more than one dispute flow, the response lists disputes
     * with any of the specified dispute flows.
     *
     * @param $pageSize integer Limits the number of disputes in the response to this value.
     *
     * @throws ApiException
     * @return ReferredReferredDisputes
     */
    public function listReferredDisputes($createTimeBefore, $createTimeAfter, $pageToken, $status, $disputeFlows, $pageSize = 10): ReferredReferredDisputes
    {
        $path = "/referred-disputes";


        $params = [];
        $params['create_time_before'] = $createTimeBefore;
        $params['create_time_after'] = $createTimeAfter;
        $params['page_token'] = $pageToken;
        $params['status'] = $status;
        $params['dispute_flows'] = $disputeFlows;
        $params['page_size'] = $pageSize;

        $body = null;
        $response = $this->send('GET', $path, $params, [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferredReferredDisputes($jsonData);
    }

    /**
     * Cancels a dispute, by ID. <blockquote><strong>Note:</strong> To call the cancel dispute method in your
     * sandbox, ask your PayPal account manager to add the required scopes.</blockquote>
     *
     * @param $disputeId string The ID of the dispute to cancel.
     *
     * @param $cancelRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function cancelDispute($disputeId, RequestCancel $cancelRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/cancel";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($cancelRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Escalates the dispute, by ID, to a PayPal claim. To make this call, the stage in the dispute lifecycle must be
     * `INQUIRY`.
     *
     * @param $disputeId string The ID of the dispute to escalate to a claim.
     *
     * @param $escalateRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function escalateDisputeToClaim($disputeId, RequestEscalate $escalateRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/escalate";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($escalateRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * <blockquote><strong>Important:</strong> This method is for sandbox use only.</blockquote> Settles a dispute in
     * either the customer's or merchant's favor. Merchants can make this call in the sandbox to complete end-to-end
     * dispute resolution testing, which mimics the dispute resolution that PayPal agents normally complete. To make
     * this call, the dispute <code>status</code> must be <code>UNDER_REVIEW</code>.
     *
     * @param $disputeId string The ID of the dispute to settle.
     *
     * @param $adjudicateRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function settleDispute($disputeId, RequestAdjudicate $adjudicateRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/adjudicate";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($adjudicateRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Shows details for a dispute, by ID.<blockquote><strong>Note:</strong> The fields that appear in the response
     * depend on whether you access this call through first- or third-party access. For example, if the merchant
     * shows dispute details through third-party access, the customer's email ID does not appear.</blockquote>
     *
     * @param $disputeId string The ID of the dispute for which to show details.
     *
     * @throws ApiException
     * @return ResponseDispute
     */
    public function showDisputeDetails($disputeId): ResponseDispute
    {
        $path = "/disputes/{$disputeId}";



        $body = null;
        $response = $this->send('GET', $path, [], [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseDispute($jsonData);
    }

    /**
     * Partially updates a dispute, by ID. You can update the `communication_detail` value.
     *
     * @param $disputeId string The ID of the dispute for which to update the communication detail.
     *
     * @param $patchRequest mixed
     *
     * @throws ApiException
     * @return void
     */
    public function partiallyUpdateDispute($disputeId, array $patchRequest): void
    {
        $path = "/disputes/{$disputeId}";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', $path, [], $headers, $body);
    }

    /**
     * Accepts liability for a claim, by ID. When you accept liability for a claim, the dispute closes in the
     * customer’s favor and PayPal automatically refunds money to the customer from the merchant's account.
     *
     * @param $disputeId string The ID of the dispute for which to accept a claim.
     *
     * @param $acceptClaimRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function acceptClaim($disputeId, RequestAcceptClaim $acceptClaimRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/accept-claim";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($acceptClaimRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Sends a message about a dispute, by ID, to the other party in the dispute. Merchants and customers can only
     * send messages if the `dispute_life_cycle_stage` value is `INQUIRY`.
     *
     * @param $disputeId string The ID of the dispute for which to send a message.
     *
     * @param $sendMessage mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function sendMessageAboutDisputeToOtherParty($disputeId, RequestSendMessage $sendMessage): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/send-message";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($sendMessage, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Acknowledges that the customer returned an item for a dispute, by ID. A merchant can make this request for
     * disputes with the `MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED` reason.
     *
     * @param $disputeId string The ID of the dispute for which to acknowledge the return of disputed item.
     *
     * @param $acknowledgeReturnItemRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function acknowledgeReturnedItem($disputeId, RequestAcknowledgeReturnItem $acknowledgeReturnItemRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/acknowledge-return-item";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($acknowledgeReturnItemRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Computes metrics for all disputes.
     *
     * @param $metricsRequest mixed
     *
     * @throws ApiException
     * @return ResponseMetrics
     */
    public function computeMetricsForDisputes(RequestMetrics $metricsRequest): ResponseMetrics
    {
        $path = "/disputes/compute-metrics";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($metricsRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseMetrics($jsonData);
    }

    /**
     * Changes the reason for a dispute, by ID.
     *
     * @param $disputeId string The ID of the dispute for which to change the reason.
     *
     * @param $changeReason mixed
     *
     * @throws ApiException
     * @return ResponseDisputesChangeReason
     */
    public function changeReasonForDispute($disputeId, RequestChangeReason $changeReason): ResponseDisputesChangeReason
    {
        $path = "/disputes/{$disputeId}/changeReason";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($changeReason, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseDisputesChangeReason($jsonData);
    }

    /**
     * Denies an offer that the merchant proposes for a dispute, by ID.
     *
     * @param $disputeId string The ID of the dispute for which to deny an offer.
     *
     * @param $denyOfferRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function denyOfferToResolveDispute($disputeId, RequestDenyOffer $denyOfferRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/deny-offer";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($denyOfferRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Provides the possible auto-complete or DidYouMean values for a given search text.
     *
     * @param $searchText string The search text for which auto complete or did you mean is requested. Supported
     * searchable fields include counter party name/email, transaction id, invoice id and dispute id.
     *
     * @param $searchField string The field on which the suggestions will be retrieved. Supported search fields
     * include counter party name/email, disputed transaction id, invoice number and dispute id. If the search_field
     * is not specified, suggestions will be retrieved over all the supported fields.
     *
     * @throws ApiException
     * @return ResponseSuggestionResponse
     */
    public function suggestionValuesForSearchText($searchText, $searchField): ResponseSuggestionResponse
    {
        $path = "/disputes/search-suggestions";


        $params = [];
        $params['search_text'] = $searchText;
        $params['search_field'] = $searchField;

        $body = null;
        $response = $this->send('GET', $path, $params, [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSuggestionResponse($jsonData);
    }

    /**
     * Determines whether you can create a referred case for a transaction, by encrypted transaction ID.
     *
     * @param $eligibilityRequest mixed
     *
     * @throws ApiException
     * @return ReferredEligibilityResponse
     */
    public function determineEligibilityForReferredDisputeCreation(ReferredEligibilityRequest $eligibilityRequest): ReferredEligibilityResponse
    {
        $path = "/validate-referred-dispute-eligibility";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($eligibilityRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferredEligibilityResponse($jsonData);
    }

    /**
     * Shows action details for a dispute, by action ID.
     *
     * @param $disputeId string The ID of the dispute for which to show action details.
     *
     * @param $actionId string The ID of the action for which to show details.
     *
     * @throws ApiException
     * @return ResponsePartnerAction
     */
    public function showDisputeActionDetails($disputeId, $actionId): ResponsePartnerAction
    {
        $path = "/disputes/{$disputeId}/partner-actions/{$actionId}";



        $body = null;
        $response = $this->send('GET', $path, [], [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponsePartnerAction($jsonData);
    }

    /**
     * Partially updates a dispute action, by ID. You can update the `status` and `amount` value.
     *
     * @param $disputeId string The ID of the dispute for which to update action details.
     *
     * @param $actionId string The ID of the action for which to show details.
     *
     * @param $patchRequest mixed
     *
     * @throws ApiException
     * @return void
     */
    public function partiallyUpdateDisputeAction($disputeId, $actionId, array $patchRequest): void
    {
        $path = "/disputes/{$disputeId}/partner-actions/{$actionId}";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', $path, [], $headers, $body);
    }

    /**
     * Shows details for a referred dispute, by ID.
     *
     * @param $disputeId string The ID of the dispute for which to show details.
     *
     * @throws ApiException
     * @return ReferredDispute
     */
    public function showReferredDisputeDetails($disputeId): ReferredDispute
    {
        $path = "/referred-disputes/{$disputeId}";



        $body = null;
        $response = $this->send('GET', $path, [], [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferredDispute($jsonData);
    }

    /**
     * Provides supporting information for a dispute, by ID. A merchant or buyer can make this request for disputes
     * if they find the `provide-supporting-info` link in the HATEOAS links in the list disputes response. The party
     * can provide the supporting information to PayPal to defend themselves only when the `dispute_life_cycle_stage`
     * is `CHARGEBACK`, `PRE_ARBITRATION`, or `ARBITRATION`. They can provide a note that describes their part with
     * details or upload any supporting documents to support their side. The following rules apply to document file
     * types and sizes:<ul><li>The party can upload up to 10 MB of files for a case.</li><li>Individual files must be
     * smaller than 5 MB.</li><li>The supported file formats are JPG, GIF, PNG, and PDF.</li></ul><br/>To make this
     * request, specify the dispute ID in the URI and specify the notes in the JSON request body. This method differs
     * from the provide evidence method which supports only multipart request, where PayPal asks the concerned party
     * for evidence.
     *
     * @param $disputeId string The ID of the dispute for which to provide the supporting information.
     *
     * @param $provideSupportingInfoRequest mixed
     *
     * @param $supportingDocument file A file with evidence.
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function provideSupportingInformationForDispute($disputeId, RequestProvideSupportingInfo $provideSupportingInfoRequest, $supportingDocument): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/provide-supporting-info";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($provideSupportingInfoRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Makes an offer to the other party to resolve a dispute, by ID. To make this call, the stage in the dispute
     * lifecycle must be `INQUIRY`. If the customer accepts the offer, PayPal automatically makes a refund.
     *
     * @param $disputeId string The ID of the dispute for which to make an offer.
     *
     * @param $makeOfferRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function makeOfferToResolveDispute($disputeId, RequestMakeOffer $makeOfferRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/make-offer";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($makeOfferRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * Provides evidence for a dispute, by ID. A merchant can provide evidence for disputes with the
     * <code>WAITING_FOR_SELLER_RESPONSE</code> status while customers can provide evidence for disputes with the
     * <code>WAITING_FOR_BUYER_RESPONSE</code> status. Evidence can be a proof of delivery or proof of refund
     * document or notes, which can include logs. A proof of delivery document includes a tracking number while a
     * proof of refund document includes a refund ID. The following rules apply to document file types and
     * sizes:<ul><li>The merchant can upload up to 50 MB of files for a case.</li><li>Individual files must be
     * smaller than 10 MB.</li><li>The supported file formats are JPG, GIF, PNG, and PDF.</li></ul><br/>To make this
     * request, specify the dispute ID in the URI and specify the evidence in the JSON request body. For information
     * about dispute reasons, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * @param $disputeId string The ID of the dispute for which to submit evidence.
     *
     * @param $evidence mixed
     *
     * @param $evidence file A file with evidence.
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function provideEvidence($disputeId, $evidence): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/provide-evidence";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($evidence, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }

    /**
     * The customer accepts the offer from merchant to resolve a dispute, by ID. PayPal automatically refunds the
     * amount proposed by merchant to the customer.
     *
     * @param $disputeId string The ID of the dispute for which to accept an offer.
     *
     * @param $acceptOfferRequest mixed
     *
     * @throws ApiException
     * @return ResponseSubsequentAction
     */
    public function acceptOfferToResolveDispute($disputeId, RequestAcceptOffer $acceptOfferRequest): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/accept-offer";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($acceptOfferRequest, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }
}
