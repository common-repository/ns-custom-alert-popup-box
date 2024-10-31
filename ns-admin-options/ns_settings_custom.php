<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php // PUT YOUR settings_fields name and your input // ?>
<?php settings_fields('ns_wcapb_free_options'); ?>
<div class="genRowNssdc">
<table>
	<tbody>
		<tr valign="top">
			<th class="titledesc" scope="row">
				<label for="ns_wcapb_test_mode">Test Popup Box</label>
				<div class="ns-tooltip">?<span class="ns-tooltiptext">Uncheck to see popup  only at first vist on site</span></div>
			</th>
			<td class="forminp">
				<input type="checkbox" name="ns_wcapb_test_mode" id="ns_wcapb_test_mode" <?php if (get_option('ns_wcapb_test_mode')) { echo ' checked="checked"'; } ?>>
				<span class="description"></span>
			</td>
		</tr>
		<tr valign="top">
			<th class="titledesc" scope="row">
				<label for="ns_wcapb_text">Text Popup Box</label>
				<div class="ns-tooltip">?<span class="ns-tooltiptext">Insert text for Popup Box</span></div>
			</th>
			<td class="forminp">
				<?php wp_editor( get_option('ns_wcapb_text'), 'ns_wcapb_text', $settings = array('textarea_name'=>'ns_wcapb_text') ); ?>
				<span class="description"></span>
			</td>
		</tr>
		<tr valign="top">
			<th class="titledesc" scope="row">
				<label for="ns_disabled">Popup Box Delay</label>
				<div class="ns-tooltip">?<span class="ns-tooltiptext">Insert delay of Popup Box</span></div>
			</th>
			<td class="forminp">
				<input type="text" name="ns_disabled" id="ns_disabled" value="disabled" disabled="disabled">
				<a class="button-primary ns-rac-submit-button" href="<?php echo $link_unlock_cookie; ?>">UNLOCK OPTION</a>
				<span class="description"></span>
			</td>
		</tr>
		<tr valign="top">
			<th class="titledesc" scope="row">
				<label for="ns_wcapb_delay">Popup Box Delay</label>
				<div class="ns-tooltip">?<span class="ns-tooltiptext">Insert delay of Popup Box</span></div>
			</th>
			<td class="forminp">
				<input type="text" name="ns_wcapb_delay" id="ns_wcapb_delay" value="<?php echo get_option('ns_wcapb_delay'); ?>">
				<span class="description"></span>
			</td>
		</tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wt_wcapb_color_layer">Background color layer</label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext">Set layer Background color.</span></div>
						</th>
                        <td class="forminp">
                            <input type="text" name="wt_wcapb_color_layer" id="wt_wcapb_color_layer" value="<?php echo get_option('wt_wcapb_color_layer'); ?>">
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wt_wcapb_opacity_layer">Background opacity layer</label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext">Set Background layer opacity.</span></div>
						</th>
                        <td class="forminp">
                            <input type="text" name="wt_wcapb_opacity_layer" id="wt_wcapb_opacity_layer" value="<?php echo get_option('wt_wcapb_opacity_layer'); ?>">
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wt_wcapb_color_content">Background color content</label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext">Set Background color content.</span></div>
						</th>
                        <td class="forminp">
                            <input type="text" name="wt_wcapb_color_content" id="wt_wcapb_color_content" value="<?php echo get_option('wt_wcapb_color_content'); ?>">
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wt_wcapb_border_size">Border size</label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext">Set border size in px.</span></div>
						</th>
                        <td class="forminp">
                            <input type="text" name="wt_wcapb_border_size" id="wt_wcapb_border_size" value="<?php echo get_option('wt_wcapb_border_size'); ?>">
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wt_wcapb_border_color">Border color</label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext">Set border color.</span></div>
						</th>
                        <td class="forminp">
                            <input type="text" name="wt_wcapb_border_color" id="wt_wcapb_border_color" value="<?php echo get_option('wt_wcapb_border_color'); ?>">
							<span class="description"></span>
                        </td>
                    </tr>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="wt_wcapb_padding">Padding size</label>
							<div class="ns-tooltip">?<span class="ns-tooltiptext">Set padding size in px.</span></div>
						</th>
                        <td class="forminp">
                            <input type="text" name="wt_wcapb_padding" id="wt_wcapb_padding" value="<?php echo get_option('wt_wcapb_padding'); ?>">
							<span class="description"></span>
                        </td>
                    </tr>
	</tbody>
</table>
</div>