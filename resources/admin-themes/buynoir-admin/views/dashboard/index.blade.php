@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.dashboard.title') }}
@stop

@section('content-wrapper')

    <div class="row align-items-center gap-4">
        <div class="col">
            <h4 class="fw-bold m-0">{{ __('admin::app.dashboard.title') }}</h4>
        </div>
        <div class="col-auto">
            <date-filter></date-filter>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 text-white pt-4">
        <div class="col">
            <div class="rounded-3 p-3 h-100" style="background-color: #A1D9E8">
                <p class="fw-bold mb-3 text-uppercase">{{ __('admin::app.dashboard.total-customers') }}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/TOTAL CUSTOMERS.svg') }}" alt="Customers">
                    <h4 class="m-0 fw-bold">{{ $statistics['total_customers']['current'] }}</h4>
                </div>
                <p class="m-0 fw-light small">
                    @if ($statistics['total_customers']['progress'] < 0)
                        {{ __('admin::app.dashboard.decreased', [ 'progress' => -number_format($statistics['total_customers']['progress'], 1) ]) }}
                    @else
                        {{ __('admin::app.dashboard.increased', [ 'progress' => number_format($statistics['total_customers']['progress'], 1) ]) }}
                    @endif
                </p>
            </div>
        </div>
        <div class="col">
            <div class="rounded-3 p-3 h-100" style="background-color: #B9DCD5">
                <p class="fw-bold mb-3 text-uppercase">{{ __('admin::app.dashboard.total-orders') }}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/TOTAL ORDERS.svg') }}" alt="Orders">
                    <h4 class="m-0 fw-bold">{{ $statistics['total_orders']['current'] }}</h4>
                </div>
                <p class="m-0 fw-light small">
                    @if ($statistics['total_orders']['progress'] < 0)
                        {{ __('admin::app.dashboard.decreased', [ 'progress' => -number_format($statistics['total_orders']['progress'], 1) ]) }}
                    @else
                        {{ __('admin::app.dashboard.increased', [ 'progress' => number_format($statistics['total_orders']['progress'], 1) ]) }}
                    @endif
                </p>
            </div>
        </div>
        <div class="col">
            <div class="rounded-3 p-3 h-100" style="background-color: #F9BFCE">
                <p class="fw-bold mb-3 text-uppercase">{{ __('admin::app.dashboard.total-sale') }}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/TOTAL SALE.svg') }}" alt="Sale">
                    <h4 class="m-0 fw-bold">{{ core()->formatBasePrice($statistics['total_sales']['current']) }}</h4>
                </div>
                <p class="m-0 fw-light small">
                    @if ($statistics['total_sales']['progress'] < 0)
                        {{ __('admin::app.dashboard.decreased', [ 'progress' => -number_format($statistics['total_sales']['progress'], 1) ]) }}
                    @else
                        {{ __('admin::app.dashboard.increased', [ 'progress' => number_format($statistics['total_sales']['progress'], 1) ]) }}
                    @endif
                </p>
            </div>
        </div>
        <div class="col">
            <div class="rounded-3 p-3 h-100" style="background-color: #EBD290">
                <p class="fw-bold mb-3 text-uppercase">{{ __('admin::app.dashboard.average-sale') }}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/AVERAGE ORDER SALE.svg') }}" alt="Average Order Sale">
                    <h4 class="m-0 fw-bold">{{ core()->formatBasePrice($statistics['avg_sales']['current']) }}</h4>
                </div>
                <p class="m-0 fw-light small">
                    @if ($statistics['avg_sales']['progress'] < 0)
                        {{ __('admin::app.dashboard.decreased', [ 'progress' => -number_format($statistics['avg_sales']['progress'], 1) ]) }}
                    @else
                        {{ __('admin::app.dashboard.increased', [ 'progress' => number_format($statistics['avg_sales']['progress'], 1) ]) }}
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-0">
        <div class="col-lg-9">
            <div class="bg-white rounded-3 p-4 h-100">
                <p class="m-0 fw-bold border-bottom pb-2 text-uppercase small">{{ __('admin::app.dashboard.sales') }}</p>

                @if (!array_filter($statistics['sale_graph']['total']))
                    <!-- No Data -->
                    <div class="text-center">
                        <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/SALES_GR.svg') }}" alt="No data available!" class="mb-3 mt-4">
                        <h6 class="fw-bold">{{ __('admin::app.common.start-building-dashboard') }}</h6>
                        <p class="fw-light mb-2">{{ __('admin::app.common.no-data-suggation') }}</p>
                        <a href="#" class="btn btn-secondary btn-sm rounded-3">{{ __('admin::app.common.add-data') }}</a>
                    </div>
                @else
                    <canvas id="sales_graph" class="mt-4"></canvas>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="bg-white rounded-3 p-4 h-100">
                <p class="m-0 fw-bold border-bottom pb-2 text-uppercase small">{{ __('admin::app.dashboard.top-performing-categories') }}</p>
                @if (! count($statistics['top_selling_categories']))
                    <!-- No Data -->
                    <div class="text-center">
                        <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/TOP PERFORMING CATEGORIES_GR.svg') }}" alt="No data available!" class="mb-3 mt-4">
                        <h6 class="fw-bold">{{ __('admin::app.common.no-data-avaibale') }}</h6>
                        <p class="fw-light mb-2">{{ __('admin::app.common.no-data-suggation') }}</p>
                        <a href="#" class="btn btn-secondary btn-sm rounded-3">{{ __('admin::app.common.add-category') }}</a>
                    </div>
                @endif


                @foreach ($statistics['top_selling_categories'] as $item)
                    <!-- Data -->
                    <div class="row justify-content-between g-1 mt-2">
                        <div class="col-auto">{{ $item->name }}</div>
                        <div class="col-auto">{{ __('admin::app.dashboard.sale-count', ['count' => $item->total_qty_invoiced]) }}</div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%; background-color: #FF5067"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <div class="row g-4 mt-0">
        <div class="col-lg-9">
            <div class="row g-4 h-100">
                <div class="col-lg-6">
                    <div class="bg-white rounded-3 p-4 h-100">
                        <p class="m-0 fw-bold border-bottom mb-3 pb-2 text-uppercase small">{{ __('admin::app.dashboard.top-selling-products') }}</p>


                        @if (! count($statistics['top_selling_products']))
                            <!-- No Data -->
                            <div class="text-center">
                                <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/TOP SELLING PRODUCTS_GR.svg') }}" alt="No data available!" class="mb-3 mt-4">
                                <h6 class="fw-bold">{{ __('admin::app.common.no-data-avaibale') }}</h6>
                                <p class="fw-light mb-2">{{ __('admin::app.common.no-data-suggation') }}</p>
                                <a href="#" class="btn btn-secondary btn-sm rounded-3">{{ __('admin::app.common.add-data') }}</a>
                            </div>

                        @endif

                        @foreach ($statistics['top_selling_products'] as $item)
                            
                            <?php $productBaseImage = $productImageHelper->getProductBaseImage($item->product); ?>

                            <div class="position-relative mb-2 border-bottom pb-2">
                                <div class="row gx-3 align-items-center">
                                    <div class="col-auto">
                                        <a href="{{ route('admin.catalog.products.edit', $item->product_id) }}" class="stretched-link border p-1 rounded-2 d-block"><img src="{{ $productBaseImage['small_image_url'] }}" alt=""></a>
                                    </div>
                                    <div class="col">
                                        @if (isset($item->name))
                                            <p class="m-0">{{ $item->name }}</p>
                                        @endif
                                        <p class="m-0 fw-light">{{ __('admin::app.dashboard.sale-count', ['count' => $item->total_qty_invoiced]) }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white rounded-3 p-4 h-100">
                        <p class="m-0 fw-bold border-bottom mb-3 pb-2 text-uppercase small">{{ __('admin::app.dashboard.customer-with-most-sales') }}</p>
                        
                        @if (! count($statistics['customer_with_most_sales']))
                            <!-- No Data -->
                            <div class="text-center">
                                <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/CUSTOMER WITH MOST SALES_GR.svg') }}" alt="No data available!" class="mb-3 mt-4">
                                <h6 class="fw-bold">{{ __('admin::app.common.no-data-avaibale') }}</h6>
                                <p class="fw-light mb-2">{{ __('admin::app.common.no-data-suggation') }}</p>
                                <a href="#" class="btn btn-secondary btn-sm rounded-3">{{ __('admin::app.common.add-data') }}</a>
                            </div>

                        @endif


                        @foreach ($statistics['customer_with_most_sales'] as $item)

                            <!-- Data -->
                            <div class="position-relative mb-2 border-bottom pb-2">
                                <div class="row gx-3 align-items-center">
                                    <div class="col-auto">
                                        <a href="{{ $item->customer_id ? route('admin.customer.edit', $item->customer_id) : '#' }}" class="stretched-link border p-1 rounded-2 d-block"><img src="http://placehold.it/30x30" alt=""></a>
                                    </div>
                                    <div class="col">
                                        <p class="m-0">{{ $item->customer_full_name }}</p>
                                        <p class="m-0 fw-light">{{ __('admin::app.dashboard.order-count', ['count' => $item->total_orders]) }} . {{ __('admin::app.dashboard.revenue', ['total' => core()->formatBasePrice($item->total_base_grand_total)]) }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="bg-white rounded-3 p-4 h-100">
                <p class="m-0 fw-bold border-bottom mb-3 pb-2 text-uppercase small">{{ __('admin::app.dashboard.stock-threshold') }}</p>

                @if (! count($statistics['stock_threshold']))

                    <!-- No Data -->
                    <div class="text-center">
                        <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/img/STOCK THRESHOLD_GR.svg') }}" alt="No data available!" class="mb-3 mt-3">
                        <h6 class="fw-bold">{{ __('admin::app.common.no-data-avaibale') }}</h6>
                        <p class="fw-light mb-2">{{ __('admin::app.common.no-data-suggation') }}</p>
                        <a href="#" class="btn btn-secondary btn-sm rounded-3">{{ __('admin::app.common.add-product') }}</a>
                    </div>

                @endif


                @foreach ($statistics['stock_threshold'] as $item)
                
                    <?php $productBaseImage = $productImageHelper->getProductBaseImage($item->product); ?>
                    <div class="position-relative mb-2 border-bottom pb-2">
                        <div class="row gx-3 align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('admin.catalog.products.edit', $item->product_id) }}" class="stretched-link border p-1 rounded-2 d-block">
                                    <img src="{{ $productBaseImage['small_image_url'] }}" alt="" width="30">
                                </a>
                            </div>
                            <div class="col">
                                @if (isset($item->product->name))
                                    <p class="m-0">{{ $item->product->name }}</p>
                                @endif
                                <p class="m-0 fw-light">{{ __('admin::app.dashboard.qty-left', ['qty' => $item->total_qty]) }}</p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@stop

@push('scripts')

    <script type="text/x-template" id="date-filter-template">
        <div class="d-flex gap-3">
            <date @onChange="applyFilter('start', $event)" hide-remove-button="1" class="input-group" style="width: 180px">
                <input type="text" class="form-control rounded-pill-start" id="start_date" value="{{ $startDate->format('Y-m-d') }}" placeholder="{{ __('admin::app.dashboard.from') }}" v-model="start" ref="from">
                <button @click="showDatePicker('from')" class="btn btn-secondary rounded-pill-end" type="button"><i class="fas fa-calendar-alt"></i></button>
            </date>

            <date @onChange="applyFilter('end', $event)" hide-remove-button="1" class="input-group" style="width: 180px">
                <input type="text" class="form-control rounded-pill-start" id="end_date" value="{{ $endDate->format('Y-m-d') }}" placeholder="{{ __('admin::app.dashboard.to') }}" v-model="end" ref="end">
                <button @click="showDatePicker('end')" class="btn btn-secondary rounded-pill-end" type="button"><i class="fas fa-calendar-alt"></i></button>
            </date>
        </div>
    </script>

    <script>
        Vue.component('date-filter', {

            template: '#date-filter-template',

            data: function() {
                return {
                    start: "{{ $startDate->format('Y-m-d') }}",
                    end: "{{ $endDate->format('Y-m-d') }}",
                }
            },

            methods: {
                applyFilter: function(field, date) {
                    this[field] = date;

                    window.location.href = "?start=" + this.start + '&end=' + this.end;
                },
                showDatePicker(field) {
                    if(field === 'from') {
                        this.$refs.from.focus();
                    } else if(field === 'end') {
                        this.$refs.end.focus();
                    }
                }
            }
        });

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
    <script>
        $(document).ready(function () {
            var ctx = document.getElementById("sales_graph");
            if(typeof(ctx) != 'undefined' && ctx != null) {
                var data = @json($statistics['sale_graph']);
                var myChart = new Chart(ctx.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: data['label'],
                        datasets: [{
                            data: data['total'],
                            backgroundColor: 'rgba(34, 201, 93, 1)',
                            borderColor: 'rgba(34, 201, 93, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                maxBarThickness: 20,
                                gridLines : {
                                    display : false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: 'rgba(162, 162, 162, 1)'
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                },
                                ticks: {
                                    padding: 20,
                                    beginAtZero: true,
                                    fontColor: 'rgba(162, 162, 162, 1)'
                                }
                            }]
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                            displayColors: false,
                            callbacks: {
                                label: function(tooltipItem, dataTemp) {
                                    return data['formated_total'][tooltipItem.index];
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>

@endpush