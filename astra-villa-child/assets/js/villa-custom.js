/**
 * Villa Galle Fort - Custom Frontend Script
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // 1. Date inputs validation & auto-advancement
        const $checkin = $('#checkin_date, #bar-checkin');
        const $checkout = $('#checkout_date, #bar-checkout');

        if ($checkin.length && $checkout.length) {
            $checkin.on('change', function() {
                const checkinVal = $(this).val();
                if (checkinVal) {
                    const checkinDate = new Date(checkinVal);
                    checkinDate.setDate(checkinDate.getDate() + 1);
                    const minCheckout = checkinDate.toISOString().split('T')[0];
                    $checkout.attr('min', minCheckout);

                    // If checkout is before new min, update it
                    if ($checkout.val() && $checkout.val() <= checkinVal) {
                        $checkout.val(minCheckout);
                    }
                }
            });
        }

        // 2. Pre-populate form fields from URL Query parameters (from Booking Bar)
        const urlParams = new URLSearchParams(window.location.search);
        const qCheckin  = urlParams.get('checkin');
        const qCheckout = urlParams.get('checkout');
        const qRoom     = urlParams.get('room_selection');
        const qGuests   = urlParams.get('guests');

        if (qCheckin && $('#checkin_date').length) {
            $('#checkin_date').val(qCheckin);
        }
        if (qCheckout && $('#checkout_date').length) {
            $('#checkout_date').val(qCheckout);
        }
        if (qGuests && $('#guest_count').length) {
            $('#guest_count').val(qGuests);
        }
        if (qRoom && $('#bar-room').length) {
            $('#bar-room').val(qRoom);
        }

        // 3. Smooth scroll for reservation buttons
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 700);
            }
        });

        // 4. Subtle parallax or sticky shadow effect on scroll
        $(window).on('scroll', function() {
            const $stickyCard = $('.villa-booking-card-sticky');
            if ($(window).scrollTop() > 300) {
                $stickyCard.addClass('is-elevated');
            } else {
                $stickyCard.removeClass('is-elevated');
            }
        });

    });

})(jQuery);
