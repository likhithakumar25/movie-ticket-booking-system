<div class="form-group">
    <input type="text" name="name" id="sname" placeholder="Screen Name" class="form-control"/>
</div>
<div class="form-group">
    <input type="number" min ="0" oninput="validity.valid||(value='');" name="seats" id="sseats" placeholder="Seats" class="form-control"/>
</div>
<div class="form-group">
    <input type="number" min ="0" oninput="validity.valid||(value='');" name="charge" id="scharge" placeholder="Ticket Charge" class="form-control"/>
</div>
<div class="form-group">
    <button type="button" class="btn btn-success" id="savescreen">Save</button>
</div>