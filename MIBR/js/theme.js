$(document).ready(function () {


	// Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Masks
	if ($("input[type='tel']").length > 0) {
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
        $("input[type='tel']").attr("autocomplete", "input" + Math.floor(Math.random() * 20) + 1).mask(SPMaskBehavior, spOptions);
    }

    // Modal
    if ($("a[href='#quero-me-inscrever']").length > 0) {
        $("body").on("click", "a[href='#quero-me-inscrever']", function (e) {
            $('#quero-me-inscrever').modal('show');
            if ($(this).data('interest')) {
                var interest = $(this).data('interest');
                interest = interest.replace(/<[^>]*>?/gm, '');
                interest = interest.replace("  ", " ");
                interest = interest.trim();
                if ($('#quero-me-inscrever select[name="interest"]').length) {
                    var field = $('#quero-me-inscrever select[name="interest"]');
                    field.find("option").each(function () {
                        if ($(this).attr('value') == interest) {
                            field.val(interest);
                        }
                    });
                }
            }
            e.preventDefault();
        });
    }
    if (window.location.hash && window.location.hash == '#quero-me-inscrever') {
        $('#quero-me-inscrever').modal('show');
    }

});

// Hide menu on scroll
window.onscroll = function () {
    if ($(window).width() <= 768) {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            $("header#header").addClass("fixed");
        } else {
            $("header#header").removeClass("fixed");
        }
    }
};