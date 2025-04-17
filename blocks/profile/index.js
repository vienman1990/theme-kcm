( function( wp ) {
	var registerBlockType = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var RichText = wp.blockEditor.RichText;

	registerBlockType( 'kcm/profile', {
		title: __( 'Profile', 'kcm' ),
		category: 'layout',
		supports: {
			html: false,
		},
		attributes: {
			title: {
				type: 'string',
				default: 'Lorem ipsum',
			},
			content: {
				type: 'string',
				default: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde, recusandae.',
			},
		},
		edit: function( props ) {
			var title = props.attributes.title;
			var content = props.attributes.content;
			var setAttributes = props.setAttributes;

			function onChangeTitle( newTitle ) {
				setAttributes( { title: newTitle } );
			}

			function onChangeContent( newContent ) {
				setAttributes( { content: newContent } );
			}

			return el(
				'div',
				{ className: 'profile' },
				el(
					RichText,
					{
						tagName: 'div',
						className: '--title',
						value: title,
						onChange: onChangeTitle,
						placeholder: __( 'Enter profile title...', 'mytheme' ),
					}
				),
				el(
					RichText,
					{
						tagName: 'div',
						className: '--content',
						value: content,
						onChange: onChangeContent,
						placeholder: __( 'Enter profile content...', 'mytheme' ),
					}
				)
			);
		},
		save: function( props ) {
			return el(
				'div',
				{ className: 'profile' },
				el(
					RichText.Content,
					{
							tagName: 'div',
							className: '--title',
							value: props.attributes.title || '',
					}
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
		},
	} );
} )(
	window.wp
);