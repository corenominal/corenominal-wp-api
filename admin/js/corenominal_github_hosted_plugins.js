jQuery(document).ready(function($){

	/**
	 * Show/hide the form
	 */
	$( document ).on( 'click', '#corenominal-api-add-plugin-button', function( e )
	{
		e.preventDefault();
		$( '#corenominal-api-add-plugin-form' ).slideToggle();
	});

	/**
	 * Hide the form and clear values
	 */
	$( document ).on( 'click', '#corenominal-api-repo-cancel', function( e )
	{
		e.preventDefault();
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
		var endpoint = $( '#corenominal-api-add-plugin-form' ).data( 'endpoint-add' )
		var data = {
            name: $( '#corenominal-api-repo-name' ).val(),
            url: $( '#corenominal-api-repo-url' ).val(),
            apikey: $( '#corenominal-api-add-plugin-form' ).data( 'apikey' )
        };
		console.log( endpoint );
		console.log( data );

	});

});
