<?php
$limit = $_GET['q'];
for($i=0; $i<$limit; $i++)
{
	echo
	'
		<div class="form-group">
                       <label for="pro" class="control-label col-lg-2">Subject Name :</label>
                       <div class="col-lg-10">
                        <input type="text" name="sub[]" class="form-control input-lg" placeholder="Subject Name">
                        </div>
                 </div>
	';
}