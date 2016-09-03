jQuery(document).ready(function($){

	/**
	 * List the plugins
	 */
	function get_wp_plugins_list()
	{
		var endpoint = $( '#corenominal-api-add-plugin-form' ).data( 'endpoint-add' );
		$.ajax(
		{
			url: endpoint,
			type: 'GET',
			dataType: 'json',
			data: { action: 'list'}
		})
		.done(function( data )
		{
			console.log( data );
			//TODO - refresh table with data
		})
		.fail(function()
		{
			console.log("OH NOES! AJAX error");
		});
	}
	get_wp_plugins_list();

	/**
	 * Show/hide the form
	 */
	$( document ).on( 'click', '#corenominal-api-add-plugin-button', function( e )
	{
		e.preventDefault();

		$( '#corenominal-api-repo-form-notify' ).html( '' );

		$( '#corenominal-api-add-plugin-form' ).slideToggle();
	});

	/**
	 * Hide the form and clear values
	 */
	$( document ).on( 'click', '#corenominal-api-repo-cancel', function( e )
	{
		e.preventDefault();

		$( '#corenominal-api-repo-form-notify' ).html( '' );

		$( '#corenominal-api-repo-name' ).val( '' );
		$( '#corenominal-api-repo-url' ).val( '' );
		$( '#corenominal-api-add-plugin-form' ).slideUp();
	});

	/**
	 * Process the form
	 */
	$( document ).on('click', '#corenominal-api-repo-save', function( e )
	{
		e.preventDefault();

		$( '#corenominal-api-repo-form-notify' ).html( '' );

		if( $( this ).hasClass( 'disabled' ) )
		{
			console.log( 'Nothing to do here, please move along ...' )
			return;
		}

		$( this ).addClass( 'disabled' );
		var endpoint = $( '#corenominal-api-add-plugin-form' ).data( 'endpoint-add' );
		var data = {
			action: 'create',
			name: $( '#corenominal-api-repo-name' ).val(),
            url: $( '#corenominal-api-repo-url' ).val(),
            apikey: $( '#corenominal-api-add-plugin-form' ).data( 'apikey' )
        };

		$.ajax(
		{
			url: endpoint,
			type: 'GET',
			dataType: 'json',
			data: data
		})
		.done(function( data )
		{
			if( data.error )
			{
				var message = '<div id="message" class="error notice"><p>Error: ' + data.error + '</p></div>';
				$( '#corenominal-api-repo-form-notify' ).html( message );
			}
			else
			{
				$( '#corenominal-api-repo-name' ).val( '' );
				$( '#corenominal-api-repo-url' ).val( '' );
				var message = '<div id="message" class="updated notice"><p>Plugin added to list!</p></div>';
				$( '#corenominal-api-repo-form-notify' ).html( message );
			}
		})
		.fail(function()
		{
			console.log("OH NOES! AJAX error");
		});

		$( this ).removeClass('disabled');

	});

});
