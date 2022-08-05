/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { RichText, InnerBlocks, useBlockProps } from '@wordpress/block-editor';

/**
 * Edit component.
 * See https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-edit-save/#edit
 *
 * @param {Object}   props                  The block props.
 * @param {Object}   props.attributes       Block attributes.
 * @param {string}   props.attributes.title Custom title to be displayed.
 * @param {string}   props.className        Class name for the block.
 * @param {Function} props.setAttributes    Sets the value for block attributes.
 * @return {Function} Render the edit screen
 */
const DriverBlockEdit = ({
	attributes: { title },
	className,
	setAttributes,
}) => {
	const blockProps = useBlockProps({ className });

	return (
		<div {...blockProps}>
			<RichText
				className="wp-block-stardust-driver__label"
				tagName="p"
				placeholder={__('Driver Title Goes Here…', 'stardust')}
				value={title}
				onChange={(title) => setAttributes({ title })}
			/>
			<InnerBlocks />
		</div>
	);
};
export default DriverBlockEdit;
