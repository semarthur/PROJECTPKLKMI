<section>
<h1><?php echo $judul ?></h1>
<div class="search-container">
    <form action="<?php echo base_url(). 'web/search_history'; ?>" method="get">
      <input type="text" placeholder="your ticket number here ..." name="search">
      <input type="submit" value="Search">
    </form>
  </div><br><br><br>
  <style>
	table {
    	border-collapse: collapse;
    	width: 100%;
	}

		th, td {
    	text-align: left;
    	padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
    	background-color: #4CAF50;
    	color: white;
	}
	</style>
	<table>
  	  <tr>
    	  <th>No. Ticket</th>
        <th>Name</th>
    	  <th>From</th>
    	  <th>To</th>
    	  <th>Date</th>
    	  <th>Case</th>
    	  <th>Duty</th>
    	  <th>Date of Expectancy Completion</th>
    	  <th>System Integrated</th>
    	  <th>Urgency</th>
    	  <th>Description</th>
        <th>Approval Status</th>
        <th>Status</th>
  	  </tr>
  	  	<?php
		foreach($form_done as $fd){
			echo "<tr>";
			echo "<td>". $fd->noticket."</td>";
      echo "<td>". $fd->nama."</td>";
			echo "<td>". $fd->dari."</td>";
			echo "<td>". $fd->untuk."</td>";
			echo "<td>".$fd->date."</td>";
			echo "<td>".$fd->kasus."</td>";
			echo "<td>".$fd->duty."</td>";
			echo "<td>".$fd->dateoec."</td>";
			echo "<td>".$fd->systemint."</td>";
			echo "<td>".$fd->urgency."</td>";
			echo "<td>".$fd->description."</td>";
      echo "<td>".$fd->approvalstatus."</td>";
      echo "<td>".$fd->process."</td>";
		}
			?>
	</table>
</section>