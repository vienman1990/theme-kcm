( function( wp ) {
	var registerBlockType = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var RichText = wp.blockEditor.RichText;
	// var useState = wp.element.useState;

	registerBlockType( 'kcm/accordion', {
			title: __( 'Accordion', 'kcm' ),
			category: 'widgets',
			supports: {
					html: false,
			},
			attributes: {
					title: {
							type: 'string',
							default: 'How do I create an account?',
					},
					content: {
							type: 'string',
							default: 'Click the "Sign Up" button in the top right corner and follow the registration process.',
					},
					isOpen: {
							type: 'boolean',
							default: false, // Changed to false
					},
			},
			edit: function( props ) {
					var title = props.attributes.title;
					var content = props.attributes.content;
					var isOpen = props.attributes.isOpen;
					var setAttributes = props.setAttributes;

					function onChangeTitle( newTitle ) {
							setAttributes( { title: newTitle } );
					}

					function onChangeContent( newContent ) {
							setAttributes( { content: newContent } );
					}

					function onToggleOpen() {
							setAttributes( { isOpen: ! isOpen } );
					}

					return el(
							'div',
							{ className: 'collapse collapse-arrow bg-base-100 border border-base-300' },
							el(
									'input',
									{
											type: 'checkbox',
											checked: true
									}
							),
							el(
									RichText,
									{
											tagName: 'div',
											className: 'collapse-title font-semibold',
											value: title,
											onChange: onChangeTitle,
											placeholder: __( 'Enter accordion title...', 'mytheme' ),
									}
							),
							el(
									RichText,
									{
											tagName: 'div',
											className: 'collapse-content text-sm',
											value: content,
											onChange: onChangeContent,
											placeholder: __( 'Enter accordion content...', 'mytheme' ),
									}
							)
					);
			},
			save: function( props ) {
					return el(
							'div',
							{ className: 'collapse collapse-arrow bg-base-100 border border-base-300' },
							el(
									'input',
									{
											type: 'checkbox',
											name: 'my-accordion-1',
											checked: false, // Use the computed value
									}
							),
							el(
									'div',
									{ className: 'collapse-title font-semibold' },
									props.attributes.title
							),
							el(
									'div',
									{ className: 'collapse-content text-sm' },
									props.attributes.content
							)
					);
			}
	} );
} )(
	window.wp
);