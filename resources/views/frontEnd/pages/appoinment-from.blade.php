<x-frontend-layout>
@section('title', 'Home')
@push('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        :root {
            --primary-color: #52306d;
            --secondary-color: #6f42c1;
            --accent-color: #ffd700;
            --light-bg: #f8f9fa;
        }

        body {
            background-color: #f5f7f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .rental-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .form-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-bg);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .required-label::after {
            content: " *";
            color: #dc3545;
        }

        .file-upload-container {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            background-color: var(--light-bg);
        }

        .file-upload-container:hover {
            border-color: var(--primary-color);
            background-color: rgba(82, 48, 109, 0.05);
        }

        .payment-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid var(--accent-color);
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            font-weight: 600;
            border-bottom: 3px solid var(--primary-color);
        }

        .progress-bar {
            background-color: var(--primary-color);
        }

        .document-list {
            list-style: none;
            padding-left: 0;
        }

        .document-list li:before {
            content: "•";
            color: var(--primary-color);
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .step-indicator:before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #dee2e6;
            z-index: 1;
        }

        .step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 30%;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #dee2e6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
        }

        .step.active .step-number {
            background-color: var(--primary-color);
        }

        .step.completed .step-number {
            background-color: #28a745;
        }

        .step-label {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .step.active .step-label {
            color: var(--primary-color);
            font-weight: 500;
        }
    </style>
@endpush

@section('breadcrumb')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="margin-top: 85px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Appointment</h2>
                    <span class="ipn-subtitle">Let's Find You Together The Place You Deserve</span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')

    <section class="bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Progress Indicator -->
                    <div class="step-indicator">
                        <div class="step active">
                            <div class="step-number">1</div>
                            <div class="step-label">Personal Info</div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-label">Details & Documents</div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-label">Payment</div>
                        </div>
                    </div>

                    <form action="{{ route('page.appointment.submit') }}" method="POST" class="form-submit" id="rentalApplicationForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Step 1: Personal Information -->
                        <div class="form-step" id="step1">
                            <div class="rental-header text-center">
                                <img src="https://rentnowusa.us/wp-content/uploads/2024/10/Housing-Rental-USA-1-1.png" alt="Logo" class="img-fluid mb-3" style="max-width: 150px;">
                                <h1 class="h2 mb-2">Welcome!</h1>
                                <p class="mb-0">
                                    <strong>You are applying to rent:</strong><br>
                                    1. Each resident over the age of 18 must submit a separate rental application.<br>
                                    2. In addition to this rental application, you will also be required to provide a copy of a valid form of identification and proof of income.
                                </p>
                            </div>

                            <div class="form-section">
                                <h3 class="form-title">Personal Information</h3>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="moveInDate" class="form-label required-label">Desired Move-in Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            <input type="text" class="form-control datepicker" id="moveInDate" placeholder="DD/MM/YYYY">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label required-label">Application Type</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="applicationType" id="tenantType" value="tenant" checked>
                                                <label class="form-check-label" for="tenantType">
                                                    I am applying as a tenant. (I will be living on the property.)
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="applicationType" id="guarantorType" value="guarantor">
                                                <label class="form-check-label" for="guarantorType">
                                                    I am applying as a guarantor/co-signer for another applicant. (I will not be living on the property.)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="fullName" class="form-label required-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="Your full name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label required-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" placeholder="E.g. john@doe.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label required-label">Phone/Mobile</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Your phone number">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="rental-header text-center py-3">
                                    <h3 class="h4 mb-0">Address Info</h3>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="currentAddress" class="form-label required-label">Current Address</label>
                                        <input type="text" class="form-control" id="currentAddress" placeholder="Your current address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="city" class="form-label required-label">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="City">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state" class="form-label required-label">State/Province</label>
                                        <input type="text" class="form-control" id="state" placeholder="State/Province">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="zipCode" class="form-label required-label">ZIP / Postal</label>
                                        <input type="text" class="form-control" id="zipCode" placeholder="ZIP / Postal">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="country" class="form-label required-label">Country</label>
                                        <select class="form-select" id="country">
                                            <option value="">Select country</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <!-- Other countries would be listed here -->
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="citizenship" class="form-label required-label">Are You US Citizenship?</label>
                                        <select class="form-select" id="citizenship">
                                            <option value="">Please Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <div></div> <!-- Empty div for spacing -->
                                <button type="button" class="btn btn-primary btn-next" data-next="step2">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Additional Details & Documents -->
                        <div class="form-step d-none" id="step2">
                            <div class="form-section">
                                <h3 class="form-title">Additional Details</h3>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label required-label">Date Of Birth</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            <input type="text" class="form-control datepicker" id="dob" placeholder="DD/MM/YYYY">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="monthlyIncome" class="form-label required-label">Monthly Income</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" id="monthlyIncome" placeholder="Monthly income">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="governmentId" class="form-label">Government Issued ID</label>
                                        <input type="text" class="form-control" id="governmentId" placeholder="Government ID">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="issuingState" class="form-label required-label">Issuing State/Territory</label>
                                        <input type="text" class="form-control" id="issuingState" placeholder="State">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label for="ssn" class="form-label required-label">Social Security Number (or ITIN)</label>
                                        <input type="text" class="form-control" id="ssn" placeholder="SSN or ITIN">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="document-upload-container p-4 rounded">
                                    <h3 class="text-center mb-4">Attach Required Documents</h3>

                                    <div class="alert alert-info">
                                        <p class="mb-2"><strong>Please ensure your ID meets these requirements:</strong></p>
                                        <ul class="mb-0 ps-3">
                                            <li>Full name and date of birth must be visible</li>
                                            <li>Document must not be expired</li>
                                            <li>Document must not be blurry</li>
                                            <li>Entire ID must be shown (not cropped or covered)</li>
                                            <li>Only government-issued ID accepted (passport, driver's license, national ID)</li>
                                        </ul>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6 col-lg-3 mb-3">
                                            <div class="file-upload-container">
                                                <i class="fas fa-id-card fa-2x mb-2 text-primary"></i>
                                                <h6>Photo ID Front Side</h6>
                                                <input type="file" class="d-none" id="idFront">
                                                <label for="idFront" class="btn btn-sm btn-outline-primary mt-2">Choose File</label>
                                                <div class="small text-muted mt-1">No file chosen</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-3 mb-3">
                                            <div class="file-upload-container">
                                                <i class="fas fa-id-card fa-2x mb-2 text-primary"></i>
                                                <h6>Photo ID Back Side</h6>
                                                <input type="file" class="d-none" id="idBack">
                                                <label for="idBack" class="btn btn-sm btn-outline-primary mt-2">Choose File</label>
                                                <div class="small text-muted mt-1">No file chosen</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-3 mb-3">
                                            <div class="file-upload-container">
                                                <i class="fas fa-user fa-2x mb-2 text-primary"></i>
                                                <h6>Your Clear Selfie</h6>
                                                <input type="file" class="d-none" id="selfie">
                                                <label for="selfie" class="btn btn-sm btn-outline-primary mt-2">Choose File</label>
                                                <div class="small text-muted mt-1">No file chosen</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-3 mb-3">
                                            <div class="file-upload-container">
                                                <i class="fas fa-file-invoice-dollar fa-2x mb-2 text-primary"></i>
                                                <h6>Proof of Income</h6>
                                                <input type="file" class="d-none" id="incomeProof">
                                                <label for="incomeProof" class="btn btn-sm btn-outline-primary mt-2">Choose File</label>
                                                <div class="small text-muted mt-1">No file chosen</div>
                                                <div class="small text-muted">Recent pay stubs, bank statements, or tax returns</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary btn-prev" data-prev="step1">
                                    <i class="fas fa-arrow-left me-2"></i> Previous
                                </button>
                                <button type="button" class="btn btn-primary btn-next" data-next="step3">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Payment -->
                        <div class="form-step d-none" id="step3">
                            <div class="form-section payment-section">
                                <h3 class="form-title">Application Fee Payment</h3>

                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body text-center p-4">
                                                <h4 class="card-title mb-4">Application Fee: <span class="text-primary">$99</span></h4>

                                                <div class="mb-4">
                                                    <img src="https://rentnowusa.us/wp-content/uploads/2025/06/chime.png" alt="Chime" class="img-fluid mb-3" style="max-width: 200px;">
                                                    <div class="mt-3">
                                                        <img src="https://rentnowusa.us/wp-content/uploads/2025/07/WhatsApp-Image-2025-07-02-at-7.40.11-PM.jpeg" alt="QR Code" class="img-fluid mb-2" style="max-width: 150px;">
                                                        <p class="small text-muted">Scan QR to Pay</p>
                                                    </div>
                                                </div>

                                                <p class="card-text">
                                                    The application fee of <strong>$99</strong> must be paid before your visit.
                                                    This amount is <span class="text-success fw-bold">fully refundable</span>.
                                                </p>

                                                <p class="card-text mt-3">
                                                    Contact us: <a href="mailto:support@rentnowusa.us" class="text-decoration-none">support@rentnowusa.us</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-8 mx-auto">
                                        <div class="file-upload-container">
                                            <i class="fas fa-receipt fa-2x mb-2 text-primary"></i>
                                            <h5>Upload Payment Confirmation</h5>
                                            <p class="small text-muted">Please upload a screenshot of your payment confirmation</p>
                                            <input type="file" class="d-none" id="paymentProof">
                                            <label for="paymentProof" class="btn btn-outline-primary mt-2">Choose File</label>
                                            <div class="small text-muted mt-1">No file chosen</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary btn-prev" data-prev="step2">
                                    <i class="fas fa-arrow-left me-2"></i> Previous
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Submit Application <i class="fas fa-check ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap Datepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                // Initialize datepicker
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true
                });

                // Form navigation
                $('.btn-next').click(function() {
                    const nextStep = $(this).data('next');
                    $('.form-step').addClass('d-none');
                    $('#' + nextStep).removeClass('d-none');

                    // Update progress indicator
                    $('.step').removeClass('active completed');
                    $(this).closest('.form-step').find('.btn-next').data('next');

                    if (nextStep === 'step2') {
                        $('.step:eq(0)').addClass('completed');
                        $('.step:eq(1)').addClass('active');
                    } else if (nextStep === 'step3') {
                        $('.step:eq(0)').addClass('completed');
                        $('.step:eq(1)').addClass('completed');
                        $('.step:eq(2)').addClass('active');
                    }
                });

                $('.btn-prev').click(function() {
                    const prevStep = $(this).data('prev');
                    $('.form-step').addClass('d-none');
                    $('#' + prevStep).removeClass('d-none');

                    // Update progress indicator
                    $('.step').removeClass('active completed');

                    if (prevStep === 'step1') {
                        $('.step:eq(0)').addClass('active');
                    } else if (prevStep === 'step2') {
                        $('.step:eq(0)').addClass('completed');
                        $('.step:eq(1)').addClass('active');
                    }
                });

                // File input change handler
                $('input[type="file"]').change(function() {
                    const fileName = $(this).val().split('\\').pop();
                    $(this).siblings('.small').text(fileName || 'No file chosen');
                });

                // Form submission
                $('#rentalApplicationForm').submit(function(e) {
                    e.preventDefault();
                    alert('Application submitted successfully!');
                    // Here you would typically send the form data to your server
                });
            });
        </script>
    @endpush
@endsection
</x-frontend-layout>
