$(document).ready(function(){
    $('#mobile-btn').on('click', function() {
        $('#mobile-menu').toggleClass('active');
        $('#mobile-btn').find('i').toggleClass('fa-x');
    });
    const sections = $('section');
    const navItems = $('.nav-item');

    $(window).on('scroll', function () {
        const header = $('header');
        const scrollPosition = $(window).scrollTop() - header.outerHeight();

        let activeSectionIndex = 0;


        sections.each(function(i) {
            const section = $(this);
            const sectionTop = section.offset().top - 136;
            const sectionBottom = sectionTop+ section.outerHeight();

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                activeSectionIndex = i;
                return false;
            }
        })

        navItems.removeClass('active');
        $(navItems[activeSectionIndex]).addClass('active');
    });
    ScrollReveal().reveal('#cta', {
        origin: 'bottom',
        duration: 1000,
        distance: '20%'
    });

    ScrollReveal().reveal('.dish', {
        origin: 'bottom',
        duration: 1000,
        distance: '20%'
    });

    ScrollReveal().reveal('#testimonial-chef', {
        origin: 'bottom',
        duration: 1000,
        distance: '20%'
    })

    ScrollReveal().reveal('.feedback', {
        origin: 'bottom',
        duration: 1000,
        distance: '20%'
    })
});

