
$(function () {
    $('.anchor[data-anchor]').on("click", function(e) {
        e.preventDefault();

        let target = $(this).attr("data-anchor");     

        scrollToAnchor(target);
    })
});

function scrollToAnchor(id, duration = 1200) 
{
    let elem   = $(`${id}`)
    let parent = elem.scrollParent();
    let offset = Math.abs(elem.offset().top + parent.scrollTop());

    parent.bind('scroll mousedown DOMMouseScroll mousewheel keyup', function (event) {
         if (event.which > 0 || event.type === 'mousedown' || event.type === 'mousewheel') {
            parent.stop().unbind('scroll mousedown DOMMouseScroll mousewheel keyup');
         }
     });
    
    parent.animate({
        scrollTop: offset
    }, duration);

}

jQuery.fn.scrollParent = function () {
    var position = this.css("position"),
        excludeStaticParent = position === "absolute",
        scrollParent = this.parents().filter(function () {
            var parent = $(this);
            if (excludeStaticParent && parent.css("position") === "static") {
                return false;
            }
            return (/(auto|scroll)/).test(parent.css("overflow") + parent.css("overflow-y") + parent.css("overflow-x"));
        }).eq(0);

    return position === "fixed" || !scrollParent.length ? $(this[0].ownerDocument || document) : scrollParent;
};
