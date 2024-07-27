$(function () {
    $(".js-accordion-title").on("click", function () {
        $(this).closest('#head').next('.accordion-content').slideToggle(300);
        $(this).toggleClass("open", 300);
    });
});
