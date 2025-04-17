( function( wp ) {
	var registerBlockType = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var RichText = wp.blockEditor.RichText;

	registerBlockType( 'kcm/history-item', {
			title: __( 'History Item', 'mytheme' ),
			category: 'widgets',
			supports: {
					html: false,
			},
			attributes: {
					year: {
							type: 'string',
							default: '1990年',
					},
					content: {
							type: 'string',
							default: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde, recusandae.',
					},
			},
			edit: function( props ) {
					var year = props.attributes.year;
					var content = props.attributes.content;
					var setAttributes = props.setAttributes;

					function onChangeYear( newYear ) {
							setAttributes( { year: newYear } );
					}

					function onChangeContent( newContent ) {
							setAttributes( { content: newContent } );
					}

					return el(
							'div',
							{ className: 'history_item' },
							el(
									RichText,
									{
											tagName: 'div',
											className: '--year',
											value: year,
											onChange: onChangeYear,
											placeholder: __( 'Enter year...', 'mytheme' ),
									}
							),
							el(
									'div',
									{ className: '--line' }
							),
							el(
									RichText,
									{
											tagName: 'div',
											className: '--content',
											value: content,
											onChange: onChangeContent,
											placeholder: __( 'Enter content...', 'mytheme' )
									}
							)
					);
			},
			save: function( props ) {
					return el(
							'div',
							{ className: 'history_item' },
							el(
								RichText.Content,
								{
										tagName: 'div',
										className: '--year',
										value: props.attributes.year || '',
								}
						),
							el(
									'div',
									{ className: '--line' }
							),
							el(
									RichText.Content,
									{
											tagName: 'div',
											className: '--content',
											value: props.attributes.content || '',
									}
							)
					);
			}
	} );
} )(
	window.wp
);