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
Breadcrumbs::for('admin.booking_rates.create', function ($trail) {
    $trail->push('Create Booking Rates', route('admin.booking_rates.create'));
});
Breadcrumbs::for('admin.booking_rates.edit', function ($trail) {
    $trail->push('Edit Booking Rates', route('admin.booking_rates.edit',1));
});


Breadcrumbs::for('admin.passengers.index', function ($trail) {
    $trail->push('Passengers', route('admin.passengers.index'));
});

Breadcrumbs::for('admin.tour_booking.index', function ($trail) {
    $trail->push('Tour Booking', route('admin.tour_booking.index'));
});
Breadcrumbs::for('admin.tour_booking.edit', function ($trail) {
    $trail->push('Tour Booking Approval', route('admin.tour_booking.edit',1));
});
