<?php var_dump($data);?>
<table class="tab">
	<tr>
		<td><span class="tab-title"><?php echo __('Dashboard') ?></span></td>
	</tr>
	<tr>
		<td>
			<div class="tab-content">
				<table class="content-inner">
					
					<thead>
						<th><?php echo __('System\'s log') ?></th>
						<th><?php echo __('') ?></th>
						
					</thead>
					<tbody >
						<tr>
							<td>Last login</td><td>Nokia Lumia 920</td>
						</tr>
						<tr>
							<td>Progress</td><td>Galaxy S4</td>
						</tr>
						<tr>
							<td>Search Engine</td><td>Galaxy S4</td>
						</tr>
						<tr>
							<td>Device</td><td>Galaxy S4</td>
						</tr>
						<tr>
							<td>Total Number Searched</td><td>Galaxy S4</td>
						</tr>
						<tr>
							<td>Last Search</td><td>Galaxy S4</td>
						</tr>		
					</tbody>
				</table>
				<table class="content-inner">
					<thead>
						<th><?php echo __('User\'s configuration') ?></th>
						<th><?php echo __('') ?></th>
					</thead>
					<tbody >
					<tr>
				</tr>
				<tr>
					<td><?php echo __('Google') ?></td>
					<td>
						<?php echo $this->Form->input('google', array(
							'type' => 'checkbox',
							'style' => 'width:auto;',
							'disabled' => 'disabled',
							'checked' => (isset($data['Config']['google']) && $data['Config']['google']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Yahoo') ?></td>
					<td>
						<?php echo $this->Form->input('yahoo', array(
							'type' => 'checkbox',
							'style' => 'width:auto;',
							'disabled' => 'disabled',
							'checked' => (isset($data['Config']['yahoo']) && $data['Config']['yahoo']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('PC') ?></td>
					<td>
						<?php echo $this->Form->input('pc', array(
							'type' => 'checkbox',
							'disabled' => 'disabled',
							'style' => 'width:auto;',
							'checked' => (isset($data['Config']['pc']) && $data['Config']['pc']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Smartphone') ?></td>
					<td>
						<?php echo $this->Form->input('smartphone', array(
							'type' => 'checkbox',
							'disabled' => 'disabled',
							'style' => 'width:auto;',
							'checked' => (isset($data['Config']['smartphone']) && $data['Config']['smartphone']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Adwords(SEM)') ?></td>
					<td>
						<?php echo $this->Form->input('adwords', array(
							'type' => 'checkbox',
							'disabled' => 'disabled',
							'style' => 'width:auto;',
							'checked' => (isset($data['Config']['adwords']) && $data['Config']['adwords']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Normal') ?></td>
					<td>
						<?php echo $this->Form->input('normal', array(
							'type' => 'checkbox',
							'disabled' => 'disabled',
							'style' => 'width:auto;',
							'checked' => (isset($data['Config']['normal']) && $data['Config']['normal']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Stop auto search?') ?></td>
					<td>
						<?php echo $this->Form->input('stop_auto', array(
							'type' => 'checkbox',
							'disabled' => 'disabled',
							'style' => 'width:auto;',
							'checked' => (isset($data['Config']['stop_auto']) && $data['Config']['stop_auto']) ? 'checked' : ''
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Number Running Time') ?></td>
					<td>
						<?php echo $this->Form->input('running_time', array(
							'type' => 'select',
							'options' => array(1 => '1', 2 => '2'),
							'label' => false,
							'empty' => false,
							'disabled' => 'disabled',
							'value' => (isset($data['Config']['running_time'])) ? $data['Config']['running_time'] : 1
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Send email to') ?></td>
					<td>
						<?php echo $this->Form->input('email', array(
							'value' => (isset($data['Config']['email'])) ? $data['Config']['email'] : ''
							,'disabled' => 'disabled',
						)) ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('Schedule') ?></td>
					<td>
						<div class="pull-left">
							<?php echo $this->Form->input('schedule', array(
								'type' => 'select',
								'options' => array(
									'daily'	 	=> 'daily',
									'weekly' 	=> 'weekly',
									'monthly' 	=> 'monthly',
									'yearly' 	=> 'yearly'
								),
								'label' => false,
								'disabled' => 'disabled',
								'empty' => __('Choose Schedule'),
								'value' => (isset($data['Config']['schedule'])) ? $data['Config']['schedule'] : ''
							)) ?>						
						</div>

						<div class="input-day pull-left schedule-select no-display" style="margin-left: 15px;">
							<?php echo $this->Form->input('week_day', array(
								'type' => 'select',
								'options' => array(
						 			'sunday' => 'Sunday',
								    'monday' => 'Monday',
								    'tuesday' => 'Tuesday',
								    'wednesday' => 'Wednesday',
								    'thursday' => 'Thursday',
								    'friday' => 'Friday',
								    'saturday' => 'Saturday',
								),
								'label' => false,
								'empty' => false,
								'div' => false,
								'value' => (isset($data['Config']['week_day'])) ? $data['Config']['week_day'] : 'sunday'
							)) ?>
						</div>
						<div class="input-date pull-left schedule-select no-display" style="margin-left: 15px;">
							<?php echo __('Date') ?> :
							<?php echo $this->Form->input('date', array(
								'type' => 'select',
								'options' => array_combine(range(1, 31), range(1, 31)),
								'label' => false,
								'empty' => false,
								'div' => false,
								'value' => (isset($data['Config']['date'])) ? $data['Config']['date'] : 1
							)) ?>
						</div>
						<div class="input-month pull-left schedule-select no-display" style="margin-left: 15px;">
							<?php echo __('Month') ?> :
							<?php echo $this->Form->input('month', array(
								'type' => 'select',
								'options' => array_combine(range(1, 12), range(1, 12)),
								'label' => false,
								'empty' => false,
								'div' => false,
								'value' => (isset($data['Config']['month'])) ? $data['Config']['month'] : 1
							)) ?>
						</div>
					</td>
					<td>
						
						
						
					</td>
				</tr>
				<tr>
					<td><?php echo __('Attached Format') ?></td>
					<td>
						<?php echo $data['Config']['attached_type']; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo __('     ') ?></td>
				</tr>
					</tbody>
					
					
				</table>							
			</div>
		</td>
	</tr>
</table>