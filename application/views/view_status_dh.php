<section>
<h1><?php echo $judul ?></h1>
<div class="search-container">
    <form action="<?php echo base_url(). 'web/search_req_dh'; ?>" method="get">
      <input type="text" placeholder="your ticket number here ..." name="search">
      <input type="submit" value="Search">
    </form>
  </div><br><br>
  <a>SORT DATA BY</a>
<form action="<?php echo base_url(). 'web/home_sort_dh'; ?>" method="get">
<select id="sort" name="sort">
  <option value="">choose here</option>
  <option value="Your Departement">Your Departement</option>
  <option value="Approval Pending">Approval Pending</option>
  <option value="Approved by A. Manager">Approved by A. Manager</option>
  <option value="Approved by You">Approved by You</option>
</select>
<input type="submit" value="Go">
</form>
<br><br>
<a>Count Status :</a>
<li><a>Your Departement : <?php echo $count_your_departement ?></a> </li>
<li><a>Approval Pending : <?php echo $count_approval_pending ?></a> </li>
<li><a>Approved by You : <?php echo $count_approved_asm ?></a> </li>
<li><a>Approved by Dept. Head : <?php echo $count_approved_dh ?></a> </li>
<br><br>
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
		foreach($form as $f){
			echo "<tr>";
			echo "<td>". $f->noticket."</td>";
      echo "<td>". $f->nama."</td>";
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