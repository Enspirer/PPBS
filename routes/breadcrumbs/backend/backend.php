<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.location.index', function ($trail) {
    $trail->push('Location', route('admin.location.index'));
});

Breadcrumbs::for('admin.booking_rates.index', function ($trail) {
    $trail->push('Booking Rates', route('admin.booking_rates.index'));
});
