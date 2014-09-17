/* Send a request to add the view count */
jQuery.post( bzineAjax.ajaxurl,
{
	action : 'mtc-counter-view',
	postID : bzineAjax.postID
});