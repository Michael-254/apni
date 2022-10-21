<?php
    $socials = getSocials();
    if (!empty($socials) and count($socials)) {
        $socials = collect($socials)->sortBy('order')->toArray();
    }

    $footerColumns = getFooterColumns();
?>

<footer class="footer bg-secondary position-relative user-select-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" footer-subscribe d-block d-md-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        <strong><?php echo e(trans('footer.join_us_today')); ?></strong>
                        <span class="d-block mt-5 text-white"><?php echo e(trans('footer.subscribe_content')); ?></span>
                    </div>
                    <div class="subscribe-input bg-white p-10 flex-grow-1 mt-30 mt-md-0">
                        <form action="/newsletters" method="post">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group d-flex align-items-center m-0">
                                <div class="w-100">
                                    <input type="text" name="newsletter_email" class="form-control border-0 <?php $__errorArgs = ['newsletter_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('footer.enter_email_here')); ?>"/>
                                    <?php $__errorArgs = ['newsletter_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill"><?php echo e(trans('footer.join')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $columns = ['first_column','second_column','third_column'];
    ?>

    <div class="container">
        
        <div class="row">
            <div class="col-6 col-md-4">
                <span class="header d-block text-white font-weight-bold"><?php if(!empty($generalSettings['site_name'])): ?> <?php echo e(strtoupper($generalSettings['site_name'])); ?> <?php else: ?> Platform Title <?php endif; ?></span>
                <div class="mt-20">
                    <p class="text-white">APNI LMS is a fully-featured learning management system that helps you to run your education business in several hours. This platform helps instructors to create professional education materials and helps students to learn from the best instructors.</p>
                </div>
                <div class="footer-social mt-20">
                    <?php if(!empty($socials) and count($socials)): ?>
                        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social['link']); ?>">
                                <img src="<?php echo e($social['image']); ?>" alt="<?php echo e($social['title']); ?>" class="mr-15">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <span class="header d-block text-white font-weight-bold">Our Pages</span>
                <div class="mt-20">
                    <p><a class="text-white" href="/login">- Login</a></p>
                    <p><a class="text-white" href="/register">- Register</a><br></p>
                    <p><a class="text-white" href="/blog">- Blog</a></p>
                    <p><a class="text-white" href="/contact">- Contact us</a></p>
                    <p><a class="text-white" href="/certificate_validation">- Certificate validation</a><br></p>
                    <p><a class="text-white" href="/become-instructor">- Become instructor</a><br></p>
                    <p><a class="text-white" href="/pages/terms">- Terms &amp; Conditions</a></p>
                    <p><a class="text-white" href="/pages/about">- About us</a><br></p>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <span class="header d-block text-white font-weight-bold">Contact Us</span>
                <div class="mt-20">
                    <p class="text-white mt-10"><i class="fa fa-map-marker"></i> <a href="https://maps.google.com/" class="text-white" target="_blank"> Location</a></p>
                    <p class="text-white mt-10"><i class="fa fa-phone"></i> <a href="tel:+254722000000" class="text-white" target="_blank"> +254 722 000000</a></p>
                    <p class="text-white mt-10"><i class="fa fa-envelope"></i> <a href="mailto:example@domain.com" class="text-white" target="_blank"> example@domain.com</a></p>
                </div>
            </div>
        </div>

        <div class="row mt-40 border-blue py-25 d-flex align-items-center justify-content-between">
            <div class="col-12 col-md-6 text-white text-left">
                <p>&copy; <?php if(!empty($generalSettings['site_name'])): ?> <?php echo e(strtoupper($generalSettings['site_name'])); ?> <?php else: ?> Platform Title <?php endif; ?> <?php echo e(\Carbon\Carbon::now()->format('Y')); ?>. All rights reserved.</p>
            </div>
            <div class="col-12 col-md-6 text-white text-right">
                <a href="/pages/terms" class="text-white">Privacy Policy</a> - 
                <a href="/pages/terms" class="text-white">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>

<?php /**PATH D:\laravel projects\LMS\resources\views/web/default/includes/footer.blade.php ENDPATH**/ ?>