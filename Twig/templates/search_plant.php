<?php include('../getAllPlants.php'); ?>

<div id="search">
	<div class="searchButton center"></div>
	<div class="searchForm center">
		<form id="searchDatabase">
			<input type="input" id="plantName" name="plantName" placeholder="Search"></input>
		</form>
	</div>
	<div class="advancedButton center"></div>
</div>
<div id="results">
	<div id="advancedOptions">
		<ul>
			<li>
				<div class="option">
					<div class="left">
						<h2>Plant Type</h2>
						<select id="plantType" name="plantType" form="searchDatabase">
							<option value="-"></option>
						</select>
					</div>
					<div class="right typeImage"></div>
				</div>
			</li>
			<li>
				<div class="option">
					<div class="left">
						<h2>Plant Size</h2>
						<select id="plantSize" name="plantSize" form="searchDatabase">
							<option value="-"></option>
							<option name="small" value="Small">Small</option>
							<option name="medium" value="Medium">Medium</option>
							<option name="large" value="Large">Large</option>
						</select>
					</div>
					<div class="right sizeImage"></div>
				</div>
			</li>
			<li>
				<div class="option">
					<div class="left">
						<h2>Maintenance</h2>
						<select id="plantMaintenance" name="plantMaintenance" form="searchDatabase">
							<option value="-"></option>
							<option value="Low">Low</option>
							<option value="Medium">Medium</option>
							<option value="High">High</option>
						</select>
					</div>
					<div class="right maintenanceImage"></div>
				</div>
			</li>
		</ul>
	</div>
	<div id="plantResults">
		<?php echo getAllPlants() ?> -->
		<!-- <ul class="returnList">
			<li><img src="http://placekitten.com/150/150" />
				<h2>Frederick</h2>
				<h3>Tomato Plant</h3>
			</li>

			<li><img src="http://placekitten.com/150/150" />
				<h2>Seymour</h2>
				<h3>Tomato Plant</h3>
			</li>

			<li><img src="http://placekitten.com/150/150" />
				<h2>Herp</h2>
				<h3>Tomato Plant</h3>
			</li>

			<li><img src="http://placekitten.com/150/150" />
				<h2>Derp</h2>
				<h3>Tomato Plant</h3>
			</li>
			<li><img src="http://placekitten.com/150/150" />
				<h2>Frederick</h2>
				<h3>Tomato Plant</h3>
			</li>

			<li><img src="http://placekitten.com/150/150" />
				<h2>Seymour</h2>
				<h3>Tomato Plant</h3>
			</li>

			<li><img src="http://placekitten.com/150/150" />
				<h2>Herp</h2>
				<h3>Tomato Plant</h3>
			</li>

			<li><img src="http://placekitten.com/150/150" />
				<h2>Derp</h2>
				<h3>Tomato Plant</h3>
			</li>
		</ul> -->
	</div>
</div>