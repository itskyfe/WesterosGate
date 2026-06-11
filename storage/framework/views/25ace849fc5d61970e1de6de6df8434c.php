<?php if($paginator->hasPages()): ?>
<nav class="pagination-nav">
    
    <?php if($paginator->onFirstPage()): ?>
        <span class="page-btn disabled">&#8592;</span>
    <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="page-btn">&#8592;</a>
    <?php endif; ?>

    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <span class="page-btn dots"><?php echo e($element); ?></span>
        <?php endif; ?>
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <span class="page-btn active"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>" class="page-btn"><?php echo e($page); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="page-btn">&#8594;</a>
    <?php else: ?>
        <span class="page-btn disabled">&#8594;</span>
    <?php endif; ?>
</nav>
<?php endif; ?>
<?php /**PATH C:\Users\kipe\Downloads\westerosgate_simple\westerosgate\resources\views/pagination.blade.php ENDPATH**/ ?>