<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice #INV-2025-001 - GreenGrow Compost</title>
    <!-- Favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="/assets/images/favicon_io/apple-touch-icon.png" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="/assets/images/favicon_io/favicon-32x32.png" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="/assets/images/favicon_io/favicon-16x16.png" />
    <link rel="manifest" href="/assets/images/favicon_io/site.webmanifest" />
    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap"
        rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <div class="container my-5">
        <!-- Invoice Header -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-4">
                            <i class="fas fa-leaf text-success fs-2 me-2"></i>
                            <h2 class="mb-0">GreenGrow</h2>
                        </div>
                        <address>
                            GreenGrow Compost<br />
                            123 Green Street<br />
                            Colombo 05, Sri Lanka<br />
                            Phone: +94 11 234 5678<br />
                            Email: sales@greengrow.lk
                        </address>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h1 class="text-success mb-2">INVOICE</h1>
                        <p class="mb-2"><strong>Invoice No:</strong> #INV-2025-001</p>
                        <p class="mb-2"><strong>Order No:</strong> #ORD-2025-001</p>
                        <p class="mb-2"><strong>Date:</strong> June 15, 2025</p>
                        <p class="mb-2">
                            <strong>Payment Method:</strong> Cash on Delivery
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-success mb-3">Bill To:</h5>
                        <address>
                            <strong>John Doe</strong><br />
                            123 Green Street<br />
                            Colombo 05<br />
                            Western Province<br />
                            Sri Lanka<br />
                            Phone: +94 77 123 4567
                        </address>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5 class="text-success mb-3">Ship To:</h5>
                        <address>
                            <strong>John Doe</strong><br />
                            123 Green Street<br />
                            Colombo 05<br />
                            Western Province<br />
                            Sri Lanka<br />
                            Phone: +94 77 123 4567
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Description</th>
                                <th>Size</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Unit Price</th>
                                <th class="text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Premium Garden Compost</strong><br />
                                    <small class="text-muted">#PRD001</small>
                                </td>
                                <td>25kg</td>
                                <td class="text-center">2</td>
                                <td class="text-end">Rs. 1,200</td>
                                <td class="text-end">Rs. 2,400</td>
                            </tr>
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="4" class="text-end">
                                    <strong>Subtotal:</strong>
                                </td>
                                <td class="text-end">Rs. 2,400</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end">
                                    <strong>Delivery Fee:</strong>
                                </td>
                                <td class="text-end">Rs. 0</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                <td class="text-end"><strong>Rs. 2,400</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Notes -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="text-success mb-3">Notes</h5>
                <p class="mb-0">
                    Thank you for your business! We appreciate your trust in our
                    products.
                </p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-3 justify-content-center">
            <a href="order-details.html" class="btn btn-outline-success">
                <i class="fas fa-arrow-left me-2"></i>Back to Order
            </a>
            <button onclick="window.print()" class="btn btn-success">
                <i class="fas fa-print me-2"></i>Print Invoice
            </button>
        </div>
    </div>

    <!-- Print Styles -->
    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 0;
        }

        body {
            margin: 1cm;
        }

        .btn {
            display: none;
        }
    </style>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>