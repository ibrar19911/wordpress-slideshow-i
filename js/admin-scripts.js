function wpsi_update_order_or_ids_value(){

	var thumbs = jQuery('#thumbs-preview > div');
	var ids_order = [];

	jQuery.each(thumbs, function(index, tag){
		var id = jQuery(tag).attr('data-img-id');
		ids_order.push(id);
	});

	var new_ids_order = ids_order.join(',');

	jQuery('#wpsi_images_ids').val(new_ids_order);

}

jQuery( document ).ready( function( $ ) {

	var frame;
	
	jQuery('#upload_image_button').on('click', function( event ){

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}

		// Create the media frame.
		frame = wp.media.frames.frame = wp.media({
			title: 'Select images to upload',
			button: {
				text: 'Select',
			},
			library: {
		        type: 'image',
		    },
			multiple: 'add'
		});

		frame.on('open',function() {
		    var selection = frame.state().get('selection');
		    var previous_selection = jQuery('#wpsi_images_ids').val();

		    if(previous_selection.length > 0) {
		        var previous_selection_ids = previous_selection.split(',');

		        previous_selection_ids.forEach(function(id) {
		            attachment = wp.media.attachment(id);
		            attachment.fetch();
		            selection.add(attachment ? [attachment] : []);
		        });
		    }
		});

		// When an image is selected, run a callback.
		frame.on( 'select', function() {

			attachment = frame.state().get('selection').toJSON();

			console.log(attachment);

			var id, url, ids;
			ids = [];
			jQuery('#thumbs-preview').html('');

			jQuery.each(attachment, function(index, obj){

				id 	= obj.id;
				url = obj.sizes.thumbnail.url;
				ids.push(id);

				console.log(obj);

				jQuery('#thumbs-preview').append('<div id="wpsi-img-'+id+'" data-img-id="'+id+'"><img src="'+url+'" /><span class="remove">x</span></div>');
			});

			jQuery('#wpsi_images_ids').val(ids.join(','));
		});

		// Finally, open the modal
		frame.open();

	});

	// Sortable
	jQuery( "#thumbs-preview" ).sortable({
		update: function(){ wpsi_update_order_or_ids_value(); },
	});

	// Removing One
	jQuery('#thumbs-preview').on('click', 'div > span.remove', function(){
		jQuery(this).closest('div').remove();
		wpsi_update_order_or_ids_value();
	});

});

