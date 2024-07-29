<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="partials/Stats.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5" data-aos="zoom-in">
        <div class="row">
            <div id="statistics" class="col-lg-12 mx-auto mb-5 text-brown text-center">
                <h1 class="display-4" style="color: brown; font-weight:bold;">Our Statistics</h1>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="bg-white rounded-lg p-5 shadow">
                    <h2 class="h6 font-weight-bold text-center mb-4">Read Time</h2>

                    <!-- Progress bar 1 -->
                    <div class="progress mx-auto" data-value='80'>
                        <span class="progress-left">
                            <span class="progress-bar border-primary"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar border-primary"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">80<sup class="small">%</sup></div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Demo info -->
                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
                        </div>
                    </div>
                    <!-- END -->
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="bg-white rounded-lg p-5 shadow">
                    <h2 class="h6 font-weight-bold text-center mb-4">Books Delivered</h2>


                    <div class="progress mx-auto" data-value='70'>
                        <span class="progress-left">
                            <span class="progress-bar border-danger"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar border-danger"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">70<sup class="small">%</sup></div>
                        </div>
                    </div>

                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
                        </div>
                    </div>
                    <!-- END -->
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="bg-white rounded-lg p-5 shadow">
                    <h2 class="h6 font-weight-bold text-center mb-4">Books Collection</h2>


                    <div class="progress mx-auto" data-value='76'>
                        <span class="progress-left">
                            <span class="progress-bar border-success"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar border-success"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">76<sup class="small">%</sup></div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Demo info -->
                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
                        </div>
                    </div>
                    <!-- END -->
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="bg-white rounded-lg p-5 shadow">
                    <h2 class="h6 font-weight-bold text-center mb-4">Books Ordered</h2>


                    <div class="progress mx-auto" data-value='90'>
                        <span class="progress-left">
                            <span class="progress-bar border-warning"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar border-warning"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">90<sup class="small">%</sup></div>
                        </div>
                    </div>

                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
                        </div>
                    </div>
                    <!-- END -->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            $(".progress").each(function() {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

            })

            function percentageToDegrees(percentage) {

                return percentage / 100 * 360

            }

        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>