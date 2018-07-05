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
  <form action="#">
    <div class="row">
      <div class="col-25">
        <label for="from">From</label>
      </div>
      <div class="col-25">
        <input type="text" id="from" name="from" >
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
        <label for="to">To</label>
      </div>
      <div class="col-25">
        <select id="to" name="to">
          <option value="sp">ICT</option>
          <option value="sa">SWD</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="case">Case</label>
      </div>
      <div class="col-25">
        <select id="case" name="case">
          <option value="sp">Software Package</option>
          <option value="sa">System Application</option>
          <option value="hw">Hardware</option>
          <option value="dci">Data Communication / Internet</option>
          <option value="lwc">LAN / WAN / Communication</option>
          <option value="oct">Order Catridge / Toner</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="duty">Duty</label>
      </div>
      <div class="col-25">
        <select id="duty" name="duty">
          <option value="acd">Additional / Change / Delete</option>
          <option value="ins">Installation</option>
          <option value="tra">Training</option>
          <option value="sr">Service / Repair</option>
          <option value="ps">Problem Solving</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="dec">Date of Expected Completion:</label>
      </div>
      <div class="col-25">
        <input type="date" id="dec" name="dec">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="dec">System Integrated:</label>
      </div>
      <div class="col-25">
        <input type="radio" name="yes" value="y" checked> Yes<br>
        <textarea id="yesdesc" name="yesdesc" placeholder="if yes fill in here ..." style="height:50px"></textarea>
        <input type="radio" name="no" value="n" checked> No<br>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="urgency">Urgency</label>
      </div>
      <div class="col-25">
        <input type="radio" name="normal" value="normal" checked> Normal<br>
        <input type="radio" name="immediately" value="immediately"> Immedietly<br>
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