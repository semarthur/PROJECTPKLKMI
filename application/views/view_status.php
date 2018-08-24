<?php
  if (isset($_GET['download'])) {
    $params = "web/export?noticket=".$_GET['noticket']."&from=".$_GET['from']."&name=".$_GET['name']."&case=".$_GET['case']."&status=".$_GET['status']."&page=".$_GET['page'];
    redirect(base_url().$params);
  }
?>
<section>
<?php $this->load->library('session');?>
<h1><?php echo $judul ?></h1>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 1px 1px 1px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    width: 1260px;
    height: 300px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 15%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-35 {
  float: right;
  width: 15%;
  margin-top: 6px;
  margin-right: 0px;
}

.col-85 {
    float: right;
    width: 25%;
    margin-top: 6px;
    margin-right: 160px;
}


/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 1260px, max-height: 300px) {
    .col-25, .col-35, .col-75, .col-85, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
<div class="container">
  <form action="<?php echo base_url(). 'web/search'; ?>" method="get">
    <div class="row">
      <div class="col-25">
        <label for="Search Box"><b>Search Box</b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="No. Ticket">No. Ticket</label>
      </div>
      <div class="col-75">
        <input type="text" value="normal" name="page" hidden/>
        <input type="text" value="<?php if(null!==($this->session->userdata('noticket'))){ echo $this->session->userdata('noticket');} ?>" name="noticket" />
      </div>
      <div class="col-85">
        <input type="text" value="<?php if(null!==($this->session->userdata('from'))){ echo $this->session->userdata('from');} ?>" name="from" >
      </div>
      <div class="col-35">
        <label for="from">From</label>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php if(null!==($this->session->userdata('name'))){ echo $this->session->userdata('name');} ?>" name="name" >
      </div>
      <div class="col-85">
        <select id="case"  name="case" >
          <option value="<?php if(null!==($this->session->userdata('case'))){ echo $this->session->userdata('case');} ?>"><?php if(null!==($this->session->userdata('case'))){ echo $this->session->userdata('case');} ?></option>
          <option value="Software Package">Software Package</option>
          <option value="System Application">System Application</option>
          <option value="Hardware">Hardware</option>
          <option value="Data Communication / Internet">Data Communication / Internet</option>
          <option value="LAN / WAN / Communication">LAN / WAN / Communication</option>
          <option value="Order Catridge / Toner">Order Catridge / Toner</option>
        </select>
      </div>
      <div class="col-35">
        <label for="Case">Case</label>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for=""></label>
      </div>
      <div class="col-75">
      </div>
      <div class="col-85">
        <select id="status"  name="status" >
          <option value="<?php if(null!==($this->session->userdata('status'))){ echo $this->session->userdata('status');} ?>"><?php if(null!==($this->session->userdata('status'))){ echo $this->session->userdata('status');} ?></option>
          <option value="Not Processed">Not Processed</option>
          <option value="On Process">On Process</option>
        </select>
      </div>
      <div class="col-35">
        <label for="status">Status</label>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Search">
    </div><br>
    <div class="row">
      <input type="submit" value="Download" name="download" style="margin-left: 90%;">
    </div>
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
        <th>Start Date</th>
        <th>Reason</th>
      </tr>
        <?php
    foreach($form as $f){
      echo "<tr>";
      echo "<td>".$f->noticket."</td>";
      echo "<td>".$f->nama."</td>";
      echo "<td>".$f->dari."</td>";
      echo "<td>".$f->untuk."</td>";
      echo "<td>".$f->date."</td>";
      echo "<td>".$f->kasus."</td>";
      echo "<td>".$f->duty."</td>";
      echo "<td>".$f->dateoec."</td>";
      echo "<td>".$f->systemint."</td>";
      echo "<td>".$f->urgency."</td>";
      echo "<td>".$f->description."</td>";
      echo "<td>".$f->approvalstatus."</td>";
      echo "<td>".$f->process."</td>";
      echo "<td>".$f->startdate."</td>";
      echo "<td>".$f->reason."</td>";
    }
      ?>
  </table>
</section>