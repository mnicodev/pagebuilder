<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLWj0R3x\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLWj0R3x/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLWj0R3x.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLWj0R3x\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerLWj0R3x\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'LWj0R3x',
    'container.build_id' => 'fa7815ee',
    'container.build_time' => 1573202964,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLWj0R3x');
