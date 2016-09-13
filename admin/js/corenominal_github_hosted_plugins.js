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
			var plugins = '';
			if( data.num_rows == 0 )
			{
				plugins = '<tr><td colspan="3">No plugins found!</td></tr>';
			}
			else
			{
				$.each(data.plugins, function(i, plugin)
				{
					plugins += '<tr><td>' + plugin.name + '</td>';
	        		plugins += '<td><a href="' + plugin.url + '" target="_blank">' + plugin.url + '</a></td>';
					plugins += '<td class="corenominal-api-remove-plugin-cell' + plugin.id + '">';
					plugins += '<button data-id="' + plugin.id + '" class="button corenominal-api-remove-plugin-button">Remove</button>';
					plugins += '<div class="remove-plugin-prompt remove-plugin-prompt' + plugin.id + '">';
					plugins += '<span>Are you sure?</span>';
					plugins += '<button data-id="' + plugin.id + '" class="button remove-plugin-prompt-yes">Yes</button> ';
					plugins += '<button data-id="' + plugin.id + '" class="button remove-plugin-prompt-no">No</button>';
					plugins += '</div>';
					plugins += '</td></tr>';
				});
			}
			$( '#the-list' ).html( plugins );
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
				get_wp_plugins_list();
			}
		})
		.fail(function()
		{
			console.log("OH NOES! AJAX error");
		});

		$( this ).removeClass('disabled');

	});

	/**
	 * Remove plugin from list
	 */
	$( document ).on( 'click', '.corenominal-api-remove-plugin-button', function( e )
	{
		e.preventDefault();
		var id = $( this ).attr( 'data-id' );
		$( '.remove-plugin-prompt' ).not( '.remove-plugin-prompt' + id ).slideUp();
		$( '.remove-plugin-prompt' + id ).slideToggle();
	});

	$( document ).on( 'click', '.remove-plugin-prompt-no', function( e )
	{
		e.preventDefault();
		$( '.remove-plugin-prompt' ).slideUp();
	});

	$( document ).on( 'click', '.remove-plugin-prompt-yes', function( e )
	{
		e.preventDefault();
		var endpoint = $( '#corenominal-api-add-plugin-form' ).data( 'endpoint-add' );
		var data = {
			action: 'delete',
			id: $( this ).attr( 'data-id' ),
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
			var plugins = '<tr><td colspan="3">Refreshing plugins ...</td></tr>';
			$( '#the-list' ).html( plugins );
			get_wp_plugins_list();
		})
		.fail(function()
		{
			console.log("OH NOES! AJAX error");
		});
	});

});
