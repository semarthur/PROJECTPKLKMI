<section><style>
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
    padding: 12px 12px 12px 0;
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
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>

<h2>Requisition Form Information System</h2>

<div class="container">
  <form action="<?php echo base_url(). 'crud/form_tambah_req_asm'; ?>" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-25">
        <input type="text" id="name" name="name" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="from">From</label>
      </div>
      <div class="col-25">
        <select id="from" name="from">
          <option value=""></option>
          <option value="Financial & Accounting">Financial & Accounting</option>
          <option value="HRD">HRD</option>
          <option value="PR">PR</option>
          <option value="Information System">Information System</option>
          <option value="Production">Production</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">E-mail</label>
      </div>
      <div class="col-25">
        <input type="text" id="e_mail" name="e_mail" value=<?php echo $this->session->userdata('email')?>>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="to">To</label>
      </div>
      <div class="col-25">
        <select id="to" name="to">
          <option value="ICT">ICT</option>
          <option value="SWD">SWD</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="date">Date</label>
      </div>
      <div class="col-25">
        <input type="date" id="date" name="date">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="case">Case</label>
      </div>
      <div class="col-25">
        <select id="case" name="case">
          <option value="Software Package">Software Package</option>
          <option value="System Application">System Application</option>
          <option value="Hardware">Hardware</option>
          <option value="Data Communication / Internet">Data Communication / Internet</option>
          <option value="LAN / WAN / Communication">LAN / WAN / Communication</option>
          <option value="Order Catridge / Toner">Order Catridge / Toner</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="duty">Duty</label>
      </div>
      <div class="col-25">
        <select id="duty" name="duty">
          <option value="Additional / Change / Delete">Additional / Change / Delete</option>
          <option value="Installation">Installation</option>
          <option value="Training">Training</option>
          <option value="Service / Repair">Service / Repair</option>
          <option value="Problem Solving">Problem Solving</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="dec">Date of Expected Completion</label>
      </div>
      <div class="col-25">
        <input type="date" id="dec" name="dec">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="si">System Integrated</label>
      </div>
      <div class="col-25">
       <select id="si" name="si">
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        <!-- textarea id="si" name="si" placeholder="if yes type here ..." style="height:50px"></textarea -->
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="urgency">Urgency</label>
      </div>
      <div class="col-25">
          <select id="si" name="urgency">
          <option value="normal">Normal</option>
          <option value="immedietly">Immedietly</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-25">
        <textarea id="description" name="description" placeholder="write your description here ..." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</section>