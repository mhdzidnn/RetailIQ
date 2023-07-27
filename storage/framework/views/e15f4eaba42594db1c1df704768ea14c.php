<?php $__env->startSection('container'); ?>
    <section id="finance" class="finance">
        <div class="container">
            <div class="section-title mt-5">
                <h1>Analisis Penjualan Anda</h1>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3 pengeluaran">
                        <div class="card-body">
                            <div class="card-header">Total Pengeluaran</div>
                            <div class="card-body">
                                <h4 class="card-title">Rp<?php echo e(number_format($totalPengeluaran, 0, ',', '.')); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3 pemasukan">
                        <div class="card-body">
                            <div class="card-header">Total Pemasukan</div>
                            <div class="card-body">
                                <h4 class="card-title">Rp<?php echo e(number_format($totalPemasukan, 0, ',', '.')); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3 keuntungan">
                        <div class="card-body">
                            <div class="card-header">Total Keuntungan</div>
                            <div class="card-body">
                                <?php if($totalKeuntungan >= 0): ?>
                                    <h4 class="card-title">Rp<?php echo e(number_format($totalKeuntungan, 0, ',', '.')); ?></h4>
                                <?php else: ?>
                                    <h4 class="card-title">-Rp<?php echo e(number_format(-$totalKeuntungan, 0, ',', '.')); ?></h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card keuntungan mt-5">
                                        <div class="card-header">Pie Chart Keuangan</div>
                                        <div class="card-body" style="height: 300px">
                                            <canvas id="chart-pie" class="chartjs-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-pie").getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Total Pengeluaran", "Total Pemasukan", "Total Keuntungan"],
                datasets: [{
                    data: [
                        <?php echo e($totalPengeluaran); ?>,
                        <?php echo e($totalPemasukan); ?>,
                        <?php echo e($totalKeuntungan); ?>

                    ],
                    backgroundColor: [
                        "rgba(255, 0, 0, 0.5)",
                        "rgba(100, 255, 0, 0.5)",
                        "rgba(200, 50, 255, 0.5)"
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Finance Overview'
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\RetailIQ\resources\views/finance.blade.php ENDPATH**/ ?>