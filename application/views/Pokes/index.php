<?php $this->load->view('partials/header') ?>
<?php
	$poke_info = $this->session->userdata('poke_history');
	$user = $this->session->userdata('user');
	$poke = $this->session->userdata('pokes');
?>
<?php $this->load->view('partials/navigation') ?>
<div class="container">
	<div class="row">
		<div class="col-xs-8" >
			<h4>Welcome, <? echo $user['alias'];?>!</h4>
			<? if($poke)
				{
					if(count($poke) == 1)
					{
						echo "<p>1 person poked you</p>";
					}
					else
					{
						echo "<p>".count($poke)." people poked you";
					}
				}
				else
				{
					echo "<p>No one has pokes you yet</p>";
				}
			?>
		</div>
		<div class="col-xs-4">
			<a href="users/logout" class='col-xs-offset-10'>Logout</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-4 grey poke_log">
		<? foreach ($poke as $y) {
			echo "<p>{$y['alias']} poked you {$y['poke_count']} times. </p>";
		}?>
		</div>
	</div>
	<div class="row">
		<h4 class='col-xs-12'>People you may want to poke:</h4>
		<div class="col-xs-12 poke_table">
			<table class='table striped-table table-bordered'>
				<tr>
					<th>Name</th>
					<th>Alias</th>
					<th>Email Address</th>
					<th>Poke History</th>
					<th>action</th>
				</tr>
		<? foreach ($poke_info as $x) {?>
				<tr>
					<td><? echo $x['name'];?></td>
					<td><? echo $x['alias'];?></td>
					<td><? echo $x['email'];?></td>
					<td><? echo $x['name'] ." has ".$x['poke_history']." pokes.";?></td>
					<td><a href="/pokes/poke_user/<? echo $x['id']?>/<? echo $user['id']?>" class='poke btn'>Poke</a></td>
				</tr>
		<?}?>
			</table>
		</div>
	</div>
</div> <!-- End Container -->
</body>
