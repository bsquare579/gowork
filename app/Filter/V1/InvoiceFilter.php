<?php

namespace App\Filter\V1;

use Illuminate\Http\Request;
use App\Filter\ApiFilter;

class InvoiceFilter extends ApiFilter {

    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'status' => ['ne', 'eq'],
        'billedDate' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'paidDate' => ['eq', 'gt', 'lt', 'lte', 'gte']

    ];

    protected $columnMap = [
        'billedDate' => 'billed_date',
        'paidDate' => 'postal_code',
        'paidDate' => 'paid_date',
    ];

    protected $operatorMap = [
        'gt' => '>',
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!=',
    ];
}