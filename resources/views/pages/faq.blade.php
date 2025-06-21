@extends('layouts.app')

@section('title', 'Frequently Asked Questions - GreenGrow Compost')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-success mb-4">Frequently Asked Questions</h1>

    <div class="accordion" id="faqAccordion">
        <!-- Product Questions -->
        <div class="mb-4">
            <h2 class="h4 mb-3">Product Information</h2>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        What makes your compost organic?
                    </button>
                </h3>
                <div id="faq1" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        Our compost is made from 100% organic materials, including plant waste, food scraps, and natural yard trimmings. We use no synthetic chemicals or additives in our composting process.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        How should I store the compost?
                    </button>
                </h3>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Store the compost in a cool, dry place. Keep the bag sealed when not in use to maintain moisture levels. Avoid storing in direct sunlight.
                    </div>
                </div>
            </div>
        </div>

        <!-- Shipping Questions -->
        <div class="mb-4">
            <h2 class="h4 mb-3">Shipping & Delivery</h2>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        How long does shipping take?
                    </button>
                </h3>
                <div id="faq3" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Standard shipping typically takes 3-5 business days. Express shipping options are available for 1-2 business day delivery in select areas.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        Do you ship internationally?
                    </button>
                </h3>
                <div id="faq4" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Currently, we only ship within the United States. We're working on expanding our shipping capabilities to serve international customers in the future.
                    </div>
                </div>
            </div>
        </div>

        <!-- Returns & Refunds -->
        <div class="mb-4">
            <h2 class="h4 mb-3">Returns & Refunds</h2>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        What is your return policy?
                    </button>
                </h3>
                <div id="faq5" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        We accept returns within 30 days of purchase for unopened products. Please contact our customer service team to initiate a return.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                        How long do refunds take?
                    </button>
                </h3>
                <div id="faq6" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Once we receive your return, refunds typically process within 3-5 business days. The time it takes for the refund to appear in your account depends on your payment method and financial institution.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection