

<?php $__env->startPush('styles_top'); ?>
<link rel="stylesheet" href="/assets/default/vendors/chartjs/chart.min.css" />
<link rel="stylesheet" href="/assets/default/vendors/apexcharts/apexcharts.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="">
    <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
        <h1 class="section-title"><?php echo e(trans('panel.dashboard')); ?></h1>

        <?php if(!$authUser->isUser()): ?>
        <div class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
            <label class="mb-0 mr-10 cursor-pointer text-gray font-14 font-weight-500" for="iNotAvailable"><?php echo e(trans('panel.i_not_available')); ?></label>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="disabled" <?php if($authUser->offline): ?> checked <?php endif; ?> class="custom-control-input" id="iNotAvailable">
                <label class="custom-control-label" for="iNotAvailable"></label>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="bg-white dashboard-banner-container position-relative px-15 px-ld-35 py-10 panel-shadow rounded-sm">
        <h2 class="font-30 text-primary line-height-1">
            <span class="d-block"><?php echo e(trans('panel.hi')); ?> <?php echo e($authUser->full_name); ?>,</span>
            <span class="font-16 text-secondary font-weight-bold"><?php echo e(trans('panel.have_event',['count' => !empty($unReadNotifications) ? count($unReadNotifications) : 0])); ?></span>
        </h2>

        <ul class="mt-15 unread-notification-lists">
            <?php if(!empty($unReadNotifications) and !$unReadNotifications->isEmpty()): ?>
            <?php $__currentLoopData = $unReadNotifications->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unReadNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="font-14 mt-1 text-gray">- <?php echo e($unReadNotification->title); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(count($unReadNotifications) > 5): ?>
            <li>&nbsp;&nbsp;...</li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>

        <a href="/panel/notifications" class="mt-15 font-weight-500 text-dark-blue d-inline-block"><?php echo e(trans('panel.view_all_events')); ?></a>

        <div class="dashboard-banner">
            <img src="<?php echo e(getPageBackgroundSettings('dashboard')); ?>" alt="" class="img-cover">
        </div>
    </div>
</section>

<section class="dashboard">
    <div class="row">

        <div class="col-12 col-lg-6 mt-35">
            <a href="/panel/support" class="dashboard-stats rounded-sm panel-shadow p-10 p-md-20 d-flex align-items-center">
                <div class="stat-icon support-messages">
                    <img src="/assets/default/img/icons/support.svg" alt="">
                </div>
                <div class="d-flex flex-column ml-15">
                    <span class="font-30 text-secondary"><?php echo e(!empty($supportsCount) ? $supportsCount : 0); ?></span>
                    <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.support_messages')); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-lg-6 mt-35">
            <a href="<?php if($authUser->isUser()): ?> /panel/webinars/my-comments <?php else: ?> /panel/webinars/comments <?php endif; ?>" class="dashboard-stats rounded-sm panel-shadow p-10 p-md-20 d-flex align-items-center">
                <div class="stat-icon comments">
                    <img src="/assets/default/img/icons/comment.svg" alt="">
                </div>
                <div class="d-flex flex-column ml-15">
                    <span class="font-30 text-secondary"><?php echo e(!empty($commentsCount) ? $commentsCount : 0); ?></span>
                    <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.comments')); ?></span>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 mt-35">
            <div class="bg-white noticeboard rounded-sm panel-shadow py-10 py-md-20 px-15 px-md-30">
                <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('panel.noticeboard')); ?></h3>

                <?php $__currentLoopData = $authUser->getUnreadNoticeboards(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getUnreadNoticeboard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="noticeboard-item py-15">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="js-noticeboard-title font-weight-500 text-secondary"><?php echo truncate($getUnreadNoticeboard->title,150); ?></h4>
                            <div class="font-12 text-gray mt-5">
                                <span class="mr-5"><?php echo e(trans('public.created_by')); ?> <?php echo e($getUnreadNoticeboard->sender); ?></span>
                                |
                                <span class="js-noticeboard-time ml-5"><?php echo e(dateTimeFormat($getUnreadNoticeboard->created_at,'j M Y | H:i')); ?></span>
                            </div>
                        </div>

                        <div>
                            <button type="button" data-id="<?php echo e($getUnreadNoticeboard->id); ?>" class="js-noticeboard-info btn btn-sm btn-border-white"><?php echo e(trans('panel.more_info')); ?></button>
                            <input type="hidden" class="js-noticeboard-message" value="<?php echo e($getUnreadNoticeboard->message); ?>">
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</section>


<div class="d-none" id="iNotAvailableModal">
    <div class="offline-modal">
        <h3 class="section-title after-line"><?php echo e(trans('panel.offline_title')); ?></h3>
        <p class="mt-20 font-16 text-gray"><?php echo e(trans('panel.offline_hint')); ?></p>

        <div class="form-group mt-15">
            <label><?php echo e(trans('panel.offline_message')); ?></label>
            <textarea name="message" rows="4" class="form-control "><?php echo e($authUser->offline_message); ?></textarea>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" class="js-save-offline-toggle btn btn-primary btn-sm"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-10 close-swl btn-sm"><?php echo e(trans('public.close')); ?></button>
        </div>
    </div>
</div>

<div class="d-none" id="noticeboardMessageModal">
    <div class="text-center">
        <h3 class="modal-title font-20 font-weight-500 text-dark-blue"></h3>
        <span class="modal-time d-block font-12 text-gray mt-25"></span>
        <p class="modal-message font-weight-500 text-gray mt-4"></p>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
<script src="/assets/default/vendors/apexcharts/apexcharts.min.js"></script>
<script src="/assets/default/vendors/chartjs/chart.min.js"></script>

<script>
    var offlineSuccess = '<?php echo e(trans('
    panel.offline_success ')); ?>';
    var $chartDataMonths = <?php echo json_encode($monthlyChart['months'], 15, 512) ?>;
    var $chartData = <?php echo json_encode($monthlyChart['data'], 15, 512) ?>;
</script>

<script src="/assets/default/js/panel/dashboard.min.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\LMS\resources\views/web/default/panel/dashboard.blade.php ENDPATH**/ ?>