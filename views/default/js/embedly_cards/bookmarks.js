define(['require', 'jquery', 'embedly_cards/embedly_cards'], function(require, $) {
    
    var $bookmark = $('.bookmark .elgg-heading-basic a');
    
    $bookmark.addClass('bookmark-card');
    
    embedly('card', {selector: 'a.bookmark-card'});
});