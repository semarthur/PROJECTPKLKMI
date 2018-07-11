<section>
<h1><?php echo $judul ?></h1>
<div class="search-container">
    <form action="<?php echo base_url(). 'web/search_req_asm'; ?>" method="get">
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
		foreach($form as $f){
			echo "<tr>";
			echo "<td>". $f->noticket."</td>";
			echo "<td>". $f->dari."</td>";
			echo "<td>". $f->untuk."</td>";
			echo "<td>".$f->date."</td>";
			echo "<td>".$f->kasus."</td>";
			echo "<td>".$f->duty."</td>";
			echo "<td>".$f->dateoec."</td>";
			echo "<td>".$f->systemint."</td>";
			echo "<td>".$f->urgency."</td>";
			echo "<td>".$f->description."</td>";
      echo "<td>".$f->approvalstatus."</td>";
      echo "<td>".$f->process."</td>";
		}
			?>
	</table>
</section>