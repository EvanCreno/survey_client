<?php
/**
 * @copyright Copyright (c) 2016, Joas Schilling <coding@schilljs.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/** @var $l \OCP\IL10N */
/** @var $_ array */
?>
<div id="survey_client" class="section">
	<h2><?php p($l->t('Usage report')); ?></h2>

	<p>
		<?php p($l->t('When the server receives a new report of your instance, all entries from previous reports are removed. So in case you disable one of the settings below, you can send a new report, to delete the data, that is currently stored on the server.')); ?>
	</p>

	<button><?php p($l->t('Send new report now')); ?></button>

	<p>
		<input id="survey_client_monthly_report" name="survey_client_monthly_report"
			   type="checkbox" class="checkbox" value="1" <?php if ($_['is_enabled']): ?> checked="checked"<?php endif; ?> />
		<label for="survey_client_monthly_report"><?php p($l->t('Send "Usage report" monthly')); ?></label>
	</p>

	<h3><?php p($l->t('Data Control')); ?></h3>
	<?php
	foreach ($_['categories'] as $category => $data) {
		?>
		<p>
			<input id="survey_client_<?php p($category); ?>" name="survey_client_<?php p($category); ?>"
				   type="checkbox" class="checkbox survey_client_category" value="1" <?php if ($data['enabled']): ?> checked="checked"<?php endif; ?> />
			<label for="survey_client_<?php p($category); ?>"><?php print_unescaped($data['displayName']); ?></label>
		</p>
		<?php
	}
	?>

	<h3><?php p($l->t('Last report')); ?></h3>

	<p><textarea title="<?php p($l->t('Last report')); ?>" class="last_report" readonly="readonly"><?php p($_['last_report']);?></textarea></p>

	<em class="last_sent"><?php p($l->t('Sent on: %s', [$_['last_sent']])); ?></em>
</div>
